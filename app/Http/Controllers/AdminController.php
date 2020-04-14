<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DateTime;
use Validator;
use App\bus;
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
    public function busEdit(Request $request)
    {
        $user = DB::table('buses')->where('id', $request->id)->first();
        return view('admin.editBus', ['user'=>$user]);
    }
    public function buslist()
    {
        $users = DB::table('buses')->get();
        return view('admin.viewBusList', ['users'=>$users]);
    }
    public function busAdd(Request $request)
    {
        return view('admin.addBus');
    }
    public function busAdded(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'location'=>'required',
            'seat_row'=>'required',
            'seat_column'=>'required',
            'company'=>'required',
		]);
		if($validation->fails()){
			return back()
					->with('errors', $validation->errors())
					->withInput();
			return redirect()->route('add.bus')
							->with('errors', $validation->errors())
							->withInput();		
        }
        $users = DB::table('buses')->get();

        $user 			= new bus;
        $user->id 	=count($users)+1;
		$user->name 	= $request->name;
		$user->location = $request->location;
		$user->seat_row 	= $request->seat_row;
		$user->seat_column 	=$request->seat_column;
		$user->company = $request->company;
        $user->manager = '';
		if($user->save()){
            return redirect()->route('buses.list');
		}else{
            $request->session()->flash('msg', 'try again');
            return redirect()->route('add.bus');
		}
    }
    public function busManagerlist()
    {
        $users = User::all()->where('role', 'busmanager');
		return view('admin.viewBusManager', ['users'=>$users]);
    }
    public function busManagerAdd(Request $request)
    {
        return view('admin.addManager');
    }
    public function busManagerAdded(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'cpassword'=>'same:password'
		]);
		if($validation->fails()){
			return back()
					->with('errors', $validation->errors())
					->withInput();
			return redirect()->route('admin.addManager')
							->with('errors', $validation->errors())
							->withInput();		
        }
        $users = DB::table('users')->get();

        $user 			= new User;
        $user->id 	=count($users)+1;
		$user->name 	= $request->name;
		$user->email = $request->email;
		$user->password 	= $request->password;
		$user->registered 	=new DateTime();
		$user->validated = "1";
        $user->role 	= "busmanager";
        $user->company 	= '';
        $user->operator = '';

		if($user->save()){
            return redirect()->route('busmanager.list');
		}else{
            $request->session()->flash('msg', 'try again');
            return redirect()->route('admin.addmanager');
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
    public function update(Request $request, bus $bus)
    {

    }

    public function updatebusinfo(Request $request, bus $bus)
    {

       $affected= DB::table('buses')
              ->where('id', $request->id)
              ->update(array('name' => $request->name,
                       'location' => $request->location,
                       'seat_row' => $request->seat_row,
                       'seat_column' => $request->seat_column,
                       'company' => $request->company));
            return redirect()->route('buses.list');               

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
