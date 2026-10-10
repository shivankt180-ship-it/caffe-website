<?php

namespace Tests\Feature;

use App\Models\blog;
use App\Models\contact;
use App\Models\gallery;
use App\Models\menu;
use App\Models\reservation;
use App\Models\WebsiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_saved_site_data_instead_of_demo_content(): void
    {
        $admin = WebsiteUser::create([
            'name' => 'Dashboard Admin',
            'email' => 'dashboard-admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin);

        reservation::create([
            'name' => 'Actual Booking Guest',
            'email' => 'booking@example.test',
            'phone' => '+919876543210',
            'date' => now()->addDay()->toDateString(),
            'time' => '18:30',
            'guests' => 2,
        ]);
        blog::create([
            'title' => 'Actual Blog Story',
            'slug' => 'actual-blog-story',
            'description' => 'A real blog entry.',
            'status' => 'published',
        ]);
        contact::create([
            'name' => 'Actual Contact Sender',
            'email' => 'contact@example.test',
            'phone' => '+919876543211',
            'subject' => 'General Enquiry',
            'message' => 'A real message from a visitor.',
        ]);
        menu::create([
            'name' => 'Actual Menu Item',
            'price' => 120,
            'category' => 'coffee',
            'discription' => 'A real menu entry.',
            'status' => 'published',
        ]);
        gallery::create([
            'image' => 'actual-gallery-image.jpg',
            'status' => 'published',
        ]);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Actual Booking Guest')
            ->assertSee('Actual Blog Story')
            ->assertSee('Actual Contact Sender')
            ->assertViewHasAll([
                'reservationCount' => 1,
                'contactCount' => 1,
                'blogCount' => 1,
                'menuCount' => 1,
                'galleryCount' => 1,
                'customerCount' => 0,
            ])
            ->assertDontSee('Rohan Sharma')
            ->assertDontSee('Ankit Raj')
            ->assertDontSee('124 orders');
    }
}
