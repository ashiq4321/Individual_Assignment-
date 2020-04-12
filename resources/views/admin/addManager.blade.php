<!DOCTYPE html>
<html>
<head>
	<title>ADD Manager Page</title>
</head>
<body>
	<h1>ADD Manager Page</h1>
	<form method="post" >
		@csrf
		Name: <input type="text" name="name" > <br>
		Email: <input type="text" name="email" > <br>
		location: <input type="text" name="location" ><br>
		operator: <input type="text" name="operator" ><br>
		<input type="submit" name="submit" value="Submit" >
	</form>
	@foreach($errors->all() as $error)
		{{$error}} <br>
	@endforeach
	<h3>{{session('msg')}}</h3>
</body>
</html>