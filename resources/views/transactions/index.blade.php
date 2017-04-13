@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Transaction
                    
                </div>



                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <!-- @include('common.errors') -->

                    <!-- New transaction Form -->
                     <form id="form-transaction" action="{{ url('transaction') }}" method="POST" class="form-horizontal">
 

                        {{ csrf_field() }}




                        <!-- transaction Total Amount -->
                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">Amount</label>

                            <div class="col-sm-6">
                                <input type="number" step='0.01' name="amount" id="amount" class="form-control" value="{{ old('amount') }}" placeholder='0.00'>
                            </div>
                        </div>

                        <!-- transaction Date -->
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label">Date</label>

                            <div class="col-sm-6">
                                <input type="text" name="date" id="date" class="form-control" value="{{ old('date') }}" >
                            </div>
                        </div>


                        <!-- transactioner -->
                        <div class="form-group">
                            <label for="transactioner" class="col-sm-3 control-label">User</label>

                            <div class="col-sm-6">
                                <select type="text" name="transactioner" id="transactioner" class="form-control">
                                    <option value="">--Select User--</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <!-- type in out transfer -->
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Type</label>

                            <div class="col-sm-6">
                                <select type="text" name="type" id="type" class="form-control">
                                    <option value="">--Select Type--</option>
                                     <option value="in">in</option>
                                    <option value="out">out</option>
                                    <option value="transfer">transfer</option>

                                   
                                </select>
                            </div>
                        </div> 

                        <!-- currency -->
                        <div class="form-group">
                            <label for="currency" class="col-sm-3 control-label">Currency</label>

                            <div class="col-sm-6">
                                <select type="text" name="currency" id="currency" class="form-control">
                                    <option value="">--Select Currency--</option>
                                     @foreach ($currencies as $currency)
                                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <!-- account -->
                        <div class="form-group">
                            <label for="account" class="col-sm-3 control-label">Account</label>

                            <div class="col-sm-6">
                                <select type="text" name="account" id="account" class="form-control">
                                    <option value="">--Select Account--</option>
                                     @foreach ($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->account}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <!-- this to be mutiplied by js on split transactions -->
                        <!-- to details table -->
                        <div class="form-group sov-split form-inline">

                                <input type="number" step='0.01' class="form-control" id="subamount" name="subamount" placeholder="0.00" >
                                 <select type="text" name="tag" id="tag" class="form-control ">
                                    <option value="">--Tag--</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->tag}}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="category" id="category" class="form-control ">
                                    <option value="">--Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                                <select type="text" name="subcategory" id="subcategory" class="form-control ">
                                    <option value="">--Subcategory--</option>

                                </select>
                                <input type="text" class="form-control" id="detail" name="detail" placeholder="Detail">
                            <a href="" class="">&nbsp&nbsp<i class="fa fa-btn fa-plus"></i>&nbsp Subtransaction</a>

                        </div>
                        <!-- Add transaction Button -->
                        <br>
                        <br>
                        <div class="col-sm-offset-8 col-sm-2">
                            <button id="submit-transaction" type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>    


                    </form>

                </div>
            </div>

            
        </div>
    </div>
@endsection
