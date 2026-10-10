<?php

namespace Tests\Feature;

use App\Models\gallery;
use App\Models\WebsiteUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminGalleryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_images_can_be_created_updated_published_and_deleted(): void
    {
        $admin = WebsiteUser::create([
            'name' => 'Cafe Admin',
            'email' => 'admin@example.test',
            'password' => 'SecurePass123',
        ]);
        $admin->forceFill(['is_admin' => true])->save();
        $this->actingAs($admin);

        $this->post(route('admin.gallery.store'), [
            'image' => UploadedFile::fake()->image('cafe.jpg'),
            'status' => 'published',
        ])->assertRedirect(route('admin.gallery.index'));

        $item = gallery::query()->firstOrFail();
        $originalImage = public_path('uploads/gallery/'.$item->image);

        $this->assertDatabaseHas('edit', [
            'id' => $item->id,
            'status' => 'published',
        ]);
        $this->assertFileExists($originalImage);

        $this->get(route('admin.gallery.index'))
            ->assertOk()
            ->assertSee(asset('uploads/gallery/'.$item->image));

        $this->get(route('admin.gallery.edit', $item->id))
            ->assertOk()
            ->assertSee(route('admin.gallery.update', $item->id));

        $this->get(route('gallery'))
            ->assertOk()
            ->assertSee(asset('uploads/gallery/'.$item->image));

        $this->put(route('admin.gallery.update', $item->id), [
            'status' => 'draft',
        ])->assertRedirect(route('admin.gallery.index'));

        $this->assertDatabaseHas('edit', [
            'id' => $item->id,
            'image' => $item->image,
            'status' => 'draft',
        ]);
        $this->get(route('gallery'))
            ->assertOk()
            ->assertDontSee(asset('uploads/gallery/'.$item->image));

        $this->put(route('admin.gallery.update', $item->id), [
            'image' => UploadedFile::fake()->image('replacement.png'),
            'status' => 'published',
        ])->assertRedirect(route('admin.gallery.index'));

        $item->refresh();
        $replacementImage = public_path('uploads/gallery/'.$item->image);
        $this->assertFileDoesNotExist($originalImage);
        $this->assertFileExists($replacementImage);

        $this->delete(route('admin.gallery.destroy', $item->id))
            ->assertRedirect(route('admin.gallery.index'));

        $this->assertDatabaseMissing('edit', ['id' => $item->id]);
        $this->assertFileDoesNotExist($replacementImage);
    }
}
