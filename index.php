<?php
	require('config.php');
	session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {

		// username and password sent from form 
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT users.name, login.password from login 
			inner join users on users.id = login.id 
			where login.username='$myusername';";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_row($result);
		
		// compare hash code with given password
		$verify = password_verify($mypassword,$row[1]);

		if ($verify) {
			$login = "update login set last_login=now() where username='$myusername'";
			$db->query($login);
			
			$_SESSION['Name'] = $row[0];

			header("Location:table.php");
		} else {
			$error = "Wrong Name or Password";
		}
    }
?>
<html lang="en">
	<head> 
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">

	<!-- Website CSS style -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	<title>Login</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Login</h1>
	               		<hr />
	               	</div>
				</div> 
				<div class="error"><?php echo $error; ?></div>
                <div class="main-login main-center">
					<form class="form-horizontal" method="post" action="">

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Login" />
						</div>
						<div class="login-register">
				            <a href="register.php">Register</a>
				         </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
