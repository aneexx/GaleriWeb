<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'foto_id' => $request->input('photo_id'),
        ]);

        return response()->json(['comment' => $comment]);
    }

    public function getComments($photoId)
{
    $comments = Comment::with('user')
        ->where('foto_id', $photoId)
        ->get();

    return response()->json(['comments' => $comments]);
}

    public function getActiveUserId(Request $request)
    {
        if (Auth::check()) {
            $activeUserId = Auth::id();
            return response()->json(['activeUserId' => $activeUserId]);
        }

        return response()->json(['activeUserId' => null]); 
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        if ($comment->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        // Hitung ulang jumlah komentar setelah penghapusan
        $commentCount = Comment::count();

        // Kirim respons JSON ke klien
        return response()->json(['commentCount' => $commentCount]);
    }
}
