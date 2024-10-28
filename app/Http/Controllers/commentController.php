<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
        // comments 
        public function comment(Request $request){
       if ($request->isMethod('post')) {
        $request->validate([
            'title' => 'required|string|min:5|max:40',
            'description' => 'required|string|min:10|max:400',
            ]);
    
           $user =  comment::create([
               'title' => $request->title,
               'description' => $request->description,
               'user_id' => Auth::user()->id
            ]);
    
            if ($user) {
                return to_route('dashboard')->with('success','commnet inserted successfully');
            }
            else {
                return to_route('dashboard')->with('error','commnet not inserted successfully');
            }
       }

       return view('comment');
         }
    
    
        //  viewComment 
        public function viewComment(){
            $comments = comment::with('user')->get();
            // return $comments;
            return view('comment',compact('comments'));
        }
}
