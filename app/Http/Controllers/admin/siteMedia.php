<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class siteMedia extends Controller
{
    public function edit(): View
    {
        return view('admin.site-media.edit', [
            'heroVideo' => SiteSetting::get('hero_video'),
            'storyPhoto' => SiteSetting::get('story_photo'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'hero_video' => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:51200'],
            'story_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        foreach (['hero_video' => 'site/hero', 'story_photo' => 'site/story'] as $field => $directory) {
            if (! $request->hasFile($field)) {
                continue;
            }

            $oldPath = SiteSetting::get($field);
            $newPath = $request->file($field)->storePublicly($directory, 'public');

            SiteSetting::set($field, $newPath);

            if ($oldPath) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        return redirect()
            ->route('admin.site-media.edit')
            ->with('success', 'Homepage media updated successfully.');
    }
}
