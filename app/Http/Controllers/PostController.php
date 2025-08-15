<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }


    public function ourfilestore(Request $request){

        $validated = $request->validate([
            'speaker_name' => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'date'         => 'required|date',
            'time'         => 'required|date_format:H:i',
        ]);

        $post = new Post;

        $post->speaker_name = $request->speaker_name;
        $post->location = $request->location;
        $post->date = $request->date;
        $post->time = $request->time;
        
        $post->save();

        return redirect()->route('home')->with('success', 'Your post has been submited!!');
    }


    public function editData($id){
        $post = post::findOrFail($id);
        return view('edit', ['ourPost' => $post]);
    }


    public function updateData($id, Request $request){

         $validated = $request->validate([
            'speaker_name' => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'date'         => 'required|date',
            'time'         => 'required',
        ]);

        $post = post::findOrFail($id);
        $post->speaker_name = $request->speaker_name;
        $post->location = $request->location;
        $post->date = $request->date;
        $post->time = $request->time;
        
        $post->save();

        return redirect()->route('home')->with('success', 'Your post has been updated!!');
    }

    public function deleteData($id){
        $post = post::findOrFail($id);

        $post->delete();

        return redirect()->route('home')->with('remove', 'Your post has been Deleted!!');
    }

}
