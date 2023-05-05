<?php

namespace App\Http\Controllers;

use App\Models\EmployeeTask;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class EmployeeTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeetask = EmployeeTask::latest()->paginate(5);
        return view('employeetask.index',compact('employeetask'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $tasks = Task::all();
        return view('employeetask.create',compact( 'employees', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'task_id' => 'required'
        ]);

        EmployeeTask::create($request->all());

        return redirect()->route('employeetask.index')->with('success',' created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeTask $employeeTask)
    {
        return view('employeetask.show',compact('employeeTask'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeTask $employeeTask)
    {
        return view('employeetask.edit',compact('employeeTask'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeTask $employeeTask)
    {
        $request->validate([
            'employee_id' => 'required',
            'task_id' => 'required',
        ]);

        $employeeTask->update($request->all());

        return redirect()->route('employeetask.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeTask $employeeTask)
    {
        $employeeTask->delete();

        return redirect()->route('employeetask.index')->with('success',' deleted successfully');
    }
}
