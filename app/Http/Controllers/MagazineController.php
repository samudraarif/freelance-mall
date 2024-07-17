<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::orderBy('created_at', 'DESC')->get();
        return view('magazine.index', compact('magazines'));
    }

    public function create()
    {
        return view('magazine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'required|mimes:pdf|max:12000'
        ]);

        $imageName = null;
        $pdfUrl = null;
        $previousPdfUrl = null;

        $datenow = Carbon::now()->format('Ymd_His');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'magazine' . $datenow . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');

            $pdfUrl = 'pdf' . $datenow . '.' . $pdfFile->extension();
            $pdfFile->storeAs('public/pdfs', $pdfUrl);
        }

        Magazine::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'pdf_url' => $pdfUrl,
        ]);

        return redirect()->route('magazine.index')->with('success', 'Magazine article added successfully');
    }

    public function show($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('magazine.show', compact('magazine'));
    }

    public function edit($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('magazine.edit', compact('magazine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $magazine = Magazine::findOrFail($id);
        $imageName = $magazine->image;
        $datenow = Carbon::now()->format('Ymd_His');
        if ($request->hasFile('image')) {
            if ($imageName) {
                Storage::delete('public/images/' . $imageName);
            }

            $image = $request->file('image');
            $imageName = 'magazine' . $datenow . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $magazine->update(['image' => $imageName]);
        }

        $pdfMaga = $magazine->pdf_url;
        if ($request->hasFile('pdf_file')) {
            if ($pdfMaga) {
                Storage::delete('public/pdfs/' . $pdfMaga);
            }
            $pdfFile = $request->file('pdf_file');
            $pdfUrl = 'pdf' . $datenow . '.' . $pdfFile->extension();
            $pdfFile->storeAs('public/pdfs', $pdfUrl);
            $magazine->update(['pdf_url' => $pdfUrl]);
        }


        $magazine->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('magazine.index')->with('success', 'Magazine article updated successfully');
    }

    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);

        if ($magazine->image) {
            Storage::delete('public/images/' . $magazine->image);
        }

        $magazine->delete();

        return redirect()->route('magazine.index')->with('success', 'Magazine article deleted successfully');
    }

    public function detail($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('magazine.detail', compact('magazine'));
    }
}
