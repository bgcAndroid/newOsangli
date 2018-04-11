<!doctype html>
<html lang="en">
<body>
<h1>Hello, {{$user->name}}</h1>
<a href="{{route('sendMailDone',["email"=>$user->email,"verifyToken"=>$user->verifyToken] )}}">Verify Account</a>
</body>
</html>