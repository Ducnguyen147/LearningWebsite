<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskPrRequest;
use App\Http\Requests\UpdateTaskPrRequest;
use App\Models\TaskPr;
use App\Models\SubjectPr;

class TaskPrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(SubjectPr $subject)
    {
        return view("tasks.create",[
            "tasks"=>$subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectPr $subject, StoreTaskPrRequest $request)
    {
        $subject->tasks()->create($request->validated());
        return redirect()->route("subjects.show",["subject"=>$subject->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskPr $task)
    {
        $this->authorize('view',$task);
        return view('tasks.show',[
            "tasks" => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskPr $task)
    {
        return view('tasks.edit',[
            "tasks" => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskPrRequest $request, TaskPr $task)
    {
        $task->update($request->validated()); 
        return redirect()->route("subjects.tasks.update",["task"=>$task->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskPr $task)
    {
        $task->delete();
        return redirect()->route("subjects.show",["subject"=>$task->subject_pr_id]);
    }
}
