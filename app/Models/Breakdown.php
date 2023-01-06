<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;
    public $timestamps =false;
    public function random(){
        return $this->belongsTo('App\Random', 'random_id', 'id')->withDefault();
    }
}
