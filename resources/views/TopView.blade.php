<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>TagMane</title>
</head>
<body>
    <h1>TagMane</h1>
    <hr>

    <div class="login">
	<h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    </div>
    <div class="register">
    <button class="btn btn-primary btn-block btn-large"  onclick=location.href="{{ route('register') }}">Register</button>
    </div>
    
   
</body>
</html>