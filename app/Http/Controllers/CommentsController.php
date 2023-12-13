<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Writer;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::find($id); 
        return view('Comments', ['posts' => $posts]);
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
        //
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

    public function save_comment (Request $request, $slug, $id)
    {
        
        $user_current = Auth::user();

    $post = Post::where('id', $id)->first();
    $comment = new Comment;
    $comment->post_id = $post->id;
    $comment->writer_id = $user_current->id;
    $comment->c_messages = $request->comment;
    $comment->save();

    $email = Post::find($id)->writer->user->email;
    Mail::to($email)->send(new NotificationMail());

    return redirect('comments'.'/'.$id)->with('success', 'Comment has been submitted');
   

    }
    public function update_comment(Request $request, $id)
{    
    dd($request->all());
    $comment = Comment::findOrFail($id);
    $comment->c_messages = $request->input('edited_comment');
    $comment->save();

    // You can return a response if needed
    return response()->json(['success' => true]);
}
    
}
