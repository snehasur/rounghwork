<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Session;
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::find(Session::get('teacher_id'));

        return view('frontend.teacher.index', ['teacher' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('frontend.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',   
            'email' => 'required|email|unique:teachers',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',            
            'address' => 'required'
        ]);
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/')->with('success','Teacher created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $data = Teacher::find($id);
        return view('frontend.teacher.show', ['teacher' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Teacher::find($id);
        return view('frontend.teacher.edit', ['teacher' => $data]);
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
        $update=Teacher::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('teacher.index')->with('success','Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // $data = Teacher::find($id);
        // $data->delete();
        // return redirect()->route('teacher.index')->with('success','Teacher deleted successfully.');
    }
    public function loginTeacher()
    {        
        //echo "f";die();
        return view('frontend.teacher.login');
    }
    public function loginSubmit(Request $request)
     {

        $request->validate([      
            'email'=> 'required',
            'password'=> 'required' 
            ]);
            $credentials = $request->only('email', 'password');
            $customer = Teacher::where('email', $credentials['email'])->first();


            if ($customer && Hash::check($credentials['password'], $customer->password)) { 
                // Authentication successful, redirect to dashboard
                Session::put('teacher_id', $customer->id); 
                Session::put('login', true); 
                return redirect()->route('teachers.index')->with('success','Login successfully');

            }else{
                return redirect()->route('loginTeacher')->with('error','invalid Credentials');
            }
    
            



     }
     public function logout()
     {
        Session::forget('teacher_id');
        Session::forget('login');
        return redirect()->route('loginTeacher')->with('success','Logout successfully');
     }
}
