<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
   
    
    //  Public gallery page shows only active items.
     
    public function index()
    {
        $galleryItems = Gallery::active()->latest()->get();
        return view('gallery.index', compact('galleryItems'));
    }

   
    // Admin gallery listing.
    
    public function adminIndex()
    {
        $galleryItems = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleryItems'));
    }

    
    //  Show create form.
    
    public function create()
    {
        return view('admin.gallery.create');
    }

    
    //   Store a new gallery item.
     
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image'       => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'category'    => 'nullable|string|max:100',
            'is_active'   => 'nullable|boolean',
        ]);

        // Handle image upload
        $imageName = $this->uploadImage($request->file('image'));

        Gallery::create([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image'       => $imageName,
            'category'    => $validated['category'] ?? null,
            'is_active'   => $request->has('is_active') ? (bool) $request->is_active : true,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image added successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update an existing gallery item.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'category'    => 'nullable|string|max:100',
            'is_active'   => 'nullable|boolean',
        ]);

        $imageName = $gallery->image; // keep existing by default

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            $this->deleteImage($gallery->image);
            $imageName = $this->uploadImage($request->file('image'));
        }

        $gallery->update([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image'       => $imageName,
            'category'    => $validated['category'] ?? null,
            'is_active'   => $request->has('is_active') ? (bool) $request->is_active : false,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image updated successfully!');
    }

    /**
     * Delete a gallery item and its image file.
     */
    public function destroy(Gallery $gallery)
    {
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully!');
    }

    
    /**
     * Save uploaded image to public/assets/images/gallery/ and return filename.
     */
    private function uploadImage($file): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('assets/images/gallery');
        $file->move($destination, $filename);
        return $filename;
    }

    /**
     * Delete an image file from the gallery folder (safe � only deletes from gallery/).
     */
    private function deleteImage(?string $filename): void
    {
        if ($filename) {
            $path = public_path('assets/images/gallery/' . $filename);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}