<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pimp My Ride</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('/') }}">Car Uno</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('/car') }}">View All Cars</a></li>
			<li><a href="{{ URL::to('car/create') }}">Create a Car</a></li>
			<li><a href="{{ URL::to('/brand') }}">View All Brands</a></li>
		</ul>
		<div style="float: right; padding: 15px; color: #fff; ">
			<p>Usuario conectado: {{ Auth::user()->name}}</p>
		</div>
	</nav>
	<div class="container">
	<br><p><strong>Lista de Marcas</strong></p><br>
		<table class="table table-hover">
			<th>
				ID
			</th>
			<th>
				Marca
			</th>
		</table>
	</div>
</body>
</html>