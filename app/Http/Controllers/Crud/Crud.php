<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class Crud extends Controller
{
    public function index(){
        $read = DB::table('users')->get();
        return view('crud.index',['datas'=>$read]);

        //$permission = ['admin.home','admin.post','admin.create'];
        //return serialize($permission);
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

        $datas = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            //'image'=> $new_name
        ];

        $insert = DB::table('users')->insert($datas);
        if($insert){
            $image->move($uploadPath,$new_name);

            return redirect()->back()->with('msg','Success!');
        }else{
            return redirect()->back()->with('msg','Error!');
        }
         
    }

    public function edit($id){
        $editdata = DB::table('users')->find($id);
        return view('crud.edit',['editdata'=>$editdata]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
            'image' => 'mimes:png,jpg,jpeg,gif|max:2048'
        ]);
    }

    public function delete($id){
        $delete = DB::table('users')->where('id',$id)->delete();
        if ($delete) {
            return redirect()->back()->with('msg','Success!');
        }else{
            return redirect()->back()->with('msg','Error!');
        }
    }

    public function search(Request $request){
        if ($request->tag) {
            $keyword = e($request->tag);
            $data = DB::table('users')->where('name','like','%'.$keyword.'%')->get();
            //dd($data);
            return response()->json($data);
        }else{
            abort(404); //return 404 error
        }
    }



    /////__Custom auth with guard test__///
    public function customAuth(){
        $credentials  = ['email'=>'email@gmail.com','password'=>'12345678'];
        $res = Auth::guard('admin')->attempt($credentials);
        //dd($res);
        if ($res) {
            return redirect()->intended('/admin');
        }else{
            return "No";
        }
    }

    public function admin(){
        if (Auth::guard('admin')->check()) {
            return "Yes";        
        }else{
            return "No";
        }
    }

    public function customLogout(){
        Auth::guard('admin')->logout();

        return redirect('/login');
    }
}
