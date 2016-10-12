<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Car</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<style>
		form{
			margin : 25px;
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
	<section class="container">
		<div class="row">
			<form class="col-md-6 col-md-offset-3" method="POST" action="@if(isset($car->id)) {{ URL::to('car/'. $car->id) }} @else {{ URL::to('car/') }}  @endif">
			
			<div class="form-group">
				<label for="Year">Year</label>
				<input name="year" type="text" class="form-control" id="Year" placeholder="Year" value="{{$car->year}}">
			</div>
			
			<div class="form-group">
				<label for="Color">Color</label>
				<input name="color" type="text" class="form-control" id="Color" placeholder="Color" value="{{$car->color}}">
			</div>
			
			<div class="form-group">
				<label for="Marca">Marca</label>
				<select class="form-control" name="marca" id="Marca">
					<option value="null" selected>Seleccione una Marca</option>
					@foreach ($brands as $brand)
						<option @if(isset($car->brand->id)) @if( $car->modelo->brand->id == $brand->id ) selected @endif  @endif value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>

			</div>

			<div class="form-group">
				<label for="Modelo">Modelo</label>
				<select class="form-control" name="modelo_id" id="Modelo" disabled>
					<option value="null">Seleccione un modelo</option>
				</select>
			</div>    

			<div class="form-group">
				<label for="Features">Feature/s</label>
				<select class="form-control Multiple" id="Features" multiple="multiple" name="features[]">
					@foreach ($features as $feature)
						<option  @if(isset($car->features)) @if($car->features->contains('id', $feature->id)) selected  @endif @endif value="{{$feature->id}}">{{$feature->name}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="KMS">KMS</label>
				<input name="kms" type="text" class="form-control" id="KMS" placeholder="KMS" value="{{$car->kms}}">
			</div>
			

			<div class="form-group">
				<label for="Price">Price</label>
				<input name="price" type="text" class="form-control" id="Price" placeholder="Price" value="{{$car->price}}">
			</div>
				<input type="hidden" name="_method" value="POST">
        <button type="submit" class="btn btn-default">Submit</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</section>
<script>
	
$(document).ready(function() {
  $(".Multiple").select2();
}); 

	var modelos = <?= $modelos; ?>;
$( "#Marca" ).change(function() {
		//alert('hola	')
  	console.log($("#Marca").val())

$('#Modelo').html('');
var isModel = false;
		$.each( modelos, function( i, modelo ){
 	 		if(modelo.brand_id == $("#Marca").val()){
 	 			$('#Modelo').append('<option value="' + modelo.id + '"> ' + modelo.name + ' <optrion> ');
 	 			isModel = true;
 	 		}
		});
		if(isModel){
			$('#Modelo').removeAttr('disabled');
		}
		else {$('#Modelo').attr('disabled');}
});


</script>
</body>
</html>