<!DOCTYPE html>
<html>
<head>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <meta charset="utf-8">
  <title>Post</title>

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ URL::to('/') }}">Blog Alert</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('/post') }}">View All Posts</a></li>
      <li><a href="{{ URL::to('post/create') }}">Create a Post</a></li>
      <li><a href="{{ URL::to('/comment') }}">View All Comments</a></li>
      </ul>
    </nav>
      <table border=3px>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Texto</th>
        <th>Categoria</th>
        <th>Autor</th>
        <th>Tags</th>
        <tr>
          <td><p>{{$posts->name}}</p></td>
          <td><p>{{$posts->description}}</p></td>
          <td><p>{{$posts->text}}</p></td>
          <td><p>{{$posts->category->name}}</p></td>
          <td><p>{{$posts->user->name}}</p></td>
          <td>
              <p>
                @if(!$posts->tags->isEmpty())
                  @foreach ($posts->tags as $tag)
                    {{$tag->name}} -
                  @endforeach
                @else
                  no hay tag
                @endif
              </p>
          </td>
        </tr>
      </table>

      <table border=1px width="100%">

          <th>Usuario</th>
          <th>Comentario</th>
          @if(!$posts->comments->isEmpty())
            @foreach ($posts->comments as $comment)
            <tr>
              <td><p>{{$comment->user->name}}</p></td>
              <td><p>{{$comment->description}}</p></td>
            </tr>
            @endforeach
          @else
          <tr>
            <td colspan="2"><h4>No hay comentarios</h4></td>

          </tr>
          @endif
          <tr>
            <form method="POST" action="{{ URL::to('comment') }}">
              <td>              
                <input type="hidden" name="post_id" value="{{$posts->id}}">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-default">Submit</button>
              </td>
              <td>
                <textarea style=" width :100%" type="text" name="comment"></textarea>                   
              </td>
            </form>
          </tr>
      </table>


  </body>
  </html>
