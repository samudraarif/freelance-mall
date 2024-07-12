<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Menampilkan semua kontak.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::latest()->get(); // Ambil semua kontak, diurutkan dari yang terbaru
        return view('contactus.index', compact('contacts'));
    }

    /**
     * Menampilkan detail kontak.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id); // Cari kontak berdasarkan ID, jika tidak ditemukan akan melempar 404
        return view('contactus.show', compact('contact'));
    }

    /**
     * Menampilkan form kontak.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Menyimpan data kontak ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'description' => 'required|string',
        ]);

        // Simpan data ke dalam database menggunakan Eloquent
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->contact = $validatedData['contact'];
        $contact->email = $validatedData['email'];
        $contact->description = $validatedData['description'];
        $contact->save();

        // Redirect dengan pesan sukses atau bisa disesuaikan
        return redirect()->route('contactus')->with('success', 'Thank you for contacting us!');
    }
}
