<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\ProjectModel;
use Illuminate\Http\Request;
use App\Models\documentModel;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class documentController extends Controller
{
    public function index(){

 
     
        return view('home',[
          'pdfs'=> documentModel::latest()->get(),
        ]);
    }
    public function indexProject(){
      $uploadedFile= documentModel::count();
      $users= User::count();
 
     
        return view('project',compact('users','uploadedFile'), [
            'pdfs'=> documentModel::latest()->get(),
            
            
        ]);

    }
   

    public function show(documentModel $id){
     
     return view('list',[
      'pdf'=>$id
     ]); 
     
    }
    public function form(){
      return view( 'form');
    }
    
    
    public function store(Request $request){
    // $data=new documentModel();
    $data = $request->validate([
      'title'=>'required',
      
      
    ]);
    
    $file=$request->file('title');
    $filename=time(). '.' .$file-> getClientOriginalName();
    $data['title']=$request->file('title')->move('assets',$filename);
    $data['title']=$filename;
    $data['user_id']=auth()->id();
    documentModel::create($data);


    return redirect('/project');
    }
  
  
    public function download(documentModel $title){
      
    
      return response()->download(public_path("assets".$title));

    }

    public function destroy(documentModel $title){
      if($title->user_id != auth()->id()){
        abort('403','Only the Creator!');
      }
      $title->delete();
      return redirect('/project');
    }

    public function login(){
      return view('login');
    }

    public function date(Request $request){
    
    //   $fromdate = $request->input('fromdate');
    //   $todate =  $request->input('todate');
      
    // $data = DB::select("SELECT * FROM document WHERE created_at BETWEEN '$fromdate 00:00:00'AND'$todate 23:59:59'");
    //  dd($data);
    // $uploadedFile= documentModel::count();
    //  $users= User::count();
    //    return view('home',compact('data','uploadedFile','users'), [
    //        'pdfs'=> documentModel::latest()->get(),
    //        'indis'=> User::all(),
    //    ]);



       $fromdate = $request->input('fromdate');
       $todate =  $request->input('todate');
    $query = DB::table('document')->select()
    ->where('created_at' , '>=' , $fromdate)
    ->where('created_at' , '<=' , $todate)

    ->get();
  
    $uploadedFile= documentModel::count();
     $users= User::count();
       return view('home',compact('query','uploadedFile','users'), [
           'pdfs'=> documentModel::latest()->get(),
           
       ]);

   
   }

}
