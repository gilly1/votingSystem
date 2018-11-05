<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function candidate()
    {
        return $this->hasMany(candidate::class);
    }
}
