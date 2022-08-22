<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $datas = data::all();
        return view("data.index",['datas' => $datas]);
    }

    public function create()
    {
        return view("data.create");
    }

    public function store(Request $request)
    {
        $data = new data();
        $data->username = $request->get('username');
        $data->fullname = $request->get('fullname');
        $data->password = $request->get('password');
        $data->email = $request->get('email');
        $data->phone = $request->get('phone');
        $data->role = $request->get('role');
        $data->save();
        return redirect("/");

    }

    public function destroy(data $data)
    {
       $data->delete();
       return redirect("/");

    }

    public function edit(data $data)
    {
       return view('data.edit', [
        "data" => $data
       ]);
    }

    public function Teacherupdate(Request $request, data $data)
    {
        $data = data::find($data->id);
        $data->username = $request->input('username');
        $data->fullname = $request->input('fullname');
        $data->password = $request->input('password');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->role = $request->input('role');   
        $data->update();
        return redirect("/");
    }

    public function Studentupdate(Request $request, data $data)
    {
        $data = data::find($data->id);
        $data->password = $request->input('password');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->update();
        return redirect("/");
    }

    public function detail(data $data, Request $request){   
        
        $receive = $request->get('mess');
        $message = DB::table("message")
        ->where('userSent',session()->get('name'))
        ->where('userReceive', $receive)
        ->get();
        // dd(session()->get('name'));
        // dd($receive,$message);
        return view("data.detail",[
            'data' => $data,
            "message" => $message
        ]);
        
    }
}
