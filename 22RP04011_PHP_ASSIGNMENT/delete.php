  <?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Management Information System</title>
    
    <style>
*{
	padding: 0;
	margin: 0;
}
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            background-attachment: fixed;
        }

        ol {
            list-style: none;
            display: flex;
                        background-color: #004d40;
            padding: 10px 0;
            margin: 0;
        }

        ol li {
            position: relative;
            margin: 0 20px;
            font-size: 18px;
            font-weight: bold;
        }

        ol li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        ol li a:hover {
            color: #ffeb3b;
            text-decoration: underline;
        }

        footer {
            text-align: center;
            background-color: #00251a;
            color: #fff;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer h3 {
            margin: 0;
        }

        ol li ul {
            list-style: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #004d40;
            padding: 0;
            margin: 0;
            display: none;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        ol li:hover ul {
            display: block;
        }

        ol li ul li {
            padding: 10px;
            font-size: 16px;
            color: #fff;
        }

        ol li ul li a {
            color: #fff;
            text-decoration: none;
        }

        ol li ul li a:hover {
            color: #ffeb3b;
            background-color: #00796b;
        }

       .logout{

       	position: relative;
       	left: 95vh;
       }

h1{
	text-align: center;
	justify-content: center;
	color: #350035;
	background-color: skyblue;
	height: 10vh;
	font-family: elephant;
	letter-spacing: 3px;
	word-spacing: 5px;
}

    </style>
</head>
<body>
<h1>Student Management Information System</h1>

<ol>
    <li><a href="home.php">Home</a></li>
   
            <li><a href="insert.php">Add Info</a></li>
            <li><a href="view.php">View Info</a></li>
            <li><a href="delete.php">Delete Info</a></li>
            <li><a href="update.php">Update Info</a></li>
  
    <li class="logout"><a href="logout.php">Logout</a></li>
</ol>

<footer>
    <h3>All rights reserved IGIHOZO Patience &copy; 2010</h3>
    <p> kwihanganalullaby@gmail.com</p>
</footer>
<br><br><br>
<center>
	<form method="POST">
		<h2>Delete student information</h2><br>
		
		<table border="1">
			<tr>
				<td>Identification</td><td><input type="text" name="student_id"></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" name="delete" value="delete data"></td>
			</tr>
		</table>

	</form></center>

	<?php

include 'connection.php';
if (isset($_POST['delete'])) {
	
$student_id=mysqli_real_escape_string($connect,$_POST['student_id']);

$select=mysqli_query($connect,"SELECT * FROM student WHERE student_id='$student_id'");

if (mysqli_num_rows($select)>0) {
	
	$delete=mysqli_query($connect,"DELETE FROM student WHERE student_id='$student_id'");

	if ($delete) {
		
		//echo "<script>alert('Student Record Are deleted well');</script>";
		header("location:view.php");
	}

	else
	{
		echo "<script>alert('Student Record Are not deleted well');</script>";
	}
}

else 
{
echo "<script>alert('No Student who have this id found in database');</script>";	
}
}
echo "<a href='home.php'>back </a>";	

	?>

</body>
</html>