<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class FotoSayaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        $foto = foto::where('user_id', $userId)->get();
        return view('user.fotoSaya',compact('user', 'foto'));
    }

    public function detailFotoSaya($slug)
    {
        $detail = foto::where('slug', $slug)->with('like')->first();
        $jumlahLike = $detail->like->count();
        return view('user.detailFotoSaya', compact('detail', 'jumlahLike'));
    }
}
