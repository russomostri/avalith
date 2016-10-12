<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New Post</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Blog Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/post') }}">View All Posts</a></li>
            <li><a href="{{ URL::to('post/create') }}">Create a Post</a>
            <li><a href="{{ URL::to('/comment') }}">View All Comments</a></li>
        </ul>
    </nav>

    <div class="container">
      <form method="POST" action="@if(isset($post->id)) {{ URL::to('post/update/'. $post->id) }} @else {{ URL::to('post/store') }}  @endif">
        <div class="form-group">
          <label for="Title">Title</label>
          <input type="text" class="form-control" id="Title" placeholder="Title" name="Title" value="{{$post->name}}" required>
        </div>
        <div class="form-group">
          <label for="Description">Description</label>
          <textarea class="form-control" id="Description" placeholder="Description" name="Description" required>{{$post->description}}</textarea>
        </div>

        <div class="form-group">
          <label for="Text">Text</label>
          <textarea class="form-control" id="Text" placeholder="Text" name="Text" required>{{$post->text}}</textarea>
        </div>

        <div class="form-group">
          <label for="Tags">Tag/s</label>
          <select class="form-control Multiple" id="Tags" multiple="multiple" name="Tags[]" required>
              @foreach ($tags as $tag)
                <option  @if(isset($post->tags)) @if($post->tags->contains('id', $tag->id)) selected  @endif @endif value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="Category">Category/s</label>
          <select id="Category" name="Category" required >
              <option selected="selected">Select Your Beverage</option>
              @foreach ($categories as $cat)
                <option @if(isset($post)) @if( $post->category_id == $cat->id ) selected @endif  @endif value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="Author">Author/s</label required>
            <select  id="Author" name="Author" >
              @foreach ($users as $user)
                <option @if(isset($post)) @if( $post->autor_user_id == $user->id ) selected @endif  @endif value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
        </div>
        <input type="hidden" name="name" value="{{$post->id}}">
        <script type="text/javascript">
          $(document).ready(function() {
            $(".Multiple").select2();
          });
        </script>

        <input type="hidden" name="_method" value="@if(isset($post)) PUT @else POST @endif">
        <button type="submit" class="btn btn-default">Submit</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>
    </div>
  </body>
</html>
