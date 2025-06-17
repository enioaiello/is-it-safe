<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

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

    public function showResultPage() {
        return view('form.result');
  
    public function reportInsertion()
    {
        $report = new Reports();
        $report->id_user = Auth::id();
        $report->id_type = 1;
        $report->description = $_POST['description'];
        $report->save(); // Save to DB

        return redirect()->back()->with('success', 'Signalement effectué !');
    }

    public function report()
    {
        $report = new Reports();
        var_dump(Auth::id());
        return view('welcome');
    }
}
