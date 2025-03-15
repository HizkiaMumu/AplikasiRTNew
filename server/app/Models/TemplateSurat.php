<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateSurat extends Model
{
    protected $guarded = ['id'];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}
