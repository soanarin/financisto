@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Transaction
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                   @include('common.errors')

                    <!-- New transaction Form -->
                    <form action="{{ url('transaction') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- transaction Name -->
                        <div class="form-group">
                            <label for="transaction-name" class="col-sm-3 control-label">transaction</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="transaction-name" class="form-control" value="{{ old('transaction') }}">
                            </div>
                        </div>

                        <!-- Add transaction Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add transaction
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped transaction-table">
                            <thead>
                                <th>transaction</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $transaction)
                                    <tr>
                                        <td class="table-text"><div>{{ $transaction->name }}</div></td>

                                        <!-- transaction Delete Button -->
                                        <td>
                                            <form action="{{url('transaction/' . $transaction->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-transaction-{{ $transaction->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
