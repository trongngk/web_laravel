<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubmit;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentsController extends Controller
{
    public function assignment()
    {
        $assignments = Assignment::all();
        $assignmentSubs = AssignmentSubmit::all();        
        return view("assignments.index",[
            'assignments' => $assignments,
            'assignmentSubs' => $assignmentSubs

        ]);
    }

    public function create()
    {
        return view("assignments.create");
    }

    public function store(Request $request)
    {
        $assignment = new Assignment();

        $file=$request->file('file');
        $filename=$file->getClientOriginalName();
        $request->file->move('assets',$filename);

        $assignment->deadline = $request->time;
        $assignment->description = $request->description;
        $assignment->filename = $filename;
        $assignment->save();
        return redirect("assignments/");

    }
    public function submitStore(Request $request, Assignment $assignment)
    {
        $assignmentSub = new AssignmentSubmit();
        $assignmentSub->subId = $assignment->id;
        $file=$request->file('file');
        $filename=$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $assignmentSub->studentSubmit = session()->get("name");
        $assignmentSub->filename = $filename;
        $assignmentSub->save();
        return redirect("assignments/");

    }

    public function destroy(Assignment $assignment, AssignmentSubmit $assignmentSub)
    {
        $assignment->delete();
        $assignmentSub = DB::table('assignment_submit')->where('subId', $assignment->id)->delete();
       return redirect("assignments/");

    }

    public function destroySub(AssignmentSubmit $assignmentSub)
    {
        $assignmentSub->delete();
        return redirect("assignments/");

    }

    public function edit(Assignment $assignment)
    {
       return view('assignments.edit', [
        "assignment" => $assignment
       ]);
    }

    public function update(Request $request, Assignment $assignment)
    {
        $assignment = Assignment::find($assignment->id);
        $file=$request->file('file');
        $filename=$file->getClientOriginalName();  
        $request->file->move('assets',$filename);   
        $assignment->filename = $filename;
        $assignment->update();
        return redirect('/assignments//');
    }

    public function studentDetail(Assignment $assignment, Request $request){   
        $assignmentI = $request->get('assign'); 
        $assignment = Assignment::find($assignmentI);
        $assignmentSub = DB::table('assignment_submit')
            ->where('subId', $assignmentI)
            ->where('studentSubmit', session()->get('name'))
            ->get(); 
        return view("assignments.student_detail",[
            'assignment' => $assignment,
            'assignmentSubs' => $assignmentSub

        ]);
    }
    
    public function teacherDetail(Request $request){   
        $assignmentI = $request->get('assign'); 
        $assignment = Assignment::find($assignmentI);
        $assignmentSub = DB::table('assignment_submit')
            ->where('subId', $assignmentI)
            ->get(); 
        return view("assignments.teacher_detail",[
            'assignment' => $assignment,
            'assignmentSubs' => $assignmentSub

        ]);
    }

    function downloadFile(Request $request,$file){
        return response()->download(public_path("assets\\".$file));
    }

}
