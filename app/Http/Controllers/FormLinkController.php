<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormLink;

class FormLinkController extends Controller
{
    public function index()
    {
        $formLink = FormLink::first(); // Ambil tautan pertama (dan satu-satunya)
        return view('form-link.index', compact('formLink'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $formLink = FormLink::first();
        if ($formLink) {
            $formLink->update(['url' => $request->url]);
        } else {
            FormLink::create(['url' => $request->url]);
        }

        return redirect()->route('form-link.index');
    }

    public function destroy($id)
    {
        $formLink = FormLink::findOrFail($id);
        $formLink->delete();

        return redirect()->route('form-link.index');
    }

    public function showForm()
    {
        $formLink = FormLink::latest()->first(); // Ambil tautan terbaru dari database
        return view('googleForm', compact('formLink'));
    }
}
