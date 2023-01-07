<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectModel extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    protected $table='project';
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function documents()
    {
        return $this->hasManyThrough(
            documentModel::class,
            team::class,
            'project_model_id',
            'user_id',
            'id',
            'user_id'
        
        
        );
    }
}
