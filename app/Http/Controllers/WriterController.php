<?php

namespace App\Http\Controllers;
use App\Models\Writer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the currently authenticated user
       
        $writer = Auth::user();

        return view('profile', compact('writer'));
    }


    public function showForm()
    {
        return view('Form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'w_firstname' => 'required',
            'w_lastname' => 'nullable',
            'w_phone' => 'required',
            'w_address' => 'required',
            'w_postcode' => 'required',
            'w_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('w_img')) 
        {
            $image = $request->file('w_img');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/profileimg');
            $image->move($dest, $reImage);
        }

        $user_id = 1;
        Writer::create([
            'user_id' => $user_id,
            'w_firstname' => $request->input('w_firstname'),
            'w_phone' => $request->input('w_phone'),
            'w_address' => $request->input('w_address'),
            'w_postcode' => $request->input('w_postcode'),
            'w_img' =>  $reImage ,
        ]);

        return redirect()->back()->with('success', 'Profile created successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
