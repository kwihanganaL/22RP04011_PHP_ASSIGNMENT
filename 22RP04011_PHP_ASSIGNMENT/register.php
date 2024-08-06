<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration form</title>
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
	<h2>Registration Form</h2>
	<form method="POST">
		<div>
			<i class="fa fa-user"></i>
			First Name : <input type="text" name="firstname">
		</div>

		<div>
			<i class="fa fa-user"></i>
			Last Name : <input type="text" name="lastname">
		</div>

		<div>
			<i class="fa fa-user"></i>
			Username : <input type="text" name="username">
		</div>

		<div>
			<i class="fa fa-envelope"></i>
			Email : <input type="email" name="email">
		</div>

		<div>
			<i class="fa fa-phone"></i>
			Telephone Number : <input type="number" name="telephone">
		</div>

		<div>
			<i class="fa fa-lock"></i>
			Password : <input type="password" name="password" min="8" max="16">
		</div>

		<div>
			<i class="fa fa-lock"></i>
			Confirm Password : <input type="password" name="c_password"  min="8" max="16">
		</div>

		<input type="submit" name="register" value="Sign up"><br><br>

		Already Have An Account?<a href="login.php">Login Here</a>


<?php

include 'connection.php';

	 if (isset($_POST['register'])) {
        $firstname = mysqli_real_escape_string($connect,trim($_POST['firstname']));
        $lastname = mysqli_real_escape_string($connect,trim($_POST['lastname']));
        $username = mysqli_real_escape_string($connect,trim($_POST['username']));
        $email = mysqli_real_escape_string($connect,trim($_POST['email']));
        $telephone = mysqli_real_escape_string($connect, trim($_POST['telephone']));
        $password = mysqli_real_escape_string($connect,trim($_POST['password']));
        $c_password = mysqli_real_escape_string($connect,trim($_POST['c_password']));

        $errors = [];

        if (empty($firstname) || !preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            $errors[] = "First name must not be empty and must contain only letters and white space.";
        }

        if (empty($lastname) || !preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $errors[] = "Last name must not be empty and must contain only letters and white space.";
        }

        if (empty($username)) {
            $errors[] = "Username is required.";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required.";
        }

        if (empty($telephone) || !preg_match("/^[0-9]{10}$/", $telephone)) {
            $errors[] = "Telephone number is required and must be 10 digits.";
        }

        if (empty($password) || strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "Password is required and must be between 8 and 16 characters.";
        }

        if ($password !== $c_password) {
            $errors[] = "Password and confirm password do not match.";
        }

        if (empty($errors)) {
            $password = md5($password);
            $select = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");

            if (mysqli_num_rows($select) == 0) {
                $insert = mysqli_query($connect, "INSERT INTO user (firstname, lastname, username, email, telephone, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$telephone', '$password')");

                if ($insert) {
                    echo "<script>alert('Account is created successfully');</script>";
                } else {
                    echo "<script>alert('Failed to create an account, try again later!!');</script>";
                }
            } else {
                echo "<script>alert('Account already exists');</script>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<div style='color: red;'>$error</div>";
            }
        }
    }
    ?>
</div>
</form>
</body>
</html>