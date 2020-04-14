<!DOCTYPE html>
<html>
<head>
	<title>edit Bus Page</title>
</head>
<body>
	<h1>Edit Bus Page</h1>
	<form method="post" action="{{ route('update.bus', ['id' => $user->id])}}" >
	    @csrf
		Name: <input type="text" name="name" value='{{$user->name}}'> <br>
		Location: <input type="text" name="location" value='{{$user->location}}' > <br>
		Seat_row: <input type="text" name="seat_row" value='{{$user->seat_row}}' > <br>
		Seat_column: <input type="text" name="seat_column" value='{{$user->seat_column}}' > <br>
		company: <input type="text" name="company"  value='{{$user->company}}'> <br>
		<input type="submit" name="submit" value="Submit" >
        @method('PATCH')
	</form>
</body>
</html>