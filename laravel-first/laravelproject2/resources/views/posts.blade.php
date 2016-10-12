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
				Nombre
			</th>
			<th>
				Descripcion
			</th>
			<th>
				Texto
			</th>
			<th>
				Categoria
			</th>
			<th>
				Autor
			</th>
			<th>
				Tags
			</th>
			<th>
				Action
			</th>
			@if (!isset($posts->name))
			@foreach ($posts as $val)
			<tr>
				<td><p>{{$val->id}}</p></td>
				<td><p>{{$val->name}}</p></td>
				<td><p>{{$val->description}}</p></td>
				<td><p>{{$val->text}}</p></td>
				<td><p>{{$val->category->name}}</p></td>
				<td><p>{{$val->user->name}}</p></td>
				<td>
					<p>

						@if(!$val->tags->isEmpty())

						@foreach ($val->tags as $val2)

						{{$val2->name}} -
						@endforeach
						@else
						no hay tag
						@endif
					</p>
				</td>
				<td>
					<div style="width: 120px;">
						<div style="float:left">
							<form method="POST" action="{{ URL::to('post/'. $val->id ) }}">
								<input type="hidden" name="_method" value="GET">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="fa fa-eye fa-2x" id="viewpost"></button>
							</form>
						</div>
						<div style="float:left">
							<form method="POST" action="{{ URL::to('post/'. $val->id .'/edit') }}">
								<input type="hidden" name="_method" value="GET">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="fa fa-pencil fa-2x" id="editpost"></button>
							</form>
						</div>

						<div style="float:left">
							<form method="POST" action="{{ URL::to('post/'. $val->id ) }}">
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
					<td><p>{{$posts->name}}</p></td>
					<td><p>{{$posts->description}}</p></td>
					<td><p>{{$posts->text}}</p></td>
					<td><p>{{$posts->category->name}}</p></td>
					<td><p>{{$posts->user->name}}</p></td>

					<td>
						<p>
							@if(!$val->tag->isEmpty)
							@foreach ($val->tag as $val2)
							{{$val2->name}} -
							@endforeach
							@endif
						</p>
					</td>
					<td>
						<form method="POST" action="{{ URL::to('post/'. $val->id ) }}">
							<input type="hidden" name="_method" value="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="fa fa-eye fa-2x" id="viewpost"></button>
						</form>

						<form method="POST" action="{{ URL::to('post/'. $val->id .'/edit') }}">
							<input type="hidden" name="_method" value="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="fa fa-pencil fa-2x" id="editpost"></button>
						</form>

						<form method="POST" action="{{ URL::to('post/'. $val->id ) }}">
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
