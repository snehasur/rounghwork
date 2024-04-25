<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=User::find(Session::get('admin_id'));
        return view('backend.admin.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=User::find(Session::get('admin_id'));
        return view('backend.admin.show', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=User::find(Session::get('admin_id'));
        return view('backend.admin.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required'           
        ]);
        $update=User::where('id', $id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard.index')->with('success','Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function loginAdmin()
    {        
        return view('backend.admin.login');
    }
    public function loginSubmit(Request $request)
     {

        

        $request->validate([      
            'email'=> 'required',
            'password'=> 'required' 
            ]);
            $credentials = $request->only('email', 'password');
            $customer = User::where('email', $credentials['email'])->first();
            

            if ($customer && Hash::check($credentials['password'], $customer->password)) { 
                // Authentication successful, redirect to dashboard
                Session::put('admin_id', $customer->id); 
                Session::put('login', true); 
                return redirect()->route('dashboard.index')->with('success','Login successfully');

            }else{
                return redirect()->route('loginAdmin')->with('error','invalid Credentials');
            }
           
     }
     public function logout()
     {
        Session::forget('admin_id');
        Session::forget('login');
        return redirect()->route('loginAdmin')->with('success','Logout successfully');
     }
}
