<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = array('subcategory','category_id');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
