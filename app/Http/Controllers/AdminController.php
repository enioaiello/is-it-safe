<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function DeleteUser($id)
    {
        User::destroy($id);

        return redirect('/admin');
    }

    public function search($pseudo)
    {
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
        $users = User::all();

        $html = view('components.user-list', ['users' => $users])->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
}
