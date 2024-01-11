<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LaptopController extends Controller
{

    public function index()
    {

        $query = Laptop::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        $laptops = $query->paginate(6)->withQueryString();
        return view('homepage', compact('laptops'));
    }

    public function detail($id)
    {
        $laptop = Laptop::find($id);
        return view('detail', compact('laptop'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('laptop', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'brand' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('laptops/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table movies
        laptop::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'brand' => $request->brand,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $laptops = Laptop::latest()->paginate(10);
        return view('data-laptops', compact('laptops'));
    }

    public function edit($id)
    {
        $laptop = Laptop::find($id);
        $categories = Category::all();
        return view('form-edit', compact('laptop', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'brand' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/laptops/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data movie yang akan diupdate
        $laptop = Laptop::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $laptop->foto_sampul))) {
                File::delete(public_path('images/' . $laptop->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $laptop->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'brand' => $request->brand,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $laptop->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'brand' => $request->brand,
            ]);
        }

        return redirect('/laptops/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $laptop = Laptop::findOrFail($id);

        // Delete the movie's photo if it exists
        if (File::exists(public_path('images/' . $laptop->foto_sampul))) {
            if ($laptop->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $laptop->foto_sampul));
            }
        }

        // Delete the movie record from the database
        $laptop->delete();

        return redirect('/laptops/data')->with('success', 'Data berhasil dihapus');
    }
}
