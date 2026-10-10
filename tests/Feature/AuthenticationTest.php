<?php

namespace Tests\Feature;

use App\Models\WebsiteUser;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_login_and_registration_modal(): void
    {
        $response = $this->get(route('home', ['auth' => 'login']));

        $response->assertOk()
            ->assertSee('id="authModal"', false)
            ->assertSee('action="'.route('login.store').'"', false)
            ->assertSee('action="'.route('register.store').'"', false)
            ->assertSee('href="'.route('home', ['auth' => 'login']).'"', false)
            ->assertSee('href="'.route('home', ['auth' => 'register']).'"', false);
    }

    public function test_registration_creates_and_authenticates_a_website_user(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
            'password_confirmation' => 'SecurePass123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('website_users', [
            'email' => 'customer@example.test',
            'is_admin' => false,
        ]);
        $this->assertAuthenticatedAs(WebsiteUser::where('email', 'customer@example.test')->first());
    }

    public function test_registered_user_can_log_in_and_log_out(): void
    {
        $user = WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'SecurePass123',
            'remember' => '1',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);

        $this->post(route('logout'))->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_invalid_login_is_rejected(): void
    {
        WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => 'customer@example.test',
            'password' => 'wrong-password',
        ])->assertRedirect(route('login'))->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_password_reset_link_and_password_reset_work(): void
    {
        Notification::fake();

        $user = WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect();

        Notification::assertSentTo($user, ResetPassword::class);
        $token = app('auth.password.broker')->createToken($user);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'NewSecurePass123',
            'password_confirmation' => 'NewSecurePass123',
        ])->assertRedirect(route('login'));

        $this->assertTrue(Hash::check('NewSecurePass123', $user->fresh()->password));
    }

    public function test_only_admin_users_can_access_the_admin_panel(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));

        $customer = WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->actingAs($customer)->get(route('dashboard'))->assertForbidden();

        $admin = WebsiteUser::create([
            'name' => 'Cafe Admin',
            'email' => 'admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin)->get(route('dashboard'))->assertOk();
    }

    public function test_admin_promotion_command_only_promotes_an_existing_account(): void
    {
        $this->artisan('app:promote-website-user-to-admin', ['email' => 'missing@example.test'])
            ->assertExitCode(1);

        $user = WebsiteUser::create([
            'name' => 'Cafe Admin',
            'email' => 'admin@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->artisan('app:promote-website-user-to-admin', ['email' => $user->email])
            ->assertExitCode(0);

        $this->assertTrue($user->fresh()->is_admin);
    }
}
