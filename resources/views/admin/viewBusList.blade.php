<!DOCTYPE html>
<html>
<head>
	<title>bus  list</title>
</head>
<body>	
<h1>bus  list</h1>
	<a href="/logout">Logout</a> 
		<a href="{{route('add.bus')}}">ADD<a>
	<table border="1">
		<tr>
		    <th>CoOMPANY</th>
			<th>MANAGER</th>
			<th>NAME</th>
			<th>LOCATION</th>
			<th>SEAT_ROW</th>
			<th>SEAT_COLUMN</th>
		</tr>
		
		@foreach($users as $user)
		<tr>
			<td>{{$user->company}}</td>
			<td>{{$user->manager}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->location}}</td>
			<td>{{$user->seat_row}}</td>
			<td>{{$user->seat_column}}</td>
			<td>
			<a href="/system/buses/{{$user->id}}/edit">Edit</a>
			<a href="#">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>