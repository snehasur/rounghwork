<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Course::all();
        return view('backend.courses.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.courses.create');
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
            'name' => 'required|unique:courses',   
            'syllabus' => 'required',
            'duration' => 'required',       
            'fee' => 'required',     
           
        ]);
        Course::create([
            'name' => $request->name,
            'syllabus' => $request->syllabus,
            'duration' => $request->duration,
            'fee' => $request->fee
        ]);
        return redirect()->route('courses.index')->with('success','Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
        $data = Course::find($id);
        return view('backend.courses.show', ['data' => $data]);
    }

 /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Course::find($id);
        return view('backend.courses.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
            'syllabus' => 'required',
            'duration' => 'required',  
            'fee' => 'required',
        ]);
        $update=Course::where('id', $id)->update([
            'syllabus' => $request->syllabus,
            'duration' => $request->duration,
            'fee' => $request->fee

        ]);

        return redirect()->route('courses.index')->with('success','Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $datas = Course::find($id);
        $datas->delete();
        return redirect()->route('courses.index')->with('success','Course deleted successfully.');
    }
}
