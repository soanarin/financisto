<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//sov
use App\Category;
use App\Transaction;
use App\User;
use App\Currency;
use App\Account;
use App\Tag;
use App\Detail;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    var $categories;
    var $users;
    var $currencies;
    var $accounts;
    var $tags;

    public function __construct()
    {
        $this->middleware('auth');

        //sov construct variables for views
        $this->categories = Category::all(array('id','category'))->sortBy("category");
        $this->users = User::all(array('id','name'))->sortBy("name");
        $this->currencies = Currency::all(array('id','currency'));
        $this->accounts = Account::all(array('id','account'));
        $this->tags=Tag::all(array('id','tag'));
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    //for adding transaction in Transaction view
    public function add_transaction()
    {
        
        //\Debugbar::info($this->categories);
        return view('transactions.index',array('categories' => $this->categories,'users'=>$this->users,'currencies'=>$this->currencies,'accounts'=>$this->accounts,'tags'=>$this->tags));
    }

    //for listing all transactions in overview view
    public function overview(){
        $transactionsAll=Transaction::all();
        $detailsAll=Detail::all();
        return view('transactions.overview',array('transactionsAll'=>$transactionsAll,'detailsAll'=>$detailsAll));

    }

    //all transactions by subtransactions
    public function subtransactions(){
        $subtransactions=Detail::with('transaction')->get();
        return view('transactions.subtransactions',array('subtransactions'=>$subtransactions));
    }

    //not used
//     public function post_transaction(Request $request)
//     {
//         $this->validate($request, [
//             'amount' => 'required',
//         ]);


//         $vamount=$request->amount;
//         \Log::info($vamount);
       

//         $transaction = new Transaction;
//         $transaction->amount = $request->amount;
//         $transaction->user_id =\Auth::user()->id;
//         $transaction->transactioner_id =$request->transactioner;
//         $transaction->type =$request->type;
//         $transaction->currency =$request->currency;
//         $transaction->date ='2017-04-09';
//         $transaction->account_id =$request->account;
//         $transaction->save();

//         return redirect('/transaction');
 
//     }

 } //end HomeController