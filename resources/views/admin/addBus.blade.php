<!DOCTYPE html>
<html>
<head>
	<title>ADD Bus Page</title>
</head>
<body>
	<h1>ADD Bus Page</h1>
	<form method="post" >
		@csrf

		Name: <input type="text" name="name" > <br>
		Location: <input type="text" name="location" > <br>
		Seat_row: <input type="text" name="seat_row" > <br>
		Seat_column: <input type="text" name="seat_column" > <br>
		company: <input type="text" name="company" > <br>
		<input type="submit" name="submit" value="Submit" >

	</form>
	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach
	<h3>{{session('msg')}}</h3>
</body>
</html>