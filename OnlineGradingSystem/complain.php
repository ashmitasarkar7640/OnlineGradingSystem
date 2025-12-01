<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('Location:login.php');
?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Result & Grading Management System</title>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>

<body>
	
	<div class="wrapper">
		<div class="header">
		  <h2>Online Result & Grading Management System</h2>
		</div>

		<div class="topnav">
			<a href="user_index.php">Home</a>
			<a href="user_profile.php" >Profile</a>
            <a href="check_grade.php" >Check grade</a>
			<a href="complain.php" >Query</a>
			<a href="logout.php" style="float:right">Log out</a>
                                             
		</div>
		
<form method="post" action="reg_comp.php">
<center><u><h1>Register your Complain</h1></u></center><br>
<form  action="g_query.php" method="post">

				<label>Subject :</label>
            	<select name="sub" class="form-control" required>
					<option>Select</option>
					<option>CA</option>
					<option>OOP</option>
					<option>JAVA</option>
					<option>OS</option>
					<option>DBMS</option>
					    
				</select>

<textarea name="name" rows="1" cols="40" id="text" style="font-family:sans-serif;font-size:1.2em;" placeholder="Type your name here">
</textarea></center>
<textarea name="complain" rows="5" cols="50" id="text" style="font-family:sans-serif;font-size:1.2em;" placeholder="Type your complain here">
</textarea></center>
<p align="center"><input  class="button" type="submit" name="submit" value="submit"><br></p>

</form>

</fieldset>
		 <?php include 'footer.php'?>
	</div>
</body>
</html>