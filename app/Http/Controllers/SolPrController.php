<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolPrRequest;
use App\Http\Requests\UpdateSolPrRequest;
use App\Models\SolPr;
use App\Models\TaskPr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SolPrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TaskPr $task)
    {
        return view('solutions.create',[
            "task"=>$task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskPr $task, StoreSolPrRequest $request)
    {
        // dd($request);
        $solution = $task->solutions()->create(array_merge(
            $request->validated(),
            [
                'submission_date' => Carbon::now(),
                'name' => Auth::user()->name,
                'email' => Auth::user()->email
            ]        
        ));
        $subject=$task->subject;
        return redirect()->route('students.subjects.tasks', ['subject' => $subject->id]);
        // return redirect('/student/subjects');  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskPr $task)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolPr $solution)
    {
        return view('solutions.edit',[
            "solutions" => $solution,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolPrRequest $request, SolPr $solution)
    {
        $solution->update($request->validated());
        $solution->evaluation_time = Carbon::now();
        $solution->save(); 
        $task = $solution->task; // Access the related TaskPr instance

        return redirect()->route('subjects.tasks', ['task' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolPr $solPr)
    {
        //
    }
}
