<?php include "dbconnect.php";
	session_start();
	if(!isset($_SESSION['username']))
		header('Location:login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Result & Grading Management System</title>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<style>
	.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
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

<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:5px;">
	<form action="server1.php" method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$name;?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Username:</label>
            	<input type="text" value="<?php echo @$username;?>" name="username" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email :</label>
            	<input type="email" value="<?php echo @$email;?>"  name="email" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password" value="<?php echo @$pass;?>"  name="pass" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Gender :</label>
            	<select name="gender" class="form-control" required>
					<option>Select</option>
					<option>Male</option>
					<option>Female</option>
					<option>Others</option>
					    
				</select>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Qualification:</label>
            	<input type="text" value="<?php echo @$Qualification;?>"  name="qualification" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Designation:</label>
            	<input type="text" value="<?php echo @$Designation;?>" name="designation" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Specialization:</label>
            	<input type="text" value="<?php echo @$Specialization;?>" name="specialization" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Semester</label>
			<input type="text" value="<?php echo @$sem;?>" name="sem" class="form-control" required placeholder="for eg. 1st,2nd,3rd">
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$mob;?>" class="form-control" maxlength="10" name="mobile"  required>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>


</div>
    </div>
    
  </div>
  
<div class="footer"><h2>Copyright  "Ankita Sarkar, Ashmita Sarkar, Riya Das, Meghla Paul, Maithili Saha, Praghya Roy @2022"</h2></div>
	</div>
</body>
</html>
