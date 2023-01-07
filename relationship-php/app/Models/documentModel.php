<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentModel extends Model
{
    use HasFactory;
    protected $fillable=['title','user_id'];
    protected $table='document';
    ///////////////////////////////////////
     public function users(){
         return $this->belongsTo(User::class,'user_id');
     }
     public function projects(){
        return $this->belongsTo(ProjectModel::class,'project_model_id');
    }
    
}
