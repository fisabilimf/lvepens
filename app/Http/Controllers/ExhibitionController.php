<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Exhibition;
use App\Exhibitor;
use App\Entry;
use App\Chat;
use App\Http\Requests\ExhibitionPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\File;


class ExhibitionController extends Controller
{
    public function index(){
        $exhibitions = Exhibition::inRandomOrder()->limit(10)->get();
        $exhibitors = Exhibitor::inRandomOrder()->limit(12)->get();
        return view('welcome', compact('exhibitions', 'exhibitors'));
    }

    public function show($id, Exhibition $exhibition){
        if (Auth::check() && Auth::user()->privilege=='exhibitor'||'visitor'||'guest'||'') {
            return view('exhibitions.show', compact('exhibition'));
        } else {
            return view('exhibitions.show', compact('exhibition'));
        }
    }

    public function create() {
        return view('exhibitions.create');
    }

    public function edit($id, Exhibition $exhibition){
        $exhibition = DB::table('exhibitions')->where('id',$id)->get();
        return view('exhibitions.edit', compact('exhibition'));
    }

    public function update(Request $request){
        DB::table('exhibitions')->where('id',$request->id)->update([
            'name' => request('name'),
            'slug'=> str_slug(request('name')),
            'category_id'=> request('category'),
            'type_id'=> request('type'),
            'tags'=> request('tags'),
            'location'=> request('location'),
            'start_date'=> request('start_date'),
            'end_date'=> request('end_date'),
            'description'=> request('description'),
            'ct_person1'=> request('cp1'),
            'ct_number1'=> request('cn1'),
            'ct_person2'=> request('cp2'),
            'ct_number2'=> request('cn2'),
            'ct_person3'=> request('cp3'),
            'ct_number3'=> request('cn3'),
        ]);
        return redirect()->back()->with('message', 'Exhibition Posted Succesfully');
    }

    public function imgdesc(Request $request)
    {   
        DB::table('exhibitions')->where('id',$request->id)->update([
            'image_desc1'=>request('imgdesc1'),
            'image_desc2'=>request('imgdesc2'),
            'image_desc3'=>request('imgdesc3'),
            'image_desc4'=>request('imgdesc4'),
            'image_desc5'=>request('imgdesc5'),
        ]);
        return redirect()->back()->with('message', 'Exhibition Posted Succesfully');
    }

    public function faq(Request $request)
    {   
        DB::table('exhibitions')->where('id',$request->id)->update([
            'question1'=>request('question1'),
            'answer1' =>request('answer1'),
            'question2'=>request('question2'),
            'answer2' =>request('answer2'),
            'question3'=>request('question3'),
            'answer3' =>request('answer3'),
            'question4'=>request('question4'),
            'answer4' =>request('answer4'),
            'question5'=>request('question5'),
            'answer5' =>request('answer5'),            
        ]);
        return redirect()->back()->with('message', 'Exhibition Posted Succesfully');
    }

