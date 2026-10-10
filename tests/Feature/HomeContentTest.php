<?php

namespace Tests\Feature;

use App\Models\blog;
use App\Models\contact;
use App\Models\gallery;
use App\Models\menu;
use App\Models\reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_shows_published_content_and_omits_private_or_sample_content(): void
    {
        menu::create([
            'name' => 'Live Cappuccino',
            'price' => 180,
            'category' => 'Coffee',
            'discription' => 'Fresh espresso and milk.',
            'image' => 'cappuccino.jpg',
            'status' => 'published',
        ]);
        menu::create([
            'name' => 'Draft Sandwich',
            'price' => 200,
            'category' => 'Food',
            'discription' => 'Not ready to publish.',
            'status' => 'draft',
        ]);
        blog::create([
            'title' => 'Live Cafe Story',
            'slug' => 'live-cafe-story',
            'description' => 'A published story from the cafe.',
            'image' => 'story.jpg',
            'status' => 'published',
        ]);
        gallery::create([
            'image' => 'gallery-live.jpg',
            'status' => 'published',
        ]);
        reservation::create([
            'name' => 'Private Booking Name',
            'email' => 'private@example.test',
            'phone' => '+919876543210',
            'date' => now()->addDay()->toDateString(),
            'time' => '19:00',
            'guests' => 2,
        ]);
        contact::create([
            'name' => 'Private Contact Name',
            'email' => 'private-contact@example.test',
            'phone' => '+919876543211',
            'subject' => 'General Enquiry',
            'message' => 'This must not appear on the public homepage.',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Live Cappuccino')
            ->assertSee('Live Cafe Story')
            ->assertSee('gallery-live.jpg')
            ->assertDontSee('Draft Sandwich')
            ->assertDontSee('Private Booking Name')
            ->assertDontSee('Private Contact Name')
            ->assertDontSee('The Art of a Perfect Cup of Coffee')
            ->assertDontSee('Ankit Raj');
    }
}
