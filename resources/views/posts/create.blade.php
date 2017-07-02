@extends('main')

@section('title', '| Create New Post')






@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('posts.store') }}" data-parsley-validate enctype="multipart/form-data">
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control" required maxlength="255">
      </div>
      <div class="form-group">
        <label name="slug">Slug:</label>
        <input id="slug" name="slug" class="form-control" required minlength="5" maxlength="255">
      </div>
      <div class="form-group">
        <label name="category_id">Category:</label>
        <select class="form-control" name="category_id">

          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach

        </select>
        </div>

        <div class="form-group">
        <label name="tags">Tags:</label>
        <select class="form-control select2-multi" name="tags[]" multiple="multiple">

          @foreach($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach

        </select>

        {{ Form::label('featured_image', 'Upload Featured Image:')}}
        {{ Form::file('featured_image') }}

      </div>
      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="10" class="form-control" required></textarea>
      </div>
      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $(".select2-multi").select2();
});
</script>

@endsection
