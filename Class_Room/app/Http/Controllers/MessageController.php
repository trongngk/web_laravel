<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $message = new Message();
        $message->userSent = session()->get("name");
        $message->content = $request->get('message');
        $message->userReceive = $request->get("mess");
        $message->save();
        return redirect()->back();
    }

    public function destroy(Message $message)
    {
       $message->delete();
       return redirect()->back();

    }
    public function message()
    {
        $message = DB::table("message")        
        ->where('userReceive', session()->get('name'))
        ->get();
        // dd($message,session()->get('name'));
        // dd(session()->get('name'));
        return view("message.index",[
            "message" => $message
        ]);
    }

    // public function detail(Request $request, $id)
    // {
    //     $user = $request->get('mess');
    //     return redirect()->route('data.detail',);

    // }
}
