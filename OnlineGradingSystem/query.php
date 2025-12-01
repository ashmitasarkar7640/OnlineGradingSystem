<?php 
	include 'dbconnect.php';

	// initialize variables
	$q_id = 0;
	$emp = "";
	$update = false;

	if (isset($_POST['update'])) {
		$q_id = $_POST['qid'];
		$emp = $_POST['emp'];
		echo $qid;
		echo $emp;

		mysqli_query($con, "UPDATE faculty SET status = 'Assigned', assigned_date = CURDATE(), e_id = '$emp' WHERE query.q_id=$q_id");
		$_SESSION['message'] = "Assigned!"; 
		header('location: manage_faculty.php');
	}
	
	if (isset($_POST['update1']))
	{
		$q_id = $_POST['qid'];
		$respond = $_POST['respond'];

		mysqli_query($con, "UPDATE faculty SET status = 'Working', respond = '$respond' WHERE query.q_id=$q_id");
		$_SESSION['message'] = "Done!"; 
		header('location: emp_viewquery.php');
	}
	
	if (isset($_GET['del'])) {
		$user = $_GET['del'];
		echo $user;
		mysqli_query($con, "DELETE FROM students WHERE Name = '$user' ");
		 ?>
			<script>
				alert('student Details Deleted');
				window.open(' manage_students.php','_self');
			</script>
		<?php
	}
?>