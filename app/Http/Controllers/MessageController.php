<?php


namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showPage()
    {
        $messages = Message::with(['user.picture'])->orderBy('id', 'desc')->get();

        //dd($messages->toArray());

        return view('message', ['messages' => $messages]);
    }
}
