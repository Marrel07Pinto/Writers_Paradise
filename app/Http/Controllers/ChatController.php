<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Writer;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all(); 
        $posts= Post::orderBy('id','desc')->simplePaginate(2);
        return view('Chat', ['posts' => $posts]);
    }

    
    public function comments($id)
{
    // Retrieve the post information based on the post ID
    $post = Post::find($id);

    // Pass the post information to the comments view
    return view('Comments', ['post' => $post]);
}
    public function user_posts (Request $request,string $id)
    {
        $posts=Post::where('writer_id',$id)->get();
        return view('Displaypost',['posts'=>$posts]);
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
        $user_current = Auth::user();

        $request->validate([
            'p_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'p_Caption'=> 'required|String',
            
        ]);
    
        if ($request->hasFile('p_image')) 
        {
            $image = $request->file('p_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/posts');
            $image->move($dest, $reImage);
        }
        $imgPost = new Post;
        $imgPost->writer_id = $user_current->id;
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
        Post::where('id',$id)->delete();
        return Redirect('/mpost')->with('status', 'post-deleted');
    }
}
