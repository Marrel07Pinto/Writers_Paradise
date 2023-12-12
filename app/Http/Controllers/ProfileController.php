<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update_post(Request $request, string $id)
    {
        $post = Post::find($id);
        return view('UpdatePost', ['post' => $post]);
    }

    public function save_update_form(Request $request, string $id)
    {
        $user_current = Auth::user();

        if ($request->hasFile('p_image')) 
        {
            $image = $request->file('p_image');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/posts');
            $image->move($dest, $reImage);
        }

        $imgPost = Post::find($id);
        $imgPost->writer_id = $user_current->id;
        $imgPost->post_img = $reImage ?? $imgPost->post_img;
        $imgPost->p_Caption = $request->p_Caption;
        $imgPost->save();


        return Redirect::route('update-post')->with('status', 'post-updated');

        
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
