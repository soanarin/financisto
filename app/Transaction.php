<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = array('user_id','type','currency','date','account_id','amount');

    //relation to details ( the splited subtransactions)
    public function details()
    {
        return $this->hasMany('App\Detail');
    }
}
