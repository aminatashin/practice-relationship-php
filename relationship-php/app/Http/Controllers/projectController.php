<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class projectController extends Controller
{

    public function indexName(){
        // $projectName = ProjectModel::all();
        return view('test',[
            'projects'=>ProjectModel::latest()->get(),
        ]);
    }


    public function store(Request $request){
        $form = $request->validate([
            'name'=>'required'
        ]);
        // $form['user_id']=auth()->id();
        ProjectModel::create($form);
    
    
        return redirect('/');
    }
}
