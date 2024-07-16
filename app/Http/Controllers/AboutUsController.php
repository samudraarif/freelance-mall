<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = AboutUs::first();
        return view('aboutus.index', compact('aboutus'));
    }

    public function create()
    {
        $aboutus = AboutUs::first();
        if ($aboutus) {
            return redirect()->route('aboutus.index')->with('error', 'Only one About Us entry is allowed.');
        }

        return view('aboutus.create');
    }

    public function store(Request $request)
    {
        $aboutus = AboutUs::first();
        if ($aboutus) {
            return redirect()->route('aboutus.index')->with('error', 'Only one About Us entry is allowed.');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('aboutus.index')->with('success', 'About Us created successfully.');
    }

    public function show(AboutUs $aboutu)
    {
        return view('aboutus.show', compact('aboutu'));
    }

    public function edit(AboutUs $aboutu)
    {
        return view('aboutus.edit', compact('aboutu'));
    }

    public function update(Request $request, AboutUs $aboutu)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $aboutu->update($request->all());

        return redirect()->route('aboutus.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(AboutUs $aboutu)
    {
        $aboutu->delete();

        return redirect()->route('aboutus.index')->with('success', 'About Us deleted successfully.');
    }
    public function homepage()
    {
        $aboutus = AboutUs::first();
        return view('aboutus.aboutus', compact('aboutus'));
    }
}
