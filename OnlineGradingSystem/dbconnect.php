<?php

$con = mysqli_connect('localhost','root','','online_grading_system');

	// Check connection
if (!$con) {
	
    die("Connection failed: " . mysqli_connect_error());
	
	}

	echo "";

?>