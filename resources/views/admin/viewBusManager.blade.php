<!DOCTYPE html>
<html>
<head>
	<title>bus manager list</title>
</head>
<body>	
<h1>bus manager list</h1>
	<a href="/logout">Logout</a> 
	<form method="post" >
		@csrf
		<input type="text" name="search" > <br>
		<input type="submit" name="submit" value="search" >
		<a href="/system/supportstaff/add">ADD<a>
	<table border="1">
		<tr>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>COMPANY</th>
			<th>REGISTERED</th>
		</tr>
		
		@foreach($users as $user)
		<tr>
			<td>{{$user['name']}}</td>
			<td>{{$user['email']}}</td>
			<td>{{$user['company']}}</td>
			<td>{{$user['registered']}}</td>
			<td>
			<a onclick="return confirm('Are you sure?')" href="{{route('busmanager.delete', $user['id'])}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
    </form>
</body>
</html>