<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Support\Carbon;
class AdminEnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Enrollment::all();
        return view('backend.enrollments.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $today = Carbon::today()->toDateString();

        $batches=Batch::whereDate('start_date', '>', $today)->get();
        $students = Student::all();
        return view('backend.enrollments.create', ['batches' => $batches, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
        $request->validate([
            //'enroll_no' => 'required|unique:enrollments',   
            'batch_id' => 'required',
            'student_id' => 'required',  
            //'join_date' => 'required',                    
           
        ]);
        Enrollment::create([
            //'enroll_no' => $request->enroll_no,
            'batch_id' => $request->batch_id,
            'student_id' => $request->student_id,
            //'join_date' => $request->join_date,
        ]);
        return redirect()->route('enrollments.index')->with('success','Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $course
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
        $data = Enrollment::find($id);
        return view('backend.enrollments.show', ['data' => $data]);
    }

 /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Enrollment::find($id);
        $batches=Batch::whereDate('start_date', '>', $today)->get();
        $students = Student::all();
        return view('backend.enrollments.edit', ['data' => $data,'batches' => $batches, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'batch_id' => 'required',
            'student_id' => 'required',  
            //'join_date' => 'required',
         
        ]);
        $update=Enrollment::where('id', $id)->update([
            'batch_id' => $request->batch_id,
            'student_id' => $request->student_id,
            //'join_date' => $request->join_date,
        ]);

        return redirect()->route('enrollments.index')->with('success','Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $datas = Enrollment::find($id);
        $datas->delete();
        return redirect()->route('enrollments.index')->with('success','Enrollment deleted successfully.');
    }
}
