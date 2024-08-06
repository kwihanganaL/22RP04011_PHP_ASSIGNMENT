<?php

include 'connection.php';

if (isset($_POST['update'])) {

	$student_id=mysqli_real_escape_string($connect,$_POST['student_id']);
	$firstname=mysqli_real_escape_string($connect,$_POST['firstname']);
	$lastname=mysqli_real_escape_string($connect,$_POST['lastname']);
	$reg_number=mysqli_real_escape_string($connect,$_POST['reg_number']);
	$district=mysqli_real_escape_string($connect,$_POST['district']);
	$level=mysqli_real_escape_string($connect,$_POST['level']);
	$department=mysqli_real_escape_string($connect,$_POST['department']);
	$age=mysqli_real_escape_string($connect,$_POST['age']);
	$gender=mysqli_real_escape_string($connect,$_POST['gender']);
	$email=mysqli_real_escape_string($connect,$_POST['email']);

	$update=mysqli_query($connect,"UPDATE student SET firstname='$firstname',lastname='$lastname',reg_number='$reg_number',district='$district',level='$level',department='$department',age='$age',gender='$gender' ,email='$email' WHERE student_id='$student_id'");

	if ($update) {

		header("location:view.php");
		
		//echo "<script>alert('Student Record Are updated well');</script>";
	}

	else
	{
		echo "<script>alert('Student Record Are not updated well');</script>";
	}

}


?>