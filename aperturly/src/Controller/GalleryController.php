<?php

namespace Egolive\Aperturly\Controllers;

use Egolive\Aperturly\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['series', 'images'])->get();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->galleries()->create($data);

        return redirect()->route('galleries.index');
    }

    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery->update($data);

        return redirect()->route('galleries.show', $gallery);
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index');
    }
}
