<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\busmanger;
use App\User;
use Illuminate\Http\Request;

class BusmangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('busmanager.index');
    }
    public function busCounterAdd()
    {
        return view('busmanager.addCounter');
    }
    public function busCounterAdded()
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
    public function busCounterlist()
    {
          $user = DB::table('buscounters')->get();
        return view('busmanager.viewBusCounter', ['users'=>$user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function show(busmanger $busmanger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function edit(busmanger $busmanger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, busmanger $busmanger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\busmanger  $busmanger
     * @return \Illuminate\Http\Response
     */
    public function destroy(busmanger $busmanger)
    {
        //
    }
}
