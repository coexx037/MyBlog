@extends('main')

@section('title', '| All Categories')

@section('content')

    <div class-"row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                    <form method="POST" action="{{ route('tags.store') }}">
                        <h2>New Tag</h2>
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
