<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class projectController extends Controller
{

    public function index(){

        return view('home',[
            'projects'=>ProjectModel::latest()->get()
        ]);
    }
// ---------------------------------------------------
    public function form(){
        return view( 'form');
      }
// ---------------------------------------------------


    public function storeForm(Request $request){
        $form = ProjectModel::create([
            'name'=>'aminamin'
        ]);
        $user = User::all();
      
        $form->users()->attach($user);
       
    
    
        return redirect('/');
    }
}
// ---------------------------------------------------