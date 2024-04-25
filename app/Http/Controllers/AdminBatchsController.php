<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Teacher;
use App\Models\Course;

use Illuminate\Http\Request;

class AdminBatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Batch::all();
        return view('backend.batches.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $course=Course::all();
        $teachers = Teacher::all();
        return view('backend.batches.create', ['courses' => $course, 'teachers' => $teachers]);

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
            'name' => 'required|unique:batches',   
            'course_id' => 'required',
            'teacher_id' => 'required',  
            'start_date' => 'required',         
           
        ]);
        //print_r($request->all());die("Eeee");
        Batch::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'start_date' => $request->start_date
        ]);
        return redirect()->route('batches.index')->with('success','Batch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $course
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
        $data = Batch::find($id);
        return view('backend.batches.show', ['data' => $data ]);
    }

 /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course=Course::all();
        $teachers = Teacher::all();
        $data = Batch::find($id);
        return view('backend.batches.edit', ['data' => $data ,'courses' => $course, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
            'course_id' => 'required',
            'teacher_id' => 'required',  
            'start_date' => 'required',         
           
        ]);
        $update=Batch::where('id', $id)->update([
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
            'start_date' => $request->start_date
        ]);

        return redirect()->route('batches.index')->with('success','Batch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $datas = Batch::find($id);
        $datas->delete();
        return redirect()->route('batches.index')->with('success','Batch deleted successfully.');
    }
}
