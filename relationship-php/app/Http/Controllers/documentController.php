<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\documentModel;

use App\Models\User;

class documentController extends Controller
{
    public function index(){
        return view('home',[
            'pdfs'=> documentModel::latest()->get()
        ]);
    }

   

    public function show(documentModel $id){
     
     return view('list',[
      'pdf'=>$id
     ]); 
     
    }

    public function store(Request $request){
    $data=new documentModel();
    $file=$request->title;
    $filename=time(). '.' .$file-> getClientOriginalName();
    $request->title->move('assets',$filename);
    $data->title=$filename;
    $data['user_id']=auth()->id();
    $data->save();


    return redirect('/');
    }
  
    public function download(Request $request, $title){
      return response()->download(public_path('assets'.$title));
    }

    public function destroy(documentModel $title){
      if($title->user_id != auth()->id()){
        abort('403','Only the Creator!');
      }
      $title->delete();
      return redirect('/');
    }

    public function login(){
      return view('login');
    }

}
