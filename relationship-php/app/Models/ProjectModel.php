<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectModel extends Model
{
    use HasFactory;
    protected $fillable=['name','user_id'];
    protected $table='project';
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
