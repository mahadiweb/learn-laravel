<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class Crud extends Controller
{
    public function index(){
        $read = DB::table('users')->get();
        return view('crud.index',['datas'=>$read]);
    }
    public function create(){
        return view('crud.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:2048'
        ]);


        $image = $request->file('image');
        //$image->getClientOriginalName();
        $new_name = time()."-".uniqid().".".$image->getClientOriginalExtension();
        $uploadPath = public_path('uploads');
        $image->move($uploadPath,$new_name);
        // $datas = [
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'image'=>
        // ]

        return redirect()->back()->with('msg','Success!');
        
    }
    public function edit($id){

    }
    public function update(Request $request, $id){

    }
    public function delete($id){

    }
}