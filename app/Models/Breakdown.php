<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;
    protected $table = 'breakdowns';
    public $timestamps = false;
    protected $fillable = ['values', 'random_id'];
    public function random()
    {
        return $this->belongsTo('App\Random', 'random_id', 'id')->withDefault();
    }
}
