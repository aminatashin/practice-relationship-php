<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUserModel extends Model
{
    use HasFactory;

    protected $table  = 'document_user';

    protected $fillable = ['user_id', 'document_id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
