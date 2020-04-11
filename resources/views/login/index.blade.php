<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login Page</h1>
	<form method="post" >
		@csrf
		Email: <input type="text" name="email" value='{{session('email')}}'> <br>
		Password: <input type="password" name="password" ><br>
		<input type="submit" name="submit" value="login" >
	</form>
	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach
	<h3>{{session('msg')}},{{session('name')}}</h3>
</body>
</html>