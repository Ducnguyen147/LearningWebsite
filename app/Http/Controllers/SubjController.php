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

    public function create() {
        return view('TeaSubject.new_subject');
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
        $subject->update($request->validated());  
        return redirect('/subjects');    
    }

    public function show(SubjectPr $subject) {
        return view('TeaSubject.view_subject',[
            "show" => $subject,
        ]);
    }

    public function showTask(SubjectPr $subject) {
        return view('Teasubject.show',[
            "showtask" => $subject,
        ]);
    }

    public function destroy(SubjectPr $subject) {
        $subject->delete();
        return redirect("/subjects");
    }
}
