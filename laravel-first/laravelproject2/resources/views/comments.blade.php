<!DOCTYPE html>
<html>
<head>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<meta charset="utf-8">
	<title>Post</title>

</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/post') }}">Blog Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('/post') }}">View All Posts</a></li>
			<li><a href="{{ URL::to('post/create') }}">Create a Post</a></li>
			<li><a href="{{ URL::to('/comment') }}">View All Comments</a></li>
		</ul>
	</nav>

	<div class="container">
		<div class="col-md-12">
		<table class="table">
			<th>
				ID
			</th>
			<th>
				Descripcion
			</th>
			<th>
				User
			</th>
			<th>
				Post
			</th>
			
			@if (!isset($comments->description))
			@foreach ($comments as $val)
			<tr>

				<td><p>{{$val->id}}</p></td>
				<td><p>{{$val->description}}</p></td>
				<td><p>{{$val->user->name}}</p></td>
				<td><p>{{$val->post['name']}}</p></td>
				<td>
					<div style="width: 120px;">
						<div style="float:left">
							<form method="POST" action="{{ URL::to('comment/'. $val->id ) }}">
								<input type="hidden" name="_method" value="GET">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="fa fa-eye fa-2x" id="viewpost"></button>
							</form>
						</div>
						<div style="float:left">
							<form method="POST" action="{{ URL::to('comment/'. $val->id .'/edit') }}">
								<input type="hidden" name="_method" value="GET">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="fa fa-pencil fa-2x" id="editpost"></button>
							</form>
						</div>

						<div style="float:left">
							<form method="POST" action="{{ URL::to('comment/'. $val->id ) }}">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="fa fa-trash fa-2x" id="deletepost"></button>
							</form>
							
						</div>
					</div>
				</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td><p>{{$comments->id}}</p></td>
					<td>

						@if(isset($action)&&($action))
						
						<form method="POST" action="{{ URL::to('comment/'. $comments->id ) }}">
								<input type="hidden" name="post_id" value="{{$comments->id}}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-default">Submit</button><textarea style=" width :450px" type="text" name="comment">{{$comments->description}}</textarea>
						</form>
						@else
						<p>{{$comments->description}}</p>
						@endif

					</td>
					<td><p>{{$comments->user->name}}</p></td>
					<td><p>{{$comments->post->name}}</p></td>
					<td>
						<form method="POST" action="{{ URL::to('comment/'. $comments->id ) }}">
							<input type="hidden" name="_method" value="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="fa fa-eye fa-2x" id="viewpost"></button>
						</form>

						<form method="POST" action="{{ URL::to('comment/'. $comments->id .'/edit') }}">
							<input type="hidden" name="_method" value="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button @if(isset($action)&&($action)) disabled="disabled" @endif class="fa fa-pencil fa-2x" id="editpost"></button>
						</form>

						<form method="POST" action="{{ URL::to('comment/'. $comments->id ) }}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="fa fa-trash fa-2x" id="deletepost"></button>
						</form>
					</td>
				</tr>
				@endif


			</table>
			</div>
		</div>
	</body>
	</html>
