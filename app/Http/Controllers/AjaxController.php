<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Category;
use App\Transaction;
use App\Detail;
use Log;


class AjaxController extends Controller
{
    //populate subcategories drop down in add transactions view
    public function subcategoryDropDownData(Request $request){
    	$category_id=$request->cat_id;
    	//Log::info($subcategories);
    	$subcategories=Category::find($category_id)->subcategories;
    	//Log::info($subcategories);
    	return Response::json($subcategories);

    }

    public function submitTransaction(Request $request){
    	//get the serialized data from submitted transaction
    	$data=$request->all();
    	//Log::info($data['amount']);
    	//insert new transaction
    	$transaction = new Transaction;
        $transaction->amount = $request->amount;
        $transaction->user_id =\Auth::user()->id;
        $transaction->transactioner_id =$request->transactioner;
        $transaction->type =$request->type;
        $transaction->currency =$request->currency;
        $transaction->date ='2017-04-09';
        $transaction->account_id =$request->account;
        $transaction->completed=0;
        $transaction->save();
        //get the id of new transaction
        $insertedId = $transaction->id;

         $detail=new Detail;
        $detail->transaction_id=$insertedId;
        $detail->subamount=$request->subamount;
        $detail->tag_id=$request->tag;
        $detail->category_id=$request->category;
        $detail->subcategory_id=$request->subcategory;
        $detail->detail=$request->detail;
        $detail->save();

        return response()->json(['responseText' => 'Success!','newId'=>$insertedId,'newAmount'=>$transaction->amount], 200);


    }
}
