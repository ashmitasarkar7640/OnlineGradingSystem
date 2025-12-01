<!--<?php include('server.php') ?>-->
<!DOCTYPE html>
<html>
<head>
	<title>Online Grading System</title>
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
* {
    box-sizing: border-box;
}
h3{
	color:blue;
font-family:Calisto MT;}
h4{
color:red;}
body {
    font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
    padding: 10px;
    background: #708090;
	margin: 0;
}
.wrapper{
	width:100%;
	background:#eee;
	margin:0 auto;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #2F4F4F;
	position: fixed;
    top: 0;
    width: 100%;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: indigo;
}

/* Header/Blog Title */
.header {
	margin-top: 20px;
    padding: 20px;
    text-align: center;
	color:#2F4F4F;
    background-color: white;
}

.header h1 {
    font-size: 70px;
}
/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
		
    margin: auto;
    width: 50%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    background-color: #f1f1f1;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}
	.dropdown-content {
    display: none;
    position: absolute;
    background-color: red;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
	}
	.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a card effect for articles */
.card {
    background-color: burlywood;
    padding: 70px;
    margin-top: 30px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #333;
	color:#fff;
    margin-top: 70px;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #648fd3; 
    background: gray; 
    border: 1px solid #648fd3;
    width: 50%;
    text-align: center;
}

input[type=text],[type=password],[type=email],[type=number], select,textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 3px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
}
	input[type=submit] {
    width: 100%;
    background-color: #2F4F4F;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: 3px solid #ccc;
    border-radius: 8px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: dimgrey;
	color:white;
}
table {
        border: 1px solid rgba(34,36,38,.15);
		border-radius: .28571429rem;
		border-collapse: separate;
		border-spacing: 0;
        width: 70%;
        margin: auto ;
    }

    th, td {
        text-align: center;
        padding: 15px;
		border-left: 1px solid rgba(34,36,38,.1);
		color: rgba(0,0,0,.87);
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #f9fafb;
        color: black;
		border-bottom: 1px solid rgba(34,36,38,.1);
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
<?php
error_reporting(1);
	include('dbconnect.php');
	extract($_POST);
	if(isset($save))
	{	
		if(strlen($mobile)<10 || strlen($mobile)>10)
		{
		$err="<font color='red'>Mobile number must be 10 digit</font>";
		}
		else
		{
		
$q=mysqli_query($con,"select * from faculty where email='$email'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='white'>This email already exists choose diff email.</font>";
	}
	else
	{	
		mysqli_query($con,"insert into faculty values('','$name','$username','$Designation','$Qualification','$Specialization','$email','$pass', '$gender', '$mobile')");
		
	$subject ="New User Account Creation";
	$message ="User name: ".$user_name." Password ".$pass;
    $headers = "From:".$from;
    mail($email,$subject,$message,$headers);
		
	$err="<font color='red'>New Faculty Successfully Added.</font>";
	}
	}
}	

?>


<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
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
        	<label>Qualification:</label>
            	<input type="text" value="<?php echo @$Qualification;?>"  name="Qualification" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Designation:</label>
            	<input type="text" value="<?php echo @$Designation;?>" name="Designation" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Specialization:</label>
				<select name="Specialization" class="form-control" required>
					
					<option>JAVA</option>
					<option>CA</option>
					<option>OOP</option>
					<option>DBMS</option>
					<option>OS</option>
				</select>
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
  </div>
	 <?php include 'footer.php'?>

</body>
</html>
