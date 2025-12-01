<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Grading System</title>
	<link rel="stylesheet" href="css/mystyle.css">
<style>
	.row{
		padding: 100px 120px;
		width: 80%;
		align: center;
	}
	.card{
		padding: 25px;
		margin: auto;
	}
	.topnav {
    overflow: hidden;
    background-color: #2F4F4F;
	position: absolute;
    top: 0;
    width: 100%;
}
    th, td {
        text-align: center;
        padding: 8px;
		border-left: 1px solid rgba(34,36,38,.1);
		color: rgba(0,0,0,.87);
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
  <div class="card">
		
		<h2 style="font-size: 30px;">Edit Your details <strong><?php echo $_SESSION['name']; ?></strong></h2>
	  
	  <?php if (isset($_SESSION['message'])): ?> 
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
		
		<?php 
		include('dbconnect.php');
		
		if (isset($_SESSION['id'])) {

			$id = $_SESSION['id'];
			$record = mysqli_query($con, "SELECT * FROM faculty WHERE id=$id");

			if (count($record) == 1 ) {
				$n = mysqli_fetch_assoc($record);
					$name = $n['Name'];
					$email = $n['email'];
					$qualification = $n['Qualification'];

					$specialization = $n['specialization'];
		            $designation = $n['Designation'];
					$contact = $n['mobile'];
					
			}
		}?>
	

		<form method="post" action="edit_f_profile.php" >

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			

			<label>Name</label>
			<input type="text" name="username" value="<?php echo $name; ?>">

			<label for="class">Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
			
			<label for="no">Qualification</label>
			<input type="text" id="" name="Qualification" value="<?php echo $qualification; ?>" >
				
			<label for="class">Specialization</label>
			<input type="text" id="" name="Specialization" value="<?php echo $specialization; ?>" >
			
			<label for="class">Designation</label>
			<input type="text" id="" name="designation" value="<?php echo $designation; ?>" >
			
			
			<label for="no">mobile</label>
			<input type="text" id="" name="mobile" value="<?php echo $contact; ?>" >
		 


			<input class="submit" type="submit" name="update" value="submit" />

		</form>
		
    </div>
  
</div>
	 <?php include 'footer.php'?>
		<div>

</body>
</html>
