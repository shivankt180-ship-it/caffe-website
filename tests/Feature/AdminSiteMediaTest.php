<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\WebsiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSiteMediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_hero_video_and_story_photo(): void
    {
        Storage::fake('public');
        $admin = WebsiteUser::create([
            'name' => 'Media Admin',
            'email' => 'media-admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin)
            ->get(route('admin.site-media.edit'))
            ->assertOk()
            ->assertSee('Hero video')
            ->assertSee('Story photo');

        $this->put(route('admin.site-media.update'), [
            'hero_video' => UploadedFile::fake()->create('cafe.mp4', 128, 'video/mp4'),
            'story_photo' => UploadedFile::fake()->image('story.jpg'),
        ])->assertRedirect(route('admin.site-media.edit'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('site_settings', ['key' => 'hero_video']);
        $this->assertDatabaseHas('site_settings', ['key' => 'story_photo']);
        Storage::disk('public')->assertExists(SiteSetting::get('hero_video'));
        Storage::disk('public')->assertExists(SiteSetting::get('story_photo'));

        $this->get(route('home'))
            ->assertOk()
            ->assertSee(asset('storage/'.SiteSetting::get('hero_video')))
            ->assertSee(asset('storage/'.SiteSetting::get('story_photo')));
    }

    public function test_non_admin_cannot_change_site_media(): void
    {
        $customer = WebsiteUser::create([
            'name' => 'Cafe Customer',
            'email' => 'customer@example.test',
            'password' => 'SecurePass123',
        ]);

        $this->actingAs($customer)
            ->get(route('admin.site-media.edit'))
            ->assertForbidden();
    }
}
