<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kura extends Model
{
    public function candidate()
    {
        return $this->belongsTo(candidate::class);
    }
}
