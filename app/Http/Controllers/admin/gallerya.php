<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class gallerya extends Controller
{
    public function index(): View
    {
        $gallery = gallery::latest()->paginate(12);

        return view('admin.gallery.index', compact('gallery'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $validated['image'] = $this->storeImage($request);
        gallery::create($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function edit(int $id): View
    {
        $gallery = gallery::findOrFail($id);

        return view('admin.gallery.edit', compact('gallery'));
    }

    public function redirectLegacyEdit(Request $request): RedirectResponse
    {
        $query = $request->query();
        $id = $request->query('id', array_key_first($query));

        abort_unless(is_numeric($id) && (int) $id > 0, 404);

        return redirect()->route('admin.gallery.edit', ['id' => (int) $id]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $gallery = gallery::findOrFail($id);
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($gallery->image);
            $validated['image'] = $this->storeImage($request);
        }

        $gallery->update($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $gallery = gallery::findOrFail($id);
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    private function storeImage(Request $request): string
    {
        $image = $request->file('image');
        $directory = public_path('uploads/gallery');
        File::ensureDirectoryExists($directory);

        $imageName = Str::uuid().'.'.$image->extension();
        $image->move($directory, $imageName);

        return $imageName;
    }

    private function deleteImage(?string $imageName): void
    {
        if ($imageName) {
            File::delete(public_path('uploads/gallery/'.basename($imageName)));
        }
    }
}
