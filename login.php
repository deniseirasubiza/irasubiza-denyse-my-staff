<?php
$connection = new mysqli("localhost","root","mytest");
if ($connection->connect_error){
	die("connection failed:".$connection->connect_error);
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$email=$_post['email'];
	$password=$_post['password'];
	$sql="SELECT *from USER WHERE email='$email'";
	$result=$connection->query($sql);

	if ($result->num_rows==1){
		$row=$result->fetch_assoc();

		if (password_verify($password,$row['password'])){
			$_SESSION['user_id']=$row['id'];
			header('location:landing.php');
			exit();

		}else{
			echo"Invalid email or password";
		}
	}else{
		echo"user not found";
	}
}
$connectionn->close()
?>