<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function queanswers(){
        return $this->hasMany(Queanswer::class);
    }

    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
}
