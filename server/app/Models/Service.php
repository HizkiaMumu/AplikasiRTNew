<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $guarded = ['id'];

    public function member(){
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function cs(){
        return $this->belongsTo('App\Models\User', 'cs_id');
    }

    public function teknisi(){
        return $this->belongsTo('App\Models\User', 'teknisi_id');
    }

}
