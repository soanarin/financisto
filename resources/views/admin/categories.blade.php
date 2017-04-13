@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Categories
                </div>

                <div class="panel-body">
                     <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Category Form -->
                    <form id="form-category" action="{{route('postCategoriesRoute')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Category</label>

                            <div class="col-sm-6">
                                <input type="text" name="category" id="category" class="form-control">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-info"> Submit</button>
                            </div>
                        </div>
                    </form>

                <!-- </div> -->
                <!-- end .panel-body  -->
                <!-- <div class="panel-body"> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td id="{{$category->id}}">{{$category->category}}</td>
                                    <td>
                                        <form action="{{route('putCategoriesRoute',['id' => $category->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <!-- <button>Edit</button> -->
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('deleteCategoriesRoute',['id' => $category->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- end panel body    -->
            </div> 
            <!-- end .panel-default -->
            
        </div>
        <!-- end col 10 -->
    
    </div>
    <!-- end container     -->
@endsection
