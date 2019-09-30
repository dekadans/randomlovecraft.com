<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
