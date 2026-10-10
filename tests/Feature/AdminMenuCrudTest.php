<?php

namespace Tests\Feature;

use App\Models\menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminMenuCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu_can_be_edited_and_deleted_from_admin(): void
    {
        $item = menu::create([
            'name' => 'House Coffee',
            'price' => 4.50,
            'category' => 'coffee',
            'discription' => 'Original description',
            'status' => 'draft',
        ]);

        $this->get('/admin/menue/edit?' . $item->id . '=')
            ->assertRedirect(route('admin.menue.edit', $item->id));

        $this->get(route('admin.menue.edit', $item->id))
            ->assertOk()
            ->assertSee(route('admin.menue.update', $item->id))
            ->assertSee('name="_method" value="PUT"', false)
            ->assertSee('House Coffee');

        $this->put(route('admin.menue.update', $item->id), [
            'name' => 'Updated Coffee',
            'price' => 5.25,
            'category' => 'coffee',
            'discription' => 'Updated description',
            'status' => 'published',
        ])->assertRedirect(route('admin.menue.index'));

        $this->assertDatabaseHas('menu', [
            'id' => $item->id,
            'name' => 'Updated Coffee',
            'price' => 5.25,
            'discription' => 'Updated description',
            'status' => 'published',
        ]);

        $this->delete(route('admin.menue.destroy', $item->id))
            ->assertRedirect(route('admin.menue.index'));

        $this->assertDatabaseMissing('menu', ['id' => $item->id]);
    }
}
