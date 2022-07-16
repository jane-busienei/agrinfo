<?php
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$user_name = $_POST['user_name'];
		$password =  password_hash($_POST['password'], PASSWORD_DEFAULT);

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

			//save to database
			$user_id = random_num(20);
			$query = "insert into users(user_id,user_name,password)
				values(?,?,?);";
			$statement = $con->prepare($query);
			$statement->bind_param("iss", $user_id, $user_name, $password);

			$statement->execute();
			$statement->close();
			header("Location: login.php");
			die;
		}else{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <title>signup</title>
    </head>
    <body>
	
<style>
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
        <nav class="container-fluid navbar nav navbar-dark bg-dark">
            <div class="favicon" style="color: rgb(253, 253, 253);">
                <a href="index.html">
                    <img src="https://www.pngfind.com/pngs/m/61-614102_agriculture-icon-png-transparent-png.png" width=50 height=auto/>AGRINFO
                </a>
            </div>

            <div style="color: wheat;" style="text-align: right;">
                <ul>
				    <li><a href="index.html">Home</a></li>
                    <li><a href="login.php">Login/Signup</a></li>
                    <li><a href="disease_spray.php">Disease Spray Program</a></li>
                    <li><a href="pest_spray.php">Pest Spray Program</a></li>
                    <li><a href="planting_season.php">Planting Season</a></li>
                </ul>
            </div>
        </nav><br><br><br>
	<div id="box" style="text-align: center;color: black">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: green; text-align: center;">Sign up</div>
				<div>
					<label for="email"> User Email</label><br>
					<input type="email" name="user_name" placeholder="Enter your email" required></input><br><br>
				</div>
				<div>
					<label for="password"> Password</label><br>
					<input type="password" name="password" placeholder="Type password" required></input><br><br>
				</div>
				<div>
					<label for="confirm-password"> Confirm Password</label><br>
					<input type="password" name="confirm password" placeholder="Re_type password" required></input><br><br>
				</div>

				<input id="button" type="submit" value="SignUp"><br><br>
			<a href="login.php">Click to Login</a><br><br>
		</form>
		</div>
                <footer class="container-fluid footer" id="footer">
                    <ul>
                        <li><a href="#">Contacts</a></li>
                        <li><a style="color:wheat;"> © 2022 Agricultural Information System, All Rights Reserved.</a></li>
                    </ul>
                </footer>
            </div>
	</div>
</body>
</html>