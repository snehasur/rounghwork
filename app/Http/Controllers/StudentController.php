<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Session;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::find(Session::get('student_id'));

        return view('frontend.student.index', ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('frontend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',   
            'email' => 'required|email|unique:students',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',            
            'address' => 'required'
        ]);
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/')->with('success','Student created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $student = Student::find($id);
        return view('frontend.student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        return view('frontend.student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
         
        $request->validate([
            'name' => 'required',   
            //'email' => 'required|email',
            //'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',            
            'address' => 'required'
        ]);
        $update=Student::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('students.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // $student = Student::find($id);
        // $student->delete();
        // return redirect()->route('students.index')->with('success','Student deleted successfully.');
    }
    public function loginStudent()
    {        
        return view('frontend.student.login');
    }
    public function loginSubmit(Request $request)
     {

        $request->validate([      
            'email'=> 'required',
            'password'=> 'required' 
            ]);
            $credentials = $request->only('email', 'password');
            $customer = Student::where('email', $credentials['email'])->first();


            if ($customer && Hash::check($credentials['password'], $customer->password)) { 
                // Authentication successful, redirect to dashboard
                Session::put('student_id', $customer->id); 
                Session::put('login', true); 
                return redirect()->route('students.index')->with('success','Login successfully');

            }else{
                return redirect()->route('loginStudent')->with('error','invalid Credentials');
            }
     }
     public function logout()
     {
        Session::forget('student_id');
        Session::forget('login');
        return redirect()->route('loginStudent')->with('success','Logout successfully');
     }
}
