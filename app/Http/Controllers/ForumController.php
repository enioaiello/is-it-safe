<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forums;

class ForumController extends Controller {
    public function showForm($id)
    {
        $forum = Forums::with(['user.picture', 'comments.user'])
            ->where('id', $id)
            ->firstOrFail();



        return view('form/forum', ['forum' => $forum]);
    }

    public function showAllForm() {
        $forums = Forums::with('user')->orderBy('created_at', 'desc')->get();

        //dd($forums->toArray());

        return view('form/all-forum', ['forums' => $forums]);

    }

    public function showSpecForm($trimmed)
    {

        $forums = Forums::where('title', 'LIKE', '%'. $trimmed .'%')->get();
        return view('form/all-forum', compact('forums', 'trimmed'));
    }

    public function addForum(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'id_user' => 'required|integer|exists:users,id',
            ]);

            $forum = Forums::create([
                'id_user' => $request->id_user,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return response()->json([
                'success' => true,
                'forum' => $forum
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Erreur serveur : '.$e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
            ]);

            $forum = Forums::findOrFail($id);

            // Vérifie que l'user est proprio ou admin
            if (auth()->user()->id !== $forum->id_user && !in_array(auth()->user()->id_role, [1, 2])) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $forum->title = $request->title;
            $forum->description = $request->description;
            $forum->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function destroy($idForum)
    {
        try {
            $forum = Forums::findOrFail($idForum);

            if (auth()->user()->id !== $forum->id_user && !in_array(auth()->user()->id_role, [1, 2])) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $forum->delete();

            return response()->json(['message' => 'Forum deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
