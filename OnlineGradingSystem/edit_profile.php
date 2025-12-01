<?php 
	session_start();
	include('dbconnect.php');


	if (isset($_POST['update'])) {
		$id = $_SESSION['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];

		//echo $id;
		//echo $cno;
		
			mysqli_query($con, "UPDATE students SET Name='$name', Username='$username', Email='$email', Gender='$gender', Contact='$contact', address='$address' WHERE id=$id");
		
			$_SESSION['message'] = "Profile updated";
			header('location: user_profile.php');
		
		
	}
	
?>
		