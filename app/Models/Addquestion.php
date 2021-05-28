<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addquestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function addanswers(){
        return $this->hasMany(Addanswer::class);
    }
}
