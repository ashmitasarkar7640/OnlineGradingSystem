<?php
include ('dbconnect.php');

	$did=$_GET['Id'];
	$status=$_GET['status'];
	$q=" update students set Status=$status where Id=$did";
	mysqli_query($con,$q);
	header ('location:view_students.php');
?>