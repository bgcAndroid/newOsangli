<!doctype html>
<html lang="en">
<body>
<div class="container">
	<h1>Hello, {{$user->name}}</h1>
	<a href="{{route('sendMailDone',["email"=>$user->email,"verifyToken"=>$user->verifyToken] )}}">Verify Account</a>
</div>

</body>
</html>