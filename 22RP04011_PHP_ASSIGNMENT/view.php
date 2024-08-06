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

</body>
</html>



<?php

include 'connection.php';

echo "<style> table{ width:180vh;
	background-color:silver;

}

h2{
	justify-content:center;
	text-align:center;
	color:sienna;
	text-transform:capitalize;
}

.aa{
	color: red;
}

th{
	color : blue;
}
 tr:nth-child(even){
 	background-color:#f2f2f2;
 }


</style>";

$select=mysqli_query($connect,"SELECT * FROM student");

echo "<br><br><br><h2>View all student information</h2><br>";
echo "<table border='1'><tr><th>Identification</th><th>First Name</th><th>Las Name</th><th>Registration Number</th><th>District</th><th>Level</th><th>Department</th><th>Age</th><th>Gender</th><th>Email</th></tr>";

if (mysqli_num_rows($select)>0) {


while ($fecth=mysqli_fetch_array($select)) {
	
	echo "<tr><td>".$fecth['0']."</td>";
	echo "<td>".$fecth['1']."</td>";
	echo "<td>".$fecth['2']."</td>";
	echo "<td>".$fecth['3']."</td>";
	echo "<td>".$fecth['4']."</td>";
	echo "<td>".$fecth['5']."</td>";
	echo "<td>".$fecth['6']."</td>";
	echo "<td>".$fecth['7']."</td>";
	echo "<td>".$fecth['8']."</td>";
	echo "<td>".$fecth['9']."</td>";

	 

	echo "</tr>";
}
}

else {

	echo "<tr><td colspan='9' align='center' class='aa'>No students Found!!</td></tr>";
}

echo "</table><br><br>";

echo "<a href='home.php'>back </a>";


?>