<!DOCTYPE html>
<html>

<head>
	<title>OrgSphere</title>
	<script src="https://kit.fontawesome.com/fc5ceca38c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style_login.css">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">

</head>

<body>
	<img src="images/icon-1x1.png" alt="Logo" class="logo">
	<!-- <h3 class="os">OrgSphere</h3> -->

	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form class="form-sign-up" action="php/registration_login.php" method="POST" autocomplete="off">
				<h1>Create Account</h1>
				<br>
				<input type="text" placeholder="Given Name" name="txt_reg_Fname" required>
				<input type="text" placeholder="Middle Name" name="txt_reg_Mname" required>
				<input type="text" placeholder="Last Name" name="txt_reg_Lname" required>
				<input type="text" placeholder="Student ID" name="txt_reg_studID" required>
				<input type="email" placeholder="School Email" name="txt_reg_email" required>
				<input type="password" placeholder="Password" name="txt_reg_pword" required>
				<button class="sign-up" type="submit" name="sign_up">Sign Up</button>
				<?php
							if (isset($error_message)) {
								echo '<p style="color: red;">' . $error_message . '</p>';
							}
						?>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form class="form-sign-in" action="php/registration_login.php" method="POST">
				<h1>Sign in</h1>
				<br>
				<input type="email" placeholder="School Email" Name="txt_email" required>
				<input type="password" placeholder="Password" Name="txt_pword" required>
				<a href="#">Forgot your password?</a>
				<button class="sign-in" type="submit" name="sign_in">Sign In</button>
				<?php
							if (isset($error_message)) {
								echo '<p style="color: red;">' . $error_message . '</p>';
							}
						?>

			</form>

		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1 class="wb">Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<p>Already have an account?</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1 class="hf">Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<p>Don't have an account?</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script src="js/script.js"></script>

</body>

</html>