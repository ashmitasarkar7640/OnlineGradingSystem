<?php 
	session_start();
	include('dbconnect.php');


	if (isset($_POST['update'])) {
		$id = $_SESSION['id'];
		$name = $_POST['username'];
		$email = $_POST['email'];
		$qualification = $_POST['Qualification'];
		$specialization = $_POST['Specialization'];
		$designation = $_POST['designation'];
		//$gender = $n['gender'];
		$mobile = $_POST['mobile'];
		//$address = $_POST['address'];

		//echo $id;
		//echo $cno;
		
			mysqli_query($con, "UPDATE faculty SET Name='$name', Designation='$designation', Qualification='$qualification', specialization='$specialization', email='$email', mobile='$mobile' WHERE id=$id");
		
			$_SESSION['message'] = "Profile updated";
			header('location: faculty_profile.php');
		
		
	}
	
?>
		