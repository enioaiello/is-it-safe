<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('welcome', ['user' => $user]);
    }

    public function showSafePage()
    {
        return view('form.safe-it');
    }

    public function showReportpage()
    {
        return view('form.report-it');
    }

    public function showForumPage()
    {
        return view('form.forum');
    }

    public function showProposPage()
    {
        return view('form.propos');
    }

    public function admin()
    {
        $user = Auth::user();

        if ($user && $user->id_role < 3) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Accès non autorisé');
        }
    }
}
