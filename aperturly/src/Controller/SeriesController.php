<?php

namespace Egolive\Aperturly\Controllers;

use Egolive\Aperturly\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::with(['images'])->get();
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->series()->create($data);

        return redirect()->route('series.index');
    }

    public function show(Series $series)
    {
        return view('series.show', compact('series'));
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(Request $request, Series $series)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $series->update($data);

        return redirect()->route('series.show', $series);
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index');
    }
}
