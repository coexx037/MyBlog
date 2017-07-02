@extends('main')

@section('title', '| Edit Post')

<link rel="stylesheet" type="text/css" href="css/select2.min.css">

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>tinymce.init({ selector:'textarea', plugins: 'link' });</script>

@section('content')

    <div class="row">

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input id="title" name="title" class="form-control" required maxlength="255" value="{{ $post->title }}">

        </div>
        <div class="form-group">
          <label name="category_id">Category:</label>
          <select class="form-control" name="category_id">

            @foreach($categories as $category)
            {!! $post->category->id == $category->id ? $selected='selected' : $selected=null !!}
            <option {{$selected}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

          </select>
        </div>

        <div class="form-group">
          <label for="tags">tags:</label>
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
        </div>

        {{ Form::label('featured_image', 'Update Featured Image: ') }}
        {{ Form::file('featured_image') }}


        <div class="form-group">
            <label for="slug">Url:</label>
            <input id="slug" name="slug" class="form-control" required minlength="5" maxlength="255" value="{{ $post->slug }}">
            
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea type="text" class="form-control input-lg" id="body" name="body" rows="10">{{ $post->body }}</textarea>
        </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <dl class="dl-horizontal">
              <dt>Created at:</dt>
              <dd>{{ date('M j, Y h:i:sa', strtotime($post->created_at)) }}</dd>
            </dl>

        <dl class="dl-horizontal">
          <dt>Last updated:</dt>
          <dd>{{ date('M j, Y h:i:sa', strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Back</a>
          </div>
          <div class="col-sm-6">
              <button type="submit" class="btn btn-success btn-block">Save</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">

              {{ method_field('PUT') }}
    </form>
    </div>

    <script type="text/javascript">
$(document).ready(function() {
  $(".select2-multi").select2();
  $(".select2-multi").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
});
</script>

@endsection
