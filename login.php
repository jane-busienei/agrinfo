<?php

session_start();
	include("connection.php");
	include("functions.php");


	// Text to be displayed highlighting form input errors
	$error_msg = "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				$pwd = $user_data['password'];

				// Checking if the password hash matches the password in the users table
				if( password_verify($password, $pwd)){
					$_SESSION['user_id'] = $user_data['USER_ID'];
					header("Location: planting_season.html");
					die;
				}else{
					$error_msg = "Invalid user_name or password";
				}
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
	<title>Login</title>
</head>
<body>

	<style type="text/css">


	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: green;
		border: none;
		cursor: pointer;
        transition: all .3s ease;
	}
	#button:hover {
    opacity: 0.5;
    }

	#box{

		background-color: white;
		margin: auto;
		width: 400px;
		padding: 5px;
		border: 5px solid green;
	}
    a:hover {
	color: green;
    }


	</style>
        <nav  class="container-fluid navbar nav navbar-dark bg-dark">
		<a href="index.html">
			<div>
                    <img src="https://www.pngfind.com/pngs/m/61-614102_agriculture-icon-png-transparent-png.png" width=50 height=auto/>AGRINFO
                </a>
            </div>

         <div style="color: wheat;" style="text-align: left;">
                <ul>             
                    <li><a href="login.php">Login/Signup</a></li>
                    <li><a href="spray_program.html">Spray program</a></li>
                    <li><a href="planting_season.html">Planting Season</a></li>
                </ul>
			</div>	
            </div>
        </nav>

	<div id="box" style="text-align: center;color: black">
		<form method="post">
				<div style="font-size: 20px;margin: 10px;color: green; text-align: center;">
					Login
				</div>
				<div>
					<label for="email">User Name</label><br>
					<input type="email" name="user_name" placeholder="Enter your email" required></input><br><br>
				</div>
				<div>
					<label for="password"> Password</label><br>
					<input type="password" name="password" placeholder="Type password" required></input><br><br>
				</div>
				<input id="button" type="submit" value="Login"><br><br>

				<label name="error_text" style="color:red;"><br><?php echo $error_msg;?></label><br>

				No account?
				<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
	<div class="container" style="display:inline-flex;float:inline-end;">
    </div>
</body>
</html>

