<?php

namespace App\Http\Controllers;

use App\Models\LiveClass;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    public function index()
    {
        $liveClasses = LiveClass::all();
        return view('admin.liveclasses.index', compact('liveClasses'));
    }

    public function create()
    {
        return view('admin.liveclasses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        LiveClass::create($validatedData);

        return redirect()->route('admin.liveclasses')->with('success', 'Live class created successfully.');
    }

    public function edit($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        return view('admin.liveclasses.edit', compact('liveClass'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        $liveClass = LiveClass::findOrFail($id);
        $liveClass->update($validatedData);

        return redirect()->route('admin.liveclasses')->with('success', 'Live class updated successfully.');
    }

    public function destroy($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        $liveClass->delete();

        return redirect()->route('admin.liveclasses')->with('success', 'Live class deleted successfully.');
    }
}

