<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;



class UserController extends Controller
{
    public function register(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
           'name' => 'required|min:2|max:15|string',
           'email' => 'required|min:5|max:50|unique:users',
           'password' => 'required|min:5|max:12|confirmed',
           'password_confirmation' => 'required|min:5|max:12',
            ]);

            User::create([
           'name' => $request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password)
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          
             return to_route('dashboard');
            }
            else{
                return to_route('register')->with('error','Invalid register datails');
            }
        }

        return view('register');
    }


    // login 
    public function login(Request $request){
        if ($request->isMethod('post')) {
           $user =  $request->validate([
           'email' => 'required|min:5|max:50|',
           'password' => 'required|min:5|max:12',
            ]);

            if (Auth::attempt($user)) {
                return to_route('dashboard');
            }
            else{
                return to_route('login')->with('error','Invalid login datails');
            }
        }
        return view('login');
    }

    public function dashboard(){
        $posts = post::get();
        
        // return view('dashboard',compact('posts'));
        return view('dashboard',compact('posts'));

       
    }

    public function profile(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:2|max:15|string',
            ]);

            $id = Auth()->user()->id;

         $user = User::findOrFail($id);
         $user->name = $request->name;
         $user->save();
            return to_route('profile')->with('error','Data updated');
        }
        return view('profile');
    }
 

    // logout 
    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }


    // search 
    public function search(Request $request){
        $search = $request->search;
        $posts = post::where('title', 'LIKE', "%$search%")->get();
        return view('dashboard',compact('posts','search'));
    }

    // crud user 
    public function user(Request $request){
        $users = DB::table('users')->get();
        return $users;
    }

    // userProfile 
    public function userProfile(){
        $users = Auth::user();
        return view('userProfile',compact('users'));
    }

    public function singleUpdate(Request $request){
      if ($request->isMethod('post')) {
        $request->validate([
            'name' => 'required|max:15|min:2'
            ]);
            $id = Auth()->user()->id;
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->save();
            return to_route('userProfile');
      }
        return view('singleUpdate');
    }

}


