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
		
	.leftcolumn{
			width: auto;
		}
		.card{
			padding: 20px;
			posission:center;
		
		}
		
	 h2 {
		width: 80%;
    	margin: 30px auto;
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
			<a href="logout.php" style ="float:right">Log out</a>
                                             
		</div>
	
	<div class="row">
		  <div class="leftcolumn">
			<div class="card">
				
				<h2>View Students</h2>
				
				<?php if (isset($_SESSION['message'])): ?>
					<div class="msg">
						<?php 
							echo $_SESSION['message']; 
							unset($_SESSION['message']);
						?>
					</div>
				<?php endif ?>
		
			  <?php
				  	include 'dbconnect.php';
					$sql = "SELECT * FROM students";
					$result = mysqli_query($con, $sql);
				?> 
				<table>
						<tr>
							<th>Student Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Address</th>
						</tr>
					<?php
					while($detail=mysqli_fetch_assoc($result)){
					?>

						<!--echo "<tr>";-->
						<tr>
							<td><?php echo $detail['Name']; ?></td>
							<td><?php echo $detail['Email']; ?></td>
							<td><?php echo $detail['Gender']; ?></td>
							<td><?php echo $detail['Contact']; ?></td>
							<td><?php echo $detail['Address']; ?></td>
							

						</tr>
					<?php } ?>
				</table>
				
			  </div>
		</div>
	</div>
	 <?php include 'footer.php'?>
	</div>
</body>
</html>