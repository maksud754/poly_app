<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ url('public/css/login.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="{{ url('public/assets/psas_logo.png')}}" type="image/x-icon"/>
	<title>PSAS - Reset Password</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">

			<form action="" method="POST">
				<img src="{{ url('public/assets/psas_logo.png')}}" alt="logo" />
                {{ csrf_field() }}
                @include('_message')
				<input type="password" name="password" placeholder="Enter new password" required/>
				<input type="password" name="cpassword" placeholder="Confirm password" required/>
                <button style="cursor: pointer;">Reset</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Reset Password</h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>