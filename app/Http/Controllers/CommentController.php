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
                'id_user' => 1,
                'id_forum' => $idForum,
                'comment' => $request->newComment
            ]);

            return response()->json([
                'idComment' => $comment->id,
                'comment' => $comment->comment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur serveur : '.$e->getMessage()
            ], 500);
        }
    }

    public function destroy($idComment)
    {
        try {
            $comment = Comments::findOrFail($idComment);

            if (auth()->user()->id !== $comment->id_user && !in_array(auth()->user()->id_role, [1, 2])) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $comment->delete();

            return response()->json(['message' => 'Comment deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}

