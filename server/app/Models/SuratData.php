<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratData extends Model
{
    protected $guarded = ['id'];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
