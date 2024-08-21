<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ url('public/css/login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="{{ url('public/assets/psas_logo.png')}}" type="image/x-icon"/>
	<title>PSAS - Forgot Password</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">

			<form action="" method="POST">
				<img src="{{ url('public/assets/psas_logo.png')}}" alt="logo" />
                {{ csrf_field() }}
                @include('_message')
				<input type="email" name="email" placeholder="Email" required/>
				<button style="cursor: pointer;">Request Reset</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Please Enter you email to reset your password</h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>