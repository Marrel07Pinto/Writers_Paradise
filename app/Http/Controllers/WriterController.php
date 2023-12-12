<?php

namespace App\Http\Controllers;
use App\Models\Writer;
use App\Models\User;
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


        Writer::create([
            'w_firstname' => $request->input('w_firstname'),
            'w_phone' => $request->input('w_phone'),
            'w_address' => $request->input('w_address'),
            'w_postcode' => $request->input('w_postcode'),
            'w_img' =>  $reImage ,
        ]);

        return redirect()->to('Wprofile')->with('success', 'Profile created successfully!');

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
    public function edit()
{
    $user_logged = Auth::user();
    return view('Form', compact('user_logged'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_logged = Auth::user();


            if($request->hasFile('profile_image')){
                $image=$request->file('profile_image');
                $reImage=time().'.'.$image->getClientOriginalExtension();
                $dest=public_path('/imgs');
                $image->move($dest,$reImage);
            }
            else{
                $reImage=$request->photo;
            }
    
            $jobPost = Profile::find($id);
            $jobPost->profile_image = $reImage;
            $jobPost->profile_full_name = $request->input('profile_full_name');
            $jobPost->profile_date_of_birth = $request->input('profile_date_of_birth');
            $jobPost->profile_gender = $request->input('profile_gender');
            $jobPost->profile_phone_number = $request->input('profile_phone_number');
            $jobPost->profile_address = $request->input('profile_address');
            $jobPost->user_id =$user_logged->id;
            $jobPost->save();
    
            return redirect()->route('eprofile.show')->with('success', 'Data has been updated');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show()
    {
       
    }
    
}
