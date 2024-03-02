<?php

namespace App\Http\Controllers;

use App\Models\LikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePhoto(Request $request)
    {
        $photoId = $request->input('photo_id');
        $hasLiked = $request->input('has_liked');

        $existingLike = LikeFoto::where('foto_id', $photoId)
            ->where('user_id', auth()->id())
            ->first();

        if ($hasLiked && !$existingLike) {
            LikeFoto::create([
                'foto_id' => $photoId,
                'user_id' => auth()->id(),
            ]);
        } elseif (!$hasLiked && $existingLike) {
            $existingLike->delete();
        }

        return response()->json(['message' => 'Like action successful']);
    }

}
