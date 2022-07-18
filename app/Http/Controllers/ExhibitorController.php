<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exhibitor;

class ExhibitorController extends Controller
{
    public function index($id, Exhibitor $exhibitor)
    {
        return view('exhibitor.index', compact('exhibitor'));
    }

    public function create()
    {
        return view('exhibitor.create');
    }

    public function store(Request $request)
    {   
        $user_id = auth()->user()->id;
        Exhibitor::where('user_id', $user_id)->update([
            'ename' => request('ename'),
            'slug'=> str_slug(request('ename')),
            'website_url'=> request('website_url'),
            'address'=> request('address'),
            'description'=> request('description'),
            'ct_person1'=> request('cp1'),
            'ct_number1'=> request('cn1'),
            'ct_person2'=> request('cp2'),
            'ct_number2'=> request('cn2'),
            'ct_person3'=> request('cp3'),
            'ct_number3'=> request('cn3'),
            'facebook'=> request('facebook'),
            'instagram'=> request('instagram'),
            'line'=> request('line'),
            'telegram'=> request('telegram'),
            'whatsapp'=> request('whatsapp'),
            'youtube'=> request('youtube'),
        ]);
        return redirect()->back()->with('message', 'Profile Exhibitor Updated Successfully');
    }

    public function coverphoto(Request $request)
    {
        $this->validate($request, [
            'coverphoto' => 'required|mimes:jpg,png,jpeg|max:20000'
        ]);
        $user_id =auth()->user()->id;
        if($request->hasFile('coverphoto')){
            $file = $request->file('coverphoto');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('cover', $fileName);
            Exhibitor::where('user_id', $user_id)->update([
                'coverphoto' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Cover Picture Uploaded Successfully');
        }
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'mimes:jpg,png,jpeg|max:20000'
        ]);
        $user_id =auth()->user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('avatar', $fileName);
            Exhibitor::where('user_id', $user_id)->update([
                'logo' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        }
    }
   
}
