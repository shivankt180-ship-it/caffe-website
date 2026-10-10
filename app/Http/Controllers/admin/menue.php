<?php

namespace App\Http\Controllers\admin;

use App\Models\menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class menue extends Controller
{
    public function index()
    {
        $menu = menu::latest()->get();

        return view('admin.menue.index', compact('menu'));
    }


    public function create()
    {
        return view('admin.menue.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'discription' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $validated['image'] = $this->storeImage($request);

        menu::create($validated);

        return redirect()
            ->route('admin.menue.index')
            ->with('success', 'Menu successfully created');
    }


    public function edit($id)
    {
        $menu = menu::findOrFail($id);

        return view('admin.menue.edit', compact('menu'));
    }


    public function redirectLegacyEdit(Request $request)
    {
        $query = $request->query();
        $id = $request->query('id', array_key_first($query));

        abort_unless(is_numeric($id) && (int) $id > 0, 404);

        return redirect()->route('admin.menue.edit', ['id' => (int) $id]);
    }


    public function update(Request $request, $id)
    {
        $menu = menu::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'discription' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request);
        } else {
            $validated['image'] = $menu->image;
        }

        $menu->update($validated);

        return redirect()
            ->route('admin.menue.index')
            ->with('success', 'Menu updated successfully!');
    }


    public function destroy($id)
    {
        $menu = menu::findOrFail($id);

        $menu->delete();

        return redirect()
            ->route('admin.menue.index')
            ->with('success', 'Menu deleted successfully!');
    }


    private function storeImage(Request $request): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $image = $request->file('image');

        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->move(
            public_path('uploads/menu'),
            $imageName
        );

        return $imageName;
    }
}

