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
	<style>
	
	.leftcolumn{
			width: auto;
		}
		.card{
			padding: 40px;
		}
		
	 h2 {
		width: 80%;
    	margin: 30px auto;
}
		
	table {
		border-collapse: collapse;
		width: 80%;
		margin: auto ;
	}

	th, td {
		text-align: center;
		padding: 15px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
		background-color: #333;
		color: white;
	}
	button {
 color: #090909;
 padding: 0.7em 1.7em;
 font-size: 18px;
 border-radius: 0.5em;
 background: #e8e8e8;
 border: 1px solid #e8e8e8;
 transition: all .3s;
 box-shadow: 6px 6px 12px #c5c5c5,
             -6px -6px 12px #ffffff;
}

button:hover {
 border: 1px solid white;
}

button:active {
 box-shadow: 4px 4px 12px #c5c5c5,
             -4px -4px 12px #ffffff;
}
</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
		  <h2>Online Result & Grading Management System</h2>
		</div>
		<div class="topnav">
			<a href="index.php">Home</a>
			<a href="view_students.php">View Students</a>
			<a href="view_employee.php">View Faculty</a>
			<a href="manage_students.php">Manage Students</a>
			<a href="manage_faculty.php">Manage Faculty</a>
			<a href="fac_reg.php">Add Faculty</a>
			<a href="logout.php" style="float:right">Log out</a>
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
							<th>Student ID</th>
							<th>Student Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Status</th>
						</tr>
					<?php
					while($detail=mysqli_fetch_assoc($result)){
					?>

						<!--echo "<tr>";-->
						<tr>
						    <td><?php echo $detail['Id']; ?></td>
							<td><?php echo $detail['Name']; ?></td>
							<td><?php echo $detail['Email']; ?></td>
							<td><?php echo $detail['Gender']; ?></td>
							<td><?php echo $detail['Contact']; ?></td>
							<td><?php echo $detail['Address']; ?></td>
							<td>
							<?php 
							if($detail['Status']==1){
								echo'<a href="status.php?Id='.$detail['Id'].'&status=0">Active</a>';
							}else{
								echo'<a href="status.php?Id='.$detail['Id'].'&status=1">Deactive</a>';
							}
							?>
							</td>
							

						</tr>
					<?php } ?>
				</table>
				
			  </div>
		</div>
	</div>
		 <?php include 'footer.php'?>
</div>
	</div>
</body>
</html>