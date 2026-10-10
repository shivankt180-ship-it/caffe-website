<?php

namespace Tests\Feature;

use App\Models\reservation;
use App\Models\WebsiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationBookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_page_renders_the_submission_form_and_mobile_link(): void
    {
        $this->get(route('index'))
            ->assertOk()
            ->assertSee('action="'.route('reservation.store').'"', false)
            ->assertSee('name="email"', false)
            ->assertSee('href="'.route('index').'" class="mobile-nav-link"', false);
    }

    public function test_guest_can_submit_a_table_booking(): void
    {
        $response = $this->post(route('reservation.store'), [
            'name' => 'Aarav Sharma',
            'email' => 'aarav@example.test',
            'phone' => '+919876543210',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:30',
            'guests' => 4,
        ]);

        $response->assertRedirect(route('index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('reservations', [
            'name' => 'Aarav Sharma',
            'email' => 'aarav@example.test',
            'guests' => 4,
            'status' => 'pending',
        ]);
    }

    public function test_guest_cannot_book_a_past_date(): void
    {
        $this->from(route('index'))->post(route('reservation.store'), [
            'name' => 'Aarav Sharma',
            'email' => 'aarav@example.test',
            'phone' => '+919876543210',
            'date' => now()->subDay()->toDateString(),
            'time' => '19:30',
            'guests' => 4,
        ])->assertRedirect(route('index'))->assertSessionHasErrors('date');

        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_guest_cannot_submit_invalid_email_or_guest_count(): void
    {
        $this->from(route('index'))->post(route('reservation.store'), [
            'name' => 'Aarav Sharma',
            'email' => 'not-an-email',
            'phone' => '+919876543210',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:30',
            'guests' => 21,
        ])->assertRedirect(route('index'))
            ->assertSessionHasErrors(['email', 'guests']);

        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_admin_can_view_update_and_delete_a_booking(): void
    {
        $admin = WebsiteUser::create([
            'name' => 'Cafe Admin',
            'email' => 'admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();
        $this->actingAs($admin);

        $booking = reservation::create([
            'name' => 'Aarav Sharma',
            'email' => 'aarav@example.test',
            'phone' => '+919876543210',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:30',
            'guests' => 4,
        ]);
        reservation::create([
            'name' => 'Meera Kapoor',
            'email' => 'meera@example.test',
            'phone' => '+919876543211',
            'date' => now()->addDay()->toDateString(),
            'time' => '20:00',
            'guests' => 2,
            'status' => 'confirmed',
        ]);

        $this->get(route('admin.reservations.index'))
            ->assertOk()
            ->assertSee('aarav@example.test');

        $this->get(route('admin.reservations.index', [
            'search' => 'aarav',
            'status' => 'pending',
        ]))->assertOk()
            ->assertSee('aarav@example.test')
            ->assertDontSee('meera@example.test');

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertViewHas('pendingReservationCount', 1)
            ->assertSee('Aarav Sharma');

        $this->patch(route('admin.reservations.status', $booking), [
            'status' => 'confirmed',
        ])->assertRedirect(route('admin.reservations.index'));

        $this->assertDatabaseHas('reservations', [
            'id' => $booking->id,
            'status' => 'confirmed',
        ]);

        $this->patch(route('admin.reservations.status', $booking), [
            'status' => 'unknown',
        ])->assertSessionHasErrors('status');

        $this->assertDatabaseHas('reservations', [
            'id' => $booking->id,
            'status' => 'confirmed',
        ]);

        $this->delete(route('admin.reservations.destroy', $booking))
            ->assertRedirect(route('admin.reservations.index'));

        $this->assertDatabaseMissing('reservations', ['id' => $booking->id]);
    }

    public function test_non_admin_cannot_manage_bookings(): void
    {
        $customer = WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->actingAs($customer)
            ->get(route('admin.reservations.index'))
            ->assertForbidden();
    }
}
