<?php

namespace Tests\Feature;

use App\Models\contact;
use App\Models\WebsiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_posts_messages_to_the_contact_endpoint(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('action="'.route('contact.store').'"', false)
            ->assertSee('name="subject"', false)
            ->assertSee('name="message"', false);
    }

    public function test_guest_can_send_a_contact_message(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Riya Guest',
            'email' => 'riya@example.test',
            'phone' => '+919876543210',
            'subject' => 'General Enquiry',
            'message' => 'I would like to ask about the cafe.',
        ])->assertRedirect(route('contact'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'name' => 'Riya Guest',
            'email' => 'riya@example.test',
            'subject' => 'General Enquiry',
            'message' => 'I would like to ask about the cafe.',
        ]);
    }

    public function test_invalid_contact_message_is_rejected(): void
    {
        $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'Riya Guest',
            'email' => 'invalid-email',
            'subject' => 'Unsupported Subject',
            'message' => '',
        ])->assertRedirect(route('contact'))
            ->assertSessionHasErrors(['email', 'subject', 'message']);

        $this->assertDatabaseCount('contacts', 0);
    }

    public function test_admin_can_view_saved_contact_messages(): void
    {
        $admin = WebsiteUser::create([
            'name' => 'Cafe Admin',
            'email' => 'admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();
        $this->actingAs($admin);

        contact::create([
            'name' => 'Riya Guest',
            'email' => 'riya@example.test',
            'phone' => '+919876543210',
            'subject' => 'General Enquiry',
            'message' => 'Saved message for the team.',
        ]);

        $this->get(route('contacts'))
            ->assertOk()
            ->assertSee('riya@example.test')
            ->assertSee('Saved message for the team.');
    }
}
