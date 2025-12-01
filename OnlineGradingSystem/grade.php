<?php
session_start();

?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Online Result & Grading Management System</title>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<style>
		.row{
		padding: 10px 120px;
	}
	.card{
		padding: 25px;
		margin: auto;
	}
		.reveal {
			color: green;
			background-color: white;
			padding: 25px;
		}
		
		.myform {
			text-align: center;
			top: 5%;
			width: 60%;
			font-family: Bookman Old Style;
			color: green;
		}
		h1{
			padding-left: 100px;
		}
	</style>
</head>

<body>

	<div class="wrapper">
		<div class="header">
			<h2>Online Result & Grading Management System</h2>
		</div>

		<div class="topnav">
			<a href="faculty_index.php">Home</a>
			<a href="faculty_profile.php">Profile</a>
			<a href="view_student_faculty.php">View student</a>
			<a href="grade.php">Grade generation</a>
			<a href="grade_view.php">View Grade</a>
			<a href="logout.php" style="float:right">Log out</a>

		</div>

		<div class="row">
  <div class="card">
	  
	  <h2 style="font-size: 30px;">Generate Grade</h2>
		
			<form class="gsystem" action="g_query.php" method="post">

				<label>Semester :</label>
            	<select name="sem" class="form-control" required>
					<option>Select</option>
					<option>1st</option>
					<option>2nd</option>
					<option>3rd</option>
					<option>4th</option>
					<option>5th</option>
					<option>6th</option>
					    
				</select>

				<input class="button" type="submit" name="submit" value="search"><br>
			</form>
			
			</div>
			</div>
	</div>
	 <?php include 'footer.php'?>
	</div>
</body>
</html>