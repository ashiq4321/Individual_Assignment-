<?php

namespace App\Http\Controllers;
use DateTime;
use Validator;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'cpassword'=>'same:password',
            'company'=>'required|unique:users'
		]);
		if($validation->fails()){
			return back()
					->with('errors', $validation->errors())
					->withInput();
			return redirect()->route('register.index')
							->with('errors', $validation->errors())
							->withInput();		
        }

        $user 			= new User;
        $user->id 	='';
		$user->name 	= $request->name;
		$user->email = $request->email;
		$user->password 	= $request->password;
		$user->registered 	=new DateTime();
		$user->validated = "1";
        $user->role 	= "busmanager";
        $user->company 	= $request->company;
        $user->operator = '';

		if($user->save()){
            $request->session()->flash('email', $request->email);
            $request->session()->flash('name', $request->name);
            $request->session()->flash('msg', 'registered successfully ');
            return redirect()->route('login.index');
		}else{
            $request->session()->flash('msg', 'try again');
            return redirect()->route('register.index');
		}
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(register $register)
    {
        //
    }
}
