<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
