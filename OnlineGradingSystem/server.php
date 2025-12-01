<?php
	
	include "dbconnect.php";

// initialize variables
	//$uid = ""; 
	//$username = "";
	//$password = "";
	//$email = "";
	//$password = "";
	//$email = "";
	

	if (isset($_POST['submit'])) {
		//$uid = $_SESSION['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$sem = $_POST['sem'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		
		
		$sql_u = "SELECT * FROM students WHERE Username='$username'";
		$sql_e = "SELECT * FROM students WHERE Email='$email'";
		$res_u = mysqli_query($con, $sql_u);
		$res_e = mysqli_query($con, $sql_e);

		if (mysqli_num_rows($res_u) > 0) {
		  $name_error = "Sorry! Username already taken"; 	
		}else if(mysqli_num_rows($res_e) > 0){
		  $email_error = "Sorry! Email already taken"; 	
		}else{
			   $query = "INSERT INTO students (Name, Semester, Username,  Password, Email, Gender, Contact, Address) 
			   VALUES ('$name', '$sem', '$username', '$password', '$email', '$gender', '$phone', '$address')";

			//    echo $query;
			   $results = mysqli_query($con, $query);
			   ?>
			<script>
				alert('Sign up successful!');
				window.open('login.php','_self');
			</script>
			<?php
			   exit();
		}
	}
?>