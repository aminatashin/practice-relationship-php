<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentModel extends Model
{
    use HasFactory;
    protected $fillable=['title'];
    protected $table ='document_models';
}
