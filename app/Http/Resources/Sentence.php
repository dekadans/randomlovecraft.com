<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sentence extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'sentence' => $this->text,
            'book' => new Book($this->book)
        ];
    }
}
