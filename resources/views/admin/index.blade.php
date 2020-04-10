<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<h1>Welcome Home! {{session('name')}}</h1>&nbsp
	<form method="post" >
		@csrf
	</form>

</body>
</html>