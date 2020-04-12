<?php

namespace App\Http\Controllers;

use App\admin;
use App\user;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function busManagerlist()
    {
        $users = User::all()->where('role', 'busmanager');
		return view('admin.viewBusManager', ['users'=>$users]);
    }
    public function busManagerAdd()
    {
        return view('admin.addManager');
    }
    public function busManagerAdded()
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:buscounters',
            'location'=>'required|size:4',
            'operator'=>'required|email|unique:users',
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
    public function deletebusmanager(Request $request)
    {
        user::find($request->id)->delete();
        return redirect()->route('busmanager.list');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
