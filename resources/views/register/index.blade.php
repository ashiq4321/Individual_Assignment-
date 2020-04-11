<!DOCTYPE html>
<html>
<head>
	<title>register Page</title>
</head>
<body>
	<h1>register Page</h1>
	<form method="post" >
		@csrf
		Name: <input type="text" name="name" > <br>
		Email: <input type="text" name="email" > <br>
		Password: <input type="password" name="password" ><br>
		Confirm Password: <input type="password" name="cpassword" ><br>
		Company: <input type="text" name="company" > <br>
		<input type="submit" name="submit" value="Submit" >
	</form>
	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach
	<h3>{{session('msg')}}</h3>
</body>
</html>