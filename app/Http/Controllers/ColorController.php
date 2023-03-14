<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);
        return redirect()->route('color.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Color $color)
    {
        return view('color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);
        return view('color.show', compact('color'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('color.index');
    }
}
