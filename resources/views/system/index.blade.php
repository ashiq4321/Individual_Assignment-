<!DOCTYPE html>
<html>
<head>
	<title>system Page</title>
</head>
<body>
<h1>Welcome to BUS TICKET RESERVATION SYSTEM </h1>&nbsp
<a href="/system/supportstaff/login">login</a> |<br>
<a href="{{route('register.index')}}">register</a> 
	<form method="post" >
		@csrf
	</form>

</body>
</html>