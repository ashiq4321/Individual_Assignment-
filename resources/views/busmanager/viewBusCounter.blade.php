<!DOCTYPE html>
<html>
<head>
	<title>bus Counter list</title>
</head>
<body>	
<h1>bus Counter list</h1>
<a href="/system/supportstaff/add">ADD<a>
	<table border="1">
		<tr>
			<th>NAME</th>
			<th>location</th>
			<th>action</th>
		</tr>
		
		@foreach($users as $user)
		<tr>
			<td>{{$user['name']}}</td>
			<td>{{$user['location']}}</td>
			<td>
			<a onclick="return confirm('Are you sure?')" href="{{route('busmanager.delete', $user['name'])}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>