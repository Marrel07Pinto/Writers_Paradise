<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); 
        return view('Chat', ['posts' => $posts]);
    }
    public function comments($id)
{
    // Retrieve the post information based on the post ID
    $post = Post::find($id);

    // Pass the post information to the comments view
    return view('Comments', ['post' => $post]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'p_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
    
        if ($request->hasFile('p_image')) 
        {
            $image = $request->file('p_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/posts');
            $image->move($dest, $reImage);
        }
    
        $imgPost = new Post;
        $imgPost->writer_id = 1;
        $imgPost->post_img = $reImage;
        $imgPost->p_Caption = $request->input('p_Caption'); 
        $imgPost->p_likes = 1;
        $imgPost->save();
    
        return redirect('/Chat')->with('success', 'Data has been added');
     }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
