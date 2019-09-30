<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }
}
