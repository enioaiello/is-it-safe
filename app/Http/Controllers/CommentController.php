<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller {

    public function addComment(Request $request, $idForum)
    {
        try {
            $request->validate([
                'newComment' => 'required|string|max:1000',
            ]);

            $comment = Comments::create([
                'id_user' => 1,  // à changer quand auth configuré
                'id_forum' => $idForum,
                'comment' => $request->newComment
            ]);

            return response()->json([
                'comment' => $comment->comment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur serveur : '.$e->getMessage()
            ], 500);
        }
    }
}

