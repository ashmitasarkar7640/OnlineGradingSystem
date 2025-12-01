<?php
	
	include "dbconnect.php";

	if (isset($_POST['submit'])) {
		//$uid = $_SESSION['id'];
		$name = $_POST['nt'];		
		$sql = "SELECT * FROM notification WHERE Notification='$name'";
		$res = mysqli_query($con, $sql);

		if (mysqli_num_rows($res) > 0) {
		  $name_error = "Sorry! notification already taken"; 	
		}else{
			   $query = "INSERT INTO notification (Id, Notification) 
			   VALUES ('', '$name')";

			//    echo $query;
			   $results = mysqli_query($con, $query);
			   ?>
			<script>
				alert('Notification Submitted Successfully!');
				window.open('student_nt.php','_self');
			</script>
			<?php
			   exit();
		}
	}
?>