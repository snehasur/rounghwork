<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;


class AdminTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Teacher::all();
        return view('backend.teachers.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        
        $password="12345678";
        $request->validate([
            'name' => 'required',   
            'email' => 'required|email|unique:teachers',
            'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',            
            'address' => 'required'
        ]);
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('teachers.index')->with('success','Teacher created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Teacher::find($id);
        return view('backend.teachers.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Teacher::find($id);
        return view('backend.teachers.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
            'name' => 'required',  
            'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',            
            'address' => 'required'
        ]);
        $update=Teacher::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('teachers.index')->with('success','Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $datas = Teacher::find($id);
        $datas->delete();
        return redirect()->route('teachers.index')->with('success','Teacher deleted successfully.');
    }
}
