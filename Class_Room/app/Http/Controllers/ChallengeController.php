<?php

namespace App\Http\Controllers;

use App\Models\Challenges;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function challenge()
    {
        $challenge = Challenges::all();
        return view("challenge.index",[
            'challenge' => $challenge
        ]);
    }

    public function create()
    {
        return view("challenge.create");
    }

    public function store(Request $request)
    {
        $challenge = new Challenges();
        $challenge->name = $request->name;
        $challenge->hint = $request->hint;
        $challenge->save();
        $challengeI = Challenges::find($challenge->id);
        $file = $request->file('file');
        $filename = $challengeI->id.$file->getClientOriginalName();
        $request->file->move('assets', $filename);
        $challenge->save();
        return redirect("challenge/");

    }
    public function detail(Challenges $challenge)
    {
        $challenge = Challenges::find($challenge->id);
        // dd($challenge);
        return view("challenge.detail",[
            "challenge" => $challenge
        ]);

    }

    public function destroy(Challenges $challenge)
    {
        $challenge->delete();
        
       return redirect()->back();

    }

    public function hint(Challenges $challenge)
    {
        $challenge = Challenges::find($challenge->id);

       return view("challenge.hint",[
        "challenge" => $challenge
       ]);

    }

    public function submit(Request $request, Challenges $challenge)
    {
        $challenge = Challenges::find($challenge->id);
        $answer = $challenge->id.$request->get('answer') . '.txt';
        $path = public_path("assets\\".$answer);
        $isExists = file_exists($path);
        if ($isExists) {
            return view("challenge.answer", [
                "answer" => $answer
            ]);
        } else
            return view("challenge.notanswer", [
                'challenge' => $challenge
            ]);
       

    }
}
