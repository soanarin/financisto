@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                All Transactions
            </div>

            <div class="panel-body">
               
                <table id="allTransactions" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Who</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Currency</th>
                            <th>Account</th>
                            <th>
                                <table>
                                    <th>Subamount</th>
                                    <th>Tag</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Detail</th>
                                </table>

                            </th>

                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach ($transactionsAll as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ App\User::find($transaction->transactioner_id)->name }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->date }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ App\Currency::find($transaction->currency)->currency }}</td>
                                <td>{{ App\Account::find($transaction->account_id)->account }}</td>
                                <td>
                                    <table>
                                    @foreach($transaction->details as $detail)
                                        <tr>
                                            <td>{{$detail->subamount}}</td>
                                            <td>{{App\Tag::find($detail->tag_id)->tag}}</td>
                                            <td>{{App\Category::find($detail->category_id)->category}}</td>
                                            <td>{{App\Subcategory::find($detail->subcategory_id)->subcategory}}</td>
                                            <td>{{$detail->detail}}</td>
                                        </tr>
                                    @endforeach
                                    </table>

                                </td>
                            
                            
                            </tr>
                        @endforeach                       
                    </tbody>
                </table>





            </div>
        </div>
            
    </div>
@endsection
