<?php

namespace App\Http\Controllers;

use App\Models\SubjectPr;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectFormRequest;
use Illuminate\Support\Facades\Auth;

class SubjController extends Controller
{
    public function index() {
        $sub_info = Auth::user()->subjects;
        return view('TeaSubject.subjects',["subjects"=>$sub_info]);
    }

    public function indexStudent() {
        $sub_info = Auth::user()->subjects;
        return view('students.subjects',["subjects"=>$sub_info]);
    }

    public function registerSubjects() {
        $user = Auth::user();
        $takenSubjects = $user->subjects()->pluck('subject_prs.id');
        $availableSubjects = SubjectPr::whereNotIn('id', $takenSubjects)->with('user')->get();

        return view('students.register',["availableSubjects"=>$availableSubjects]);
    }

    public function create() {
        return view('TeaSubject.new_subject');
    }

    public function registerStudent(SubjectPr $subject)
{
    $user = Auth::user();
    $user->subjects()->attach($subject->id);

    return redirect('/student/subjects');
}

    public function store(SubjectFormRequest $request) { 
            SubjectPr::create($request->validated()); 
            return redirect('/subjects');    
    }

    public function edit(SubjectPr $subject) {
        return view('TeaSubject.edit_subject',[
            "subject" => $subject
        ]);
    }

    public function update(SubjectFormRequest $request, SubjectPr $subject) {
        $this->authorize('view',$subject);
        $subject->update($request->validated());  
        return redirect('/subjects');    
    }

    public function show(SubjectPr $subject) {
        $this->authorize('view',$subject);
        return view('TeaSubject.view_subject',[
            "show" => $subject,
        ]);
    }

    public function showStudent(SubjectPr $subject) {
        // $this->authorize('view',$subject);
        return view('students.view',[
            "show" => $subject,
        ]);
    }

    public function showTask(SubjectPr $subject) {
        $this->authorize('view',$subject);
        return view('Teasubject.show',[
            "showtask" => $subject,
        ]);
    }

    public function showTaskStudent(SubjectPr $subject) {
        $this->authorize('viewStudent',$subject);
        return view('students.show',[
            "showtask" => $subject,
        ]);
    }

    public function destroy(SubjectPr $subject) {
        $this->authorize('view',$subject);
        $subject->delete();
        return redirect("/subjects");
    }

    public function deregisterStudent(SubjectPr $subject) {
        $user = Auth::user();
        $user->subjects()->detach($subject->id);
        return redirect("/student/subjects");
    }
}
