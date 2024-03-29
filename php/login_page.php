<?php
	
	session_start();
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
    
	<head>
		<title>Instamood Login</title>
		<link rel="stylesheet" href="/assets/css/style_login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="/assets/images/logo_small_icon_only.png" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" id="username" class="form-control input_user" value="" placeholder="username">
							</div>
							<div class="input-group mb-2">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" id="password" class="form-control input_pass" value="" placeholder="password">
							</div>
							<div class="form-group">

							</div>
								<div id='wrong_credentials'></div>
								<div class="d-flex justify-content-center mt-3 login_container">
					 	<button type="button" name="button" id="login" class="btn login_btn">Login</button>
					   </div>
						</form>
						
					</div>

			
					<div class="mt-4">
						<div class="d-flex justify-content-center links">
							Non hai un account? <a href="register.php" class="ml-2">Registrati!</a>
						</div>
						<div class="d-flex justify-content-center links">
							<a href="#">Hai dimenticato la password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- LOGIN BUTTON LOGIC-->
		<script>
			$(function(){
				$('#login').click(function(e){
					
					var valid = this.form.checkValidity();
					if(valid){
						var username = $('#username').val();
						var password = $('#password').val();
					}

					e.preventDefault();  

					$.ajax({
						type: 'POST',
						url: 'login_logic.php',
						data: {username: username, password:password},
						success : function(data){
							if($.trim(data) === "SUCCESS"){
								setTimeout(' window.location.href = "/index.php"', 2000)
							}
							else{
								document.getElementById('wrong_credentials').innerHTML = 'Credenziali errate!';								
							}
						},
						error: function(data) {
							alert('error');
						}


					});
				});
			
			});
		</script>


	</body>
</html>

