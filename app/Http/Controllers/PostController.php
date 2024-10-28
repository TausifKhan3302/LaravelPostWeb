<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = post::get();
        // return view('dashboard',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.createpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'title' => 'required|string|min:5|max:30',
        'description' => 'required|string|min:10|max:250',
        ]);

        $fiie = $request->file('image');
        $path = $request->image->store('image','public');

       $user =  post::create([
           'image' => $path,
           'title' => $request->title,
           'description' => $request->description,
           'user_id' => Auth::user()->id
        ]);

        if ($user) {
            return to_route('dashboard');
        }
        else {
            return to_route('post.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $posts = DB::table('posts')->where('id',$id)->get();
        return view('post.showpost',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = DB::table('posts')->where('id',$id)->get();
        return view('post.editpost',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'title' => 'required|string|min:5|max:30',
            'description' => 'required|string|min:10|max:250',
            ]);
        
        $user = post::find($id);
        if ($request->hasFile('image')) {
            
            $image_path = public_path('storage/').$user->image;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $path = $request->image->store('image','public');
            $user->image = $path;
            $user->title = $request->title;
            $user->description = $request->description;
            $user->save();
        
            return to_route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $id = post::find($id);
         if ($id) {
            $id->delete();
            return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
        }
          return redirect()->route('dashboard')->with('error', 'Post not found.');
    }
    }

