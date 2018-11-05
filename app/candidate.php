<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\verification\MagicallyAuthenticable;

class candidate extends Model
{
    use MagicallyAuthenticable;

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function kura()
    {
        return $this->hasOne(kura::class);
    }
}

