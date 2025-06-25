<?php


namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showPage()
    {
        $messages = Message::with(['user.picture'])->orderBy('id', 'desc')->get();

        //dd($messages->toArray());

        return view('message', ['messages' => $messages]);
    }

    public function addMessage(Request $request) {
        try {
            $request->validate([
                'title' => 'required|string|max:100',
                'message' => 'required|string|max:10000',
            ]);

            if (auth()->user()->id_role !== 1 && auth()->user()->id_role !== 2) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            Message::create([
                'title' => $request->title,
                'message' => $request->message,
                'id_user' => $request->id_user
            ]);

            $user = \App\Models\User::with('picture')->find($request->id_user);

            $pseudo = $user->pseudo;
            $picture_url = $user->picture ? $user->picture->picture_url : null;

            return response()->json([
                'success' => true,
                'pseudo' => $pseudo,
                'picture_url' => $picture_url,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur serveur : '.$e->getMessage()
            ], 500);
        }
    }
}
