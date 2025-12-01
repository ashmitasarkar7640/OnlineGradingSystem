<?php
	
	include "dbconnect.php";
	

	if (isset($_POST['submit'])) 
		
	$complain=($_POST['complain']);
	$name=($_POST['name']);
	$sub=($_POST['sub']);
	
		
			   $query = "INSERT INTO complain (Subject, Complain, Std_name) 
		VALUES ('$sub', '$complain', '$name')";
			   $results = mysqli_query($con, $query);
			   ?>
			<script>
				alert('complain registered!');
				window.open('user_index.php','_self');
			</script>
			<?php
			   exit();
?>