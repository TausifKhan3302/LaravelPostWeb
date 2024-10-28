<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\GATE;
use App\Models\user;

class userCrud extends Controller
{
    public function userCrud(){
        $users = DB::table('users')->get();
            return view('post.crudUser',compact('users'));
    }

    public function userView(string $id){
       
        $users = user::findOrFail($id);
        return view('post.userView',compact('users'));
    }

    public function userDelete(string $id){
        $user = User::find($id);
        $user->delete();
        return to_route('userDelete');
    }

}
