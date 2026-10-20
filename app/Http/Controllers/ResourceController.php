<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = Resource::latest()->get();
        return view('resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'nullable',
        'category' => 'required',
        'description' => 'nullable',
        'resource_type' => 'required',
        'resource_link' => 'nullable',
        'file' => 'nullable|file'
    ]);

    $filePath = null;

    if ($request->hasFile('file')) {

        $filePath = $request->file('file')
                            ->store('Resource', 'public');
    }

    Resource::create([
        'title' => $request->title,
        'author' => $request->author,
        'category' => $request->category,
        'description' => $request->description,
        'resource_type' => $request->resource_type,
        'resource_link' => $request->resource_link,
        'file_path' => $filePath,
    ]);

    return redirect()
        ->route('resources.index')
        ->with('success', 'Resource added successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'nullable',
            'category' => 'required',
            'description' => 'nullable',
            'resource_type' => 'required',
            'resource_link' => 'nullable',
        ]);

        $resource->update([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'resource_type' => $request->resource_type,
            'resource_link' => $request->resource_link,
        ]);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Resource updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()
            ->route('resources.index')
            ->with('success', 'Resource deleted successfully.');
    }
}
