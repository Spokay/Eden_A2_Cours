<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'photo', 'texte'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
