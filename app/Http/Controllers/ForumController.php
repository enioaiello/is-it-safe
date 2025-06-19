<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forums;

class ForumController extends Controller {
    public function showForm($id)
    {
        $forum = Forums::with(['user', 'comments.user'])
            ->where('id', $id)
            ->firstOrFail();

        //dd($forum->toArray());

        return view('form/forum', ['forum' => $forum]);
    }

    public function showAllForm() {
        $forums = Forums::with('user')->orderBy('created_at', 'desc')->get();

        //dd($forums->toArray());

        return view('form/all-forum', ['forums' => $forums]);

    }
}
