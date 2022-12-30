<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentModel extends Model
{
    use HasFactory;
    protected $fillable=['title'];
    protected $table ='document_models';

    public function users(){
        return $this->belongsTo(DocumentUserModel::class);
    }

//public function userDocuments

public function documents(){
    return $this->hasMany(DocumentUserModel::class, 'document_id', 'id');
   }
    
}
