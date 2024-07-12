<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Storage;


class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenant = Tenant::orderBy('created_at', 'DESC')->get();
        return view('tenant.index', compact('tenant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tenant::create($request->all());
        // return redirect()->route('tenant')->with('success', 'Tenant added Successfully');
        $request->validate([
            'tenant_name' => 'required',
            'category' => 'required',
            'floor' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validasi untuk file gambar
        ]);

        // Simpan gambar ke penyimpanan
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName); // Simpan gambar di direktori storage

            // Atau simpan url gambar ke database jika Anda menyimpannya secara terpisah
            // $imageUrl = $image->storeAs('public/images', $imageName);
        }

        // Simpan data tenant ke database
        Tenant::create([
            'tenant_name' => $request->tenant_name,
            'category' => $request->category,
            'floor' => $request->floor,
            'description' => $request->description,
            'image' => $imageName // Simpan nama file gambar ke dalam kolom 'image' pada tabel
            // atau simpan url gambar jika Anda menyimpannya secara terpisah
            // 'image' => $imageUrl
        ]);
        return redirect()->route('tenant')->with('success', 'Tenant added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('tenant.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tenant = Tenant::findOrFail($id);

        return view('tenant.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $tenant = Tenant::findOrFail($id);
        // $tenant->update($request->all());
        // return redirect()->route('tenant')->with('success', 'Product Updated Successfully');
        $request->validate([
            'tenant_name' => 'required',
            'category' => 'required',
            'floor' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validasi untuk file gambar
        ]);

        $tenant = Tenant::findOrFail($id);

        // Update data tenant
        $tenant->update([
            'tenant_name' => $request->tenant_name,
            'category' => $request->category,
            'floor' => $request->floor,
            'description' => $request->description,
        ]);

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama (jika ada)
            if ($tenant->image) {
                Storage::delete('public/images/' . $tenant->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);

            // Update nama file gambar di database
            $tenant->update(['image' => $imageName]);
        }

        return redirect()->route('tenant')->with('success', 'Tenant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($tenant->image) {
            Storage::delete('public/images/' . $tenant->image);
        }

        $tenant->delete();

        return redirect()->route('tenant')->with('success', 'tenant deleted successfully');
    }
}
