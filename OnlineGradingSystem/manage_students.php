<?php
	session_start();
	if(!isset($_SESSION['username']))
		header('Location:login.php');
?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Grading System</title>
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
</style>
</head>

<body>
	
	<div class="wrapper">
		<div class="header">
		  <h2>Online Grading System</h2>
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
				
				<h2>Students</h2>
				
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
							<th>Action</th>
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
                            <td><!--<a href="admin_view.php?edit=<?php echo $detail['Name']; ?>" class="edit_btn" >Details</a>-->
			                <a href="query.php?del=<?php echo $detail['Name']; ?>" class="del_btn" >Delete</a></td>
						</tr>
					<?php } ?>
				</table>
				
			  </div>
		</div>
	</div>
	
	<div class="footer">
  <h2>Copyright  "Mandakranta Dhar,Moumita Majumder,Angita Das,Suravi Saha"</h2>
</div>
	</div>
</html>
</body>