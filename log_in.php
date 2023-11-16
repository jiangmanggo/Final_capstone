<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<link href="css/log_in.css" rel="stylesheet">
		<title>BCAAOMS</title>
	</head>
    <body>
		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="image/agri.png" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="log">
						<h5><b>LOGIN TO YOUR ACCOUNT<b></h5>
					</div>
                	<div class="form">
						<div class="d-flex justify-content-center form_container">
						<form action="logic/login.php" method="post">
							<!-- Username input field -->
							<div class="input-group mb-3">
								<input type="text" name="username" class="form-control input_user" placeholder="Username" required autocomplete="username">
							</div>
							
							<!-- Password input field -->
							<div class="input-group mb-2">
								<input type="password" name="password" class="form-control input_pass" placeholder="Password" required autocomplete="current-password">
							</div>

							<!-- Login button -->
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="submit" value="submit" class="btn login_btn"><b>LOG IN</b></button>
							</div>
						</form>

						</div>             
						<div class="text-center">
							<p>Don't have an account? <a href="register.php">Register</a></p>
						</div>
                    </div>
				</div>
			</div>
		</div>
   	</body>
</html> 