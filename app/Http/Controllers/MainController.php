<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\User_picture;
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
        $pp = User_Picture::where('id', Auth::user()->id_picture)->first();
        return view('dashboard', compact('pp'));
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

    public function showTOSPage()
    {
        return view('tos');
    }

    public function showResultPage() {
        return view('form.result');
    }

    public function admin()
    {
        $user = Auth::user();
        $reports = Reports::where('id_status', 1)
        ->get();
        $users = User::all();


        if ($user && $user->id_role < 3) {
            return view('admin.dashboard', compact('reports'), compact('users'));
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

        return redirect()->back()->withInput()->with('success', 'Signalement effectué !');
    }

    public function reportLog()
    {
        $reports = Reports::where('id_user', auth()->id())
        ->orderBy('id', 'desc')
        ->get();
        return view('auth.report-log', compact('reports'));
    }

    public function reportAccept($id)
    {
        $user = Auth::user();
        $report = Reports::where('id', $id)->update(['id_status' => 2]);
        $reportFame = Reports::where('id', $id)->first();
        $users = Reports::where('id', $id)->first();
        $fame = User::where('id', $reportFame->id_user)->first();
        if( $fame->fame > 195) {
            User::where('id', $id)->update(['fame' => 200]);
        } else {
            User::where('id', $users->id_user)->increment('fame', 5);
        }

        if ($user && $user->id_role < 3) {
            return redirect()->route('admin');
        } else {
            abort(403, 'Accès non autorisé');
        }
    }

    public function reportRefuse($id)
    {
        $user = Auth::user();
        $report = Reports::where('id', $id)->update(['id_status' => 3]);
        $reportFame = Reports::where('id', $id)->first();
        $users = Reports::where('id', $id)->first();
        $fame = User::where('id', $reportFame->id_user)->first();

        if ($fame->fame < 10) {
            User::where('id', $id)->update(['fame' => 0]);
        } else {
            User::where('id', $users->id_user)->decrement('fame', 10);
        }

        if ($user && $user->id_role < 3) {
            return redirect()->route('admin');
        } else {
            abort(403, 'Accès non autorisé');
        }
    }
}
