<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $guarded = ['id'];

    public function templateSurat()
    {
        return $this->belongsTo(TemplateSurat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
