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
		<style>
			.text-center{
				margin-top: 15px;
				font-size: 12px;
			}
			@media only screen and (min-width: 320px){
				.container{
					padding-right: 30px;

				}
			}
			body,
			html {
				margin: 0;
				padding: 0;
				height: 100%;
				background-image: linear-gradient(to bottom right, #f2f3f4, #74c69d);
				background-attachment: fixed;
			}
			.user_card {
				height: 400px;
				width: 420px;
				margin-top: auto;
				margin-bottom: auto;
				background: #fff;
				position: relative;
				display: flex;
				justify-content: center;
				flex-direction: column;
				padding: 10px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				border-radius: 5px;
			}
			.brand_logo_container {
				position: absolute;
				height: 150px;
				width: 160px;
				top: -75px;
				border-radius: 50%;
				background: linear-gradient(to bottom right, #f2f3f4, #74c69d);
				padding: 10px;
				text-align: center;
			}
			.brand_logo {
				height: 135px;
				width: 150px;
			}
			.login_btn {
				width: 90%;
				background: #73a16c !important;
				color: white !important;
			}
			.login_btn:focus {
				box-shadow: none !important;
				outline: 0px !important;
			}
			.login_container {
				padding: 0 2rem;
			}
			.input-group-text {
				background: #307d7e !important;
				color: white !important;
				border: 0 !important;
				border-radius: 0.25rem 0 0 0.25rem !important;
			}
			.input_user,
			.input_pass {
				box-shadow: none !important;
				outline: 0px !important;
				border: 0.1em solid #3c565b; 
				border-radius: 0.3em;  
				outline: 0.5em;
			}
			.log{
				margin-top: 60px;
				margin-left: 75px;
			}
			.form{
				margin-top: 30px;
			}
		</style>
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
							<p><a href="#">Forgot Password</a></p>
						</div>
                    </div>
				</div>
			</div>
		</div>
   	</body>
</html> 