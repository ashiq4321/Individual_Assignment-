<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;

class LoginController extends Controller
{
    
    public function index(Request $req){
		
    	return view('login.index');
    }

    public function verify(Request $req){
		$validation = Validator::make($req->all(), [
			'email'=>'required|email|exists:users',
			'password'=>'required'
		]);
		if($validation->fails()){
			return back()
					->with('errors', $validation->errors())
					->withInput();
			return redirect()->route('login.index')
							->with('errors', $validation->errors())
							->withInput();		
		}
    	
        $user = DB::table('users')
                    ->where('email', $req->email)
                    ->where('password', $req->password)
                    ->first();

    	if($user != null){
			$req->session()->put('email', $req->email);
			$req->session()->put('password', $req->password);
			$req->session()->put('name', $user->name);
			$req->session()->put('role', $user->role);
			if($user->role=="busmanager"){
				return redirect()->route('busmanager.index');
			}
			elseif($user->role=="admin")
    		return redirect()->route('admin.index');

    	}else{
            $req->session()->flash('msg', 'try again');
            return redirect('/system/supportstaff/login');
		}
    }
}
