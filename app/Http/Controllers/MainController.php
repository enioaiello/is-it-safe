<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
=======
use Symfony\Component\Console\Input\Input;
>>>>>>> Stashed changes

class MainController extends Controller
{
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

<<<<<<< Updated upstream
    public function showResultPage() {
        return view('form.result');
    }
=======
    public function admin()
    {
        $user = Auth::user();

        if ($user && $user->id_role < 3) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Accès non autorisé');
        }
    }
    public function showResultPage()
    {
        return view('form.result');
    }
    public function reportInsertion()
    {
        $report = new Reports();
        $report->id_user = Auth::id();
        $report->id_type = 1;
        $report->description = $_POST['description'];
        $report->save(); // Save to DB

        return redirect()->back()->with('success', 'Signalement effectué !');
    }

>>>>>>> Stashed changes
}
