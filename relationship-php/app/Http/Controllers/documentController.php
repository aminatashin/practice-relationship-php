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
        $form=$request->validate([
            'name'=>'required',
            
            
           
           
        ]);
        // if($request->hasFile('document')){
        //     $form['document'] = $request->file('document')->store('files','public');
        // }
        documentModel::create($form);
        return redirect('/');

    }
}
