<?php

namespace App\Http\Controllers;

use App\Models\PromoPopUp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class PromoPopUpController extends Controller
{
    public function index()
    {
        $promopopup = PromoPopUp::orderBy('created_at', 'DESC')->get();
        return view('promopopup.index', compact('promopopup'));
    }

    public function create()
    {
        return view('promopopup.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required'
        ]);

        $imageName = null;
        $datenow = Carbon::now()->format('Ymd_His');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'promo' . $datenow . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
        }

        PromoPopUp::create([
            'title' => $request->title,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('promopopup.index')->with('success', 'PromoPopUp article added successfully');
    }

    public function show($id)
    {
        $promopopup = PromoPopUp::findOrFail($id);
        return view('promopopup.show', compact('promopopup'));
    }

    public function edit($id)
    {
        $promopopup = PromoPopUp::findOrFail($id);
        return view('promopopup.edit', compact('promopopup'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required'
        ]);

        $promopopup = PromoPopUp::findOrFail($id);
        $imageName = $promopopup->image;

        $datenow = Carbon::now()->format('Ymd_His');

        if ($request->hasFile('image')) {
            if ($imageName) {
                Storage::delete('public/images/' . $imageName);
            }

            $image = $request->file('image');
            $imageName = 'promo' . $datenow . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $promopopup->update(['image' => $imageName]);
        }

        $promopopup->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()->route('promopopup.index')->with('success', 'PromoPopUp article updated successfully');
    }

    public function destroy($id)
    {
        $promopopup = PromoPopUp::findOrFail($id);

        if ($promopopup->image) {
            Storage::delete('public/images/' . $promopopup->image);
        }

        $promopopup->delete();

        return redirect()->route('promopopup.index')->with('success', 'PromoPopUp article deleted successfully');
    }
}
