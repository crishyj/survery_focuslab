<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suranswer extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function addanswers(){
        return $this->hasMany(Addanswer::class);
    }
}
