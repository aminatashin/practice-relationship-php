<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\documentModel;
use App\Models\DocumentUserModel;
use App\Models\User;

class documentController extends Controller
{
    public function index(){
        return view('home',[
            'pdfs'=> documentModel::latest()->get()
        ]);
    }

   

    public function show($id){
      $documentModel = documentModel::find($id);
      
      return view ('list',[
      'pdf'=>$documentModel->load('documents.user')
      ]);
    }

    public function store(Request $request){
    $data=new documentModel();
    $file=$request->title;
    $filename=time(). '.' .$file-> getClientOriginalName();
    $request->title->move('assets',$filename);
    $data->title=$filename;
    $data->save();

  $documentModel = DocumentUserModel::create([
    'user_id' => auth()->id(),
    'document_id' => $data->id
  ]);

    return redirect('/');
    }
  
    public function download(Request $request, $title){
      return response()->download(public_path('assets/'.$title));
    }

    public function destroy(documentModel $title){
      $title->delete();
      return redirect('/');
    }


}
