<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\documentModel;

class documentController extends Controller
{
    public function index(){
        return view('home',[
            'pdfs'=> documentModel::latest()->get()
        ]);
    }

    public function store(Request $request){
      $form = $request->validate([
        'title'=>'required'
      ]);
      if($request->hasFile('title')){
        $form['title']=$request->file('title')->store('files','public');
      }
      $form['title']= $request->file('title');
      $fullname=$form['title']->$request->file('title')->getClientOriginalExtension();
      $extention=$form['title']->$request->file('title')->getClientOriginalExtension();
      $name=explode('.'.$extention,$fullname);
      documentModel::create($name);
      return redirect('/');

    }
}
