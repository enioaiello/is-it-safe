<?php

namespace App\Http\Controllers;

use App\Models\Reports;
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

    public function report()
    {
        $report = new Reports();
        //TODO $report->id_type = 1
    }
}
