<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Writer;

class WprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_current = Auth::user();
        $pimgs = Writer::where('user_id',$user_current->id)->get();
        return view('Wprofile', ['pimgs' => $pimgs]);
    }

    public function show_user_posts()
    {
        $user_current = Auth::user();
        $posts = Post::where('writer_id', $user_current->writer->user_id)->get();
        return view('Mpost', ['posts' => $posts]);
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
