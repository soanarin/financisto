<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = array('transaction_id','tag_id','category_id','subcategory_id','detail','subamount');

    //relation to transaction
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
