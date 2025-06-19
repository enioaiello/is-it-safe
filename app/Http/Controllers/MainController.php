<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('welcome', ['user' => $user]);
    }

    public function showDashboard()
    {
        return view('dashboard');
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

    public function showResultPage() {
        return view('form.result');
    }

    public function admin()
    {
        $user = Auth::user();
        $reports = Reports::where('id_status', 1)->get();


        if ($user && $user->id_role < 3) {
            return view('admin.dashboard', compact('reports'));
        } else {
            abort(403, 'Accès non autorisé');
        }
    }

    public function reportInsertion(Request $request)
    {
        $report = new Reports();
        $report->id_user = Auth::id();
        $report->id_type = $request->input('type');
        $report->id_status = 1;
        $report->website_name = $_POST['value'];
        $report->description = $_POST['description'];
        $report->save();

        return redirect()->back()->with('success', 'Signalement effectué !');
    }

    public function reportLog()
    {
        $reports = Reports::where('id_user', auth()->id())->get();
        return view('auth.report-log', compact('reports'));
    }

    public function reportAccept($id)
    {
        $report = Reports::where('id', $id)->update(['id_status' => 2]);
        return redirect()->route('admin');
    }

    public function reportRefuse($id)
    {
        $report = Reports::where('id', $id)->update(['id_status' => 3]);
        return redirect()->route('admin');
    }
}
