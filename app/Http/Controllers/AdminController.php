<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function DeleteUser($id)
    {
        $user = Auth::user();

        if (!$user || $user->id_role >= 3) {
            abort(403, 'Accès non autorisé');
        }

        User::destroy($id);

        return redirect('/admin');
    }

    public function search($pseudo)
    {
        $user = Auth::user();

        if (!$user || $user->id_role >= 3) {
            abort(403, 'Accès non autorisé');
        }

        $users = User::where('pseudo', 'LIKE', $pseudo . '%')->get();

        if ($users->isEmpty()) {
            return response()->json([
                'success' => false,
                'html' => '<p class="text-center text-gray-500 dark:text-gray-300">Aucun utilisateur trouvé.</p>'
            ]);
        }

        $html = view('components.user-list', ['users' => $users])->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    public function allUsers()
    {
        $user = Auth::user();

        if (!$user || $user->id_role >= 3) {
            abort(403, 'Accès non autorisé');
        }

        $users = User::all();

        $html = view('components.user-list', ['users' => $users])->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    public function edit(User $user)
    {
        $currentUser = Auth::user();

        if (!$currentUser || $currentUser->id_role >= 3) {
            abort(403, 'Accès non autorisé');
        }

        return view('admin.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $currentUser = Auth::user();

        if (!$currentUser || $currentUser->id_role >= 3) {
            abort(403, 'Accès non autorisé');
        }

        $user = User::findOrFail($request->input('id'));

        $user->pseudo = $request->input('pseudo');
        $user->email = $request->input('email');
        $user->fame = $request->input('fame');

        $user->save();

        return redirect()->route('admin')->with('success', 'Utilisateur mis à jour avec succès.');
    }
}
