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

    public function editFoto($slug)
    {
        $foto = Foto::where('slug', $slug)->first();

        return view('user.editFoto', compact('foto'));
    }

    public function updateFoto(Request $request, $slug)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $foto = Foto::where('slug', $slug)->first();

            $foto->judul = ucwords($request->judul);
            $foto->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                if ($foto->foto) {
                    unlink(storage_path("app/public/{$foto->foto}"));
                }

                $file = $request->file('foto');
                $fotoPath = $file->store('image', 'public');
                $foto->foto = $fotoPath;
            }

            $foto->save();

            return redirect()->route('foto-saya')->with('success', 'Berhasil Mengupdate Foto');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Gagal Mengupdate Foto');
        }
    }

    public function delete($slug)
    {
        try {
            $foto = Foto::where('slug', $slug)->first();

            if ($foto->foto) {
                \Storage::disk('public')->delete($foto->foto);
            }

            $foto->delete();

            return redirect()->route('foto-saya')->with('success', 'Berhasil Menghapus Foto');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('foto-saya')->with('error', 'Gagal Menghapus Foto');
        }
    }
}