    public function imagepost(Request $request)
    {
        $this->validate($request, [
            'image1' => 'mimes:jpg,png,jpeg|max:20000',
            'image2' => 'mimes:jpg,png,jpeg|max:20000',
            'image3' => 'mimes:jpg,png,jpeg|max:20000',
            'image4' => 'mimes:jpg,png,jpeg|max:20000',
            'image5' => 'mimes:jpg,png,jpeg|max:20000',
        ]);
        $user_id =auth()->user()->id;
        if($request->hasFile('image1')){
            $file = $request->file('image1');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/images/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'image1' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('image2')){
            $file = $request->file('image2');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/images/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'image2' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('image3')){
            $file = $request->file('image3');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/images/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'image3' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('image4')){
            $file = $request->file('image4');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/images/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'image4' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('image5')){
            $file = $request->file('image5');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/images/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'image5' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else {
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        }
    }
    
    public function arcdesc(Request $request)
    {   
        DB::table('exhibitions')->where('id',$request->id)->update([
            'archive_desc1'=>request('arcdesc1'),
            'archive_desc2'=>request('arcdesc2'),
            'archive_desc3'=>request('arcdesc3'),
        ]);
        return redirect()->back()->with('message', 'Exhibition Posted Succesfully');
    }

    public function archivepost(Request $request)
    {
        $this->validate($request, [
            'archive1' => 'mimes:pdf,doc,docs,jpg,png,jpeg|max:20000',
            'archive2' => 'mimes:pdf,doc,docs,jpg,png,jpeg|max:20000',
            'archive3' => 'mimes:pdf,doc,docs,jpg,png,jpeg|max:20000',
        ]);
        $user_id =auth()->user()->id;
        if($request->hasFile('archive1')){
            $file = $request->file('archive1');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/archives/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'archive1' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('archive2')){
            $file = $request->file('archive2');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/archives/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'archive2' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else if($request->hasFile('archive3')){
            $file = $request->file('archive3');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/archives/', $fileName);
            Exhibition::where('user_id', $user_id)->update([
                'archive3' => $fileName,
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        } else {
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        }
    }

    public function destroy($id){
        DB::table('exhibitions')->where('id',$id)->delete();
        return redirect()->back()->with('message','Berhasil menghapus data!');
    }

    public function store(ExhibitionPostRequest $request) {
        $user_id = auth()->user()->id;
        $exhibitor = Exhibitor::where('user_id', $user_id)->first();
        $exhibitor_id = $exhibitor->id;
        
        Exhibition::create([
            'user_id' => $user_id,
            'exhibitor_id' => $exhibitor_id,
            'name' => request('name'),
            'slug'=> str_slug(request('name')),
            'category_id'=> request('category'),
            'type_id'=> request('type'),
            'tags'=> request('tags'),
            'location'=> request('location'),
            'start_date'=> request('start_date'),
            'end_date'=> request('end_date'),
            'description'=> request('description'),
            'ct_person1'=> request('cp1'),
            'ct_number1'=> request('cn1'),
            'ct_person2'=> request('cp2'),
            'ct_number2'=> request('cn2'),
            'ct_person3'=> request('cp3'),
            'ct_number3'=> request('cn3'),
        ]);
        
        return redirect()->back()->with('message', 'Exhibition Posted Succesfully');
    }

    public function imagestore(Request $request)
    {
        $this->validate($request, [
            'image1' => 'required|mimes:pdf,doc,docs|max:20000',
        ]);
        $user_id =auth()-> user()->id;
        $image1 = $request->file('image1')->store('public/storage/files');
        Exhibition::where('user_id', $user_id)->update([
            'image1' => $cover,
        ]);
        return redirect()->back()->with('message', 'Cover Letter Uploaded Successfully');
    }

    public function myExhibitions() {
        $exhibitions = Exhibition::where('user_id', auth()->user()->id)->get();
        return view ('exhibitions.myexhibitions', compact('exhibitions'));
    }

    public function apply (Request $request, $id){
        $exhibitionId = Exhibition::find($id);
        $exhibitionId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Exhibition Applied Succesfully');
    }

    public function applicants(){
        $applicants = Exhibition::has('users') -> where('user_id', auth()->user()->id)->get();
        return view('exhibitions.applicants', compact('applicants'));
    }

    public function allexhibitions(Request $request) {
        $name = $request['name'];
        $category = $request['category'];
        $type = $request['type'];
        $tags = $request['tags'];
        $location = $request['location'];
        $start = $request['start_date'];
        $end = $request['end_date'];
        
        if(!empty($name||$category||$type||$tags||$location||$start||$end)){ 
            $exhibitions = Exhibition::latest()->where([
                ['name', 'LIKE', '%'.$name.'%'],
                ['category_id', 'LIKE', $category],
                ['type_id', 'LIKE', $type],
                ['tags', 'LIKE', '%'.$tags.'%'],
                ['location', 'LIKE', '%'.$location.'%'],
                ['start_date', 'LIKE', '%'.$start.'%'],
                ['end_date', 'LIKE', '%'.$end.'%'],
            ])->paginate(10);
                
            return view ('exhibitions.allexhibitions', compact('exhibitions'));

        } 
        else {

            $exhibitions = Exhibition::latest()->where('name', 'LIKE', '%'.$name.'%')
                ->orWhere('category_id', 'LIKE', $category)
                ->orWhere('type_id', 'LIKE', $type)
                ->orWhere('tags', 'LIKE', '%'.$tags.'%')
                ->orWhere('location', 'LIKE', '%'.$location.'%')
                ->orWhere('start_date', 'LIKE', '%'.$start.'%')
                ->orWhere('end_date', 'LIKE', '%'.$end.'%')
                ->paginate(10);

            return view ('exhibitions.allexhibitions', compact('exhibitions'));
        }
    }

    public function searchExhibition(Request $request){
        $name = $request ->get('name');
        $users = Exhibition::where('name', 'LIKE', '%'.$name.'%')
                -> orWhere('tags', 'LIKE', '%'.$name.'%')
                ->limit(5)->get();
        return response()->json($users);
    }
    
    public function fav(Request $request){
        DB::table('favourites')->insert([
            'exhibition_id' => $request->exhibition_id,
            'user_id' => $request->user_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        return redirect()->back()->with('message','Berhasil menyimpan!');
    }

    public function unfav(Request $request){
        DB::table('favourites')->where([
            'exhibition_id' => $request->exhibition_id,
        ])->delete();
        return redirect()->back()->with('message','Berhasil dihapus!');
    }

    public function entry(Request $request){
        DB::table('entries')->insert([
            'exhibition_id' => $request->exhibition_id,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        return redirect()->back()->with('message','Berhasil menyimpan!');
    }

    public function unentry(Request $request){
        DB::table('entries')->where([
            'exhibition_id' => $request->exhibition_id,
            'user_id' => $request->user_id,
        ])->delete();
        return redirect()->back()->with('message','Berhasil dihapus!');
    }

    public function message(Request $request){
        DB::table('chats')->insert([
            'exhibition_id' => $request->exhibition_id,
            'user_id' => $request->user_id,
            'message_text' => $request->message_text,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        return redirect()->back()->with('message','Berhasil menyimpan!');
    }

    public function delmessage(Request $request){
        DB::table('chats')->where([
            'exhibition_id' => $request->exhibition_id,
            'user_id' => $request->user_id,
        ])->delete();
        return redirect()->back()->with('message','Berhasil dihapus!');
    }

}
