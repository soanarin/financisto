@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                All Transactions
            </div>

            <div class="panel-body">
               
                <table id="allSubtransactions" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id</th>

                            <th>tr-id</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Date</th>
                            <th>Who</th>
                            <th>Type</th>
                            <th>Account</th>

                            <th>Subamount</th>
                            <th>Tag</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Detail</th>


                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach ($subtransactions as $subtransaction)
                            <tr>
                                <td>{{ $subtransaction->id }}</td>

                                <td>{{ $subtransaction->transaction->id }}</td>
                                <td>{{ $subtransaction->transaction->amount }}</td>
                                <td>{{ App\Currency::find($subtransaction->transaction->currency)->currency }}</td>
                                <td>{{ $subtransaction->transaction->date }}</td>
                                <td>{{ App\User::find($subtransaction->transaction->transactioner_id)->name }}</td>
                                <td>{{ $subtransaction->transaction->type }}</td>
                                <td>{{ App\Account::find($subtransaction->transaction->account_id)->account }}</td>

                                <td>{{$subtransaction->subamount}}</td>
                                <td>{{App\Tag::find($subtransaction->tag_id)->tag}}</td>
                                <td>{{App\Category::find($subtransaction->category_id)->category}}</td>
                                <td>{{App\Subcategory::find($subtransaction->subcategory_id)->subcategory}}</td>
                                <td>{{$subtransaction->detail}}</td>

                            
                            
                            </tr>
                        @endforeach                       
                    </tbody>
                </table>





            </div>
        </div>
            
    </div>
@endsection
