<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/') }}">Blog Alert</a>
		</div>
	</nav>

	
	<section class="container">
				
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6">
			<div>
				<h4>Crea tu Cuenta</h4>
				<form action="{{ URL::to('/user') }}">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<input type="hidden" name="_method" value="GET">
	    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
			<div>
				<h4>Crea tu Cuenta</h4>
				<form action="{{ URL::to('/user') }}">
					<div class="form-group">
						<label for="exampleInputPassword1">Usuario</label>
						<input type="password" name="user" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" name="mail" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Repeat Password</label>
						<input type="password" class="form-control" name="rpass" id="exampleInputPassword1" placeholder="Password">
					</div>
					<input type="hidden" name="_method" value="POST">
	    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
	</section>
</body>
</html>