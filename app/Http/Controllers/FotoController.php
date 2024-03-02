<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class FotoController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi request
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('foto');

            $fotoPath = $file->store('image', 'public');

            $userId = auth()->user()->id;

            foto::create([
                'judul' => ucwords($request->judul),
                'deskripsi' => $request->deskripsi,
                'foto' => $fotoPath,
                'user_id' => $userId,
            ]);

            return redirect()->back()->with('success', 'Berhasil Mengupload Foto');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Gagal Mengupload Foto');
        }
    }

    public function detailFoto($slug)
    {
        $detail = foto::where('slug', $slug)->with('like')->first();
        $jumlahLike = $detail->like->count();
        return view('user.detailFoto', compact('detail', 'jumlahLike'));
    }
}
