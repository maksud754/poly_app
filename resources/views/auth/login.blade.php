<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ url('public/css/login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="{{ url('public/assets/psas_logo.png')}}" type="image/x-icon"/>
	<title>PSAS - Login</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">

			<form action="{{ url('login')}}" method="POST">
				<img src="{{ url('public/assets/psas_logo.png')}}" alt="logo" />
                {{ csrf_field() }}
                @include('_message')
				<input type="email" name="email" placeholder="Email" required/>
				<input type="password" name="password" placeholder="Password" required/>
				<span>Forgot password? <a href="{{ url('forgot-password')}}">Reset here</a></span><br/>
				<button style="cursor: pointer;">Log In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>PSAS-Assignment Management System</h1>
					<p>Welcome! to PSAS Assignment Management System</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>