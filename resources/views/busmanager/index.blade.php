<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<h1>Welcome Home! {{session('name')}}</h1>&nbsp
<a href="/logout">Logout</a> 
<a href="{{route('buscounter.list')}}">buscounter</a> 
	<form method="post" >
		@csrf
	</form>

</body>
</html>