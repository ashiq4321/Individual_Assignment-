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
                    ->first();

    	if($user != null){
            $req->session()->put('email', $req->email);
    		return view('welcome');

    	}else{
            $req->session()->flash('msg', 'try again');
            return redirect('/login');
		}
    }
}
