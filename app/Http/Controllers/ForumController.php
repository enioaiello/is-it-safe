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
}
