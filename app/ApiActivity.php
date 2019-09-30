<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ApiActivity extends Model
{
    public $table = 'api_activity';

    public $timestamps = false;

    public function apiKey()
    {
        return $this->belongsTo(ApiKey::class);
    }
}
