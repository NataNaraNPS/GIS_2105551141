<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BackendController extends Controller
{
    // Fungsi untuk menampilkan semua pengguna
    public function index()
    {
        $data = Data::orderBy('id', 'desc')->get();
        return view('backend.viewdata', compact('data'));
    }

    // Fungsi untuk menampilkan formulir tambah pengguna
    public function create()
    {

    }

    // Fungsi untuk menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama_rs' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',

            // Sesuaikan dengan nama-nama field yang ada pada tabel
        ]);

        // Memasukkan data ke dalam database
        $data = Data::create([
            'nama_rs' => $validatedData['nama_rs'],
            'latitude' => $validatedData['latitude'],
            'longtitude' => $validatedData['longtitude'],
            // Sesuaikan dengan nama-nama field yang ada pada tabel
        ]);

        // Jika data berhasil dimasukkan, Anda dapat menangani respons di sini
        // Contoh:
        return view('backend.index');
    }

    // Fungsi untuk menampilkan detail pengguna berdasarkan ID
    public function show($id)
    {
        // Logika untuk menampilkan detail pengguna
    }

    // Fungsi untuk menampilkan formulir edit pengguna berdasarkan ID
    public function edit($id)
    {
        // Logika untuk menampilkan formulir edit pengguna
    }

    // Fungsi untuk memperbarui pengguna berdasarkan ID
    public function update(Request $request, $id)
    {
        // Logika untuk memperbarui pengguna
    }

    // Fungsi untuk menghapus pengguna berdasarkan ID
    public function destroy($id)
    {
        // Logika untuk menghapus pengguna
    }
}
