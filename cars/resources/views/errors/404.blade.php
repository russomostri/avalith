<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Unauthorized Access</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

		<style>
			html, body {
				height: 100%;
			}

			body {
				margin: 0;
				padding: 0;
				width: 100%;
				
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-family: 'Lato';
				font-size: 72px;
				margin-bottom: 40px;
				color: #B0BEC5;
				font-weight: 100;
			}
		</style>

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
			<div class="content">
				<div class="title">Anda a come chipa pa tu casa vo.</div>
			</div>
		</div>
	</body>
</html>
