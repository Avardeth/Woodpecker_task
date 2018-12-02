<!-- https://bootsnipp.com/snippets/featured/register-page -->
<html lang="en">
    <head> 

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" href="style.css">
 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'> 

		<title>Register</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Register</h1>
	               		<hr />
	               	</div>
                </div> 
                
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" onsubmit="return submitTest()" action="insert.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

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

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value='Register' />
						</div>
						<div class="login-register">
				            <a href="index.php">Login</a>
                         </div>
                         
					</form>
				</div>
			</div>
		</div>

		<!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script> -->
    <script>
		
        const myname = document.getElementById('name');
        const myemail = document.getElementById('email');
        const myusername = document.getElementById('username');
        const mypassword = document.getElementById('password');
        const myconfirm = document.getElementById('confirm');
        //const button = document.getElementById('submit');


        const submitTest = () => {
			
			const array = [
				myname.value,
				myemail.value,
				myusername.value,
				mypassword.value,
				myconfirm.value
			]
			
			//checking if any of the field is empty 
			let isFilled = (arr) => arr.reduce((acc=true, curr, i) => {
				if (arr[i]) {
					curr = true;
				} else {
					curr = false;
				}
				return (arr && curr);
			})

			//return true of false
			isFilled = isFilled(array);

			//checking the passwords
			let passCheck = () => {
				if (mypassword.value && myconfirm.value 
					&& mypassword.value === myconfirm.value) {
						return true;
					} else {
						return false;
					}
			}

			//return true of false
			passCheck = passCheck();
				
			if (isFilled && passCheck) {
				
				return true;
			} else if (isFilled && !passCheck) {
				alert('Passwords do not match');
				return false;
			} else {
				alert('Please fill out every field');
				return false;
			}
        }
		

    </script>
    </body>
</html>