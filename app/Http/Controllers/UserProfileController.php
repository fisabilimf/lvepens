<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['visitor', 'verified']);
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {   
        // $this->validate($request, [
        //     'name'=> 'required',
        //     'gender'=> 'required',
        //     'dob'=> 'required',
        //     'email'=> 'required',
        //     'phone_number' => 'numeric|min:12',
        //     'address'=> '',
        // ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            // 'name' => request('name'),
            'gender' =>request('gender'),
            'dob' => request('dob'),
            // 'email' => request('email'),
            'phone_number' => request('phone_number'),
            'address' => request('address'),
        ]);
        User::where('id', $user_id)->update([
            'name' => request('name'),
            // 'gender' =>request('gender'),
            // 'dob' => request('dob'),
            'email' => request('email'),
            // 'phone_number' => request('phone_number'),
            // 'address' => request('address'),
        ]);
        return redirect()->back()->with('message', 'Your Profile Updated Successfully');
    }

    public function coverletter(Request $request)
    {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docs|max:20000',
        ]);
        $user_id =auth()-> user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover,
        ]);
        return redirect()->back()->with('message', 'Cover Letter Uploaded Successfully');
    }

    public function resume(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docs,jpg,png,jpeg|max:20000'
        ]);
        $user_id =auth()-> user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume,
        ]);
        return redirect()->back()->with('message', 'Resume Uploaded Successfully');
    }

    public function avatar(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,png,jpeg|max:20000'
        ]);
        $user_id =auth()->user()->id;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/avatar', $fileName);
            Profile::where('user_id', $user_id)->update([
                'photo' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Avatar Uploaded Successfully');
        }
    }
    
}
