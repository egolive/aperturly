<?php

namespace Egolive\Aperturly\Controllers;

use Egolive\Aperturly\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string|max:255',
        ]);

        auth()->user()->images()->create($data);

        return redirect()->route('images.index');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|string|max:255',
        ]);

        $image->update($data);

        return redirect()->route('images.show', $image);
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('images.index');
    }
}
