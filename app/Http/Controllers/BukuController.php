<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
{
    // Mulai query untuk model Buku
    $query = Buku::query();

    // Cek apakah ada input pencarian
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        // Tambahkan filter pencarian
        $query->where('judul', 'like', '%' . $search . '%')
              ->orWhere('penulis', 'like', '%' . $search . '%');
    }

    // Urutkan berdasarkan ID terbaru dan dapatkan hasilnya dengan pagination
    $data_buku = $query->orderByDesc('id')->paginate(5); // 5 buku per halaman

    // Return ke view dengan hasil pencarian
    return view('buku.index', compact('data_buku'));
}


    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id); // Mencari buku berdasarkan ID
        $buku->judul = $request->judul; // Memperbarui data judul
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save(); // Menyimpan perubahan data ke database

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil diupdate!');
    }

        public function register(Request $request)
    {
        // Validasi dan buat pengguna baru
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Kirim email ke pengguna
        Mail::to($user->email)->send(new UserRegistered($user->toArray()));

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('home')->with('success', 'Pendaftaran berhasil! Email telah dikirim ke alamat Anda.');
    }
}
