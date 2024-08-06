<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	<style type="text/css">
		.container{
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 300px;
		}

		body{
			font-family: arial,sans-serif;
			background-color: #f4f4f9;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
		}

		h2{
			text-align: center;
			color: #333;

		}


		input[type="text"],input[type="password"],input[type="email"],input[type="number"]{
			width: 100%;
			padding: 10px;
			margin: 10px 0;
			border: 1px solid #ccc;
			border-radius: 4px;
		}


		input[type="submit"]{

			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 4px;
			background-color: #123456;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		input[type="submit"]: hover {
			background-color: #4cae4c;

		}

		.message{
			text-align: center;
			margin-top: 20px;
		}

	</style>
</head>
<body>

	
<div class="container">
	<h2>Login Form</h2>
	<form method="POST">

		<div>
			<i class="fa fa-envelope"></i>
			Email : <input type="email" name="email" required>
		</div>

		<div>
			<i class="fa fa-lock"></i>
			Password : <input type="password" name="password" required>
		</div>

		<input type="submit" name="login" value="Sign In"><br><br>

		If You Don't Have An Account?<a href="register.php">Register Here</a>


<?php
session_start();

include 'connection.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $password = md5($password); // Ensure you hash the password

    $select = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($select) > 0) {
        $_SESSION['email'] = $email;
        setcookie("username", $email, time() + (86400 * 30), "/"); // 86400 = 1 day

        // Redirect to home page
        header("Location: home.php");
        exit();
    } else {
        echo "<div class='message'>Invalid email or password. Please try again.</div>";
    }
}
?>

</div>
</form>
</body>
</html>