@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class-"row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="col-md-3">
            <div class="well">
                    <form method="POST" action="{{ route('categories.store') }}">
                        <h2>New Category</h2>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <textarea type="text" class="form-control input-lg" id="name" name="name" rows="1" style="resize:none;"></textarea>
                        </div>
                          <div class="col-sm-6">
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                    </form>
            </div>
        </div>
    </div>    

@endsection