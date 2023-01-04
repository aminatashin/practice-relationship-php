<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\documentModel;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class documentController extends Controller
{
    public function index(){
      $posts= documentModel::count();
      $users= User::count();
        return view('home',compact('posts','users'), [
            'pdfs'=> documentModel::latest()->get()
        ]);
    }

   

    public function show(documentModel $id){
     
     return view('list',[
      'pdf'=>$id
     ]); 
     
    }

    public function store(Request $request){
    // $data=new documentModel();
    $data = $request->validate([
      'title'=>'required',
      // 'upload-date'=>'required|date|date_format:m-d-y'
    ]);
    
    $file=$request->file('title');
    $filename=time(). '.' .$file-> getClientOriginalName();
    $data['title']=$request->file('title')->move('assets',$filename);
    $data['title']=$filename;
    $data['user_id']=auth()->id();
    documentModel::create($data);


    return redirect('/');
    }
  
  
    public function download(documentModel $title){
      
    
      return response()->download(public_path("assets".$title));
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

    public function date(Request $request){
    
      $fromdate = $request->input('fromdate');
      $todate =  $request->input('todate');
      
    $data = DB::select("SELECT * FROM document WHERE created_at BETWEEN '$fromdate 00:00:00'AND'$todate 23:59:59'");
     
    $posts= documentModel::count();
     $users= User::count();
       return view('home',compact('data','posts','users'), [
           'pdfs'=> documentModel::latest()->get()
       ]);




    // $query = DB::table('document')->select()
    // ->where('created_at' , '>=' , $fromdate)
    // ->where('created_at' , '<=' , $todate)

    // ->get();
   
    // $posts= documentModel::count();
    // $users= User::count();
    //   return view('home',compact('query','posts','users'), [
    //       'pdfs'=> documentModel::latest()->get()
    //   ]);
   }

}
