<!DOCTYPE html>
<html>
<head>
	<title>ADD Counter Page</title>
</head>
<body>
	<h1>ADD Counter Page</h1>
	<form method="post" >
		@csrf
		Name: <input type="text" name="name" > <br>
		Email: <input type="text" name="email" > <br>
		location: <input type="text" name="location" ><br>
		operator: <input type="text" name="operator" ><br>
		Password: <input type="password" name="password" ><br>
		Confirm Password: <input type="password" name="cpassword" ><br>
		<input type="submit" name="submit" value="Submit" >
	</form>
	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach
	<h3>{{session('msg')}}</h3>
</body>
</html>