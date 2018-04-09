<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
