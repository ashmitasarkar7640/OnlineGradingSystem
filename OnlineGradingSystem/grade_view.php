<?php
	session_start();
	
?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Grading System</title>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">

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
	
  <div align="center">
      <h1>Student's results</h1>
      <table >
        <tr>
                <th>Student</th>
				<th>Semester</th>
				<th>OS</th>
				<th>CA</th>
				<th>OOP</th>
				<th>JAVA</th>
				<th>DBMS</th>
				<th>Total(%)</th>
				<th>Grade</th>
				<th>remarks</th>
        </tr>
      <?php
	  include 'dbconnect.php';
      $sql2 = "SELECT * FROM grade ";
      $result = $con->query($sql2);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

          $total = $row[ "OS" ] + $row[ "CA" ] + $row[ "OOP" ] + $row[ "JAVA" ] + $row[ "DBMS" ];
          $avg = ($total * 100) / 500;
          $grade = getGrade($avg);

          echo "<tr><td>" . $row[ "Name" ] . "</td><td>" . $row[ "Semester" ] . "</td><td>" . $row[ "OS" ] . "</td><td>" . $row[ "CA" ] . "</td><td>" . $row[ "OOP" ] . "</td><td>" . $row[ "JAVA" ] . "</td><td>" . $row[ "DBMS" ] . "</td><td>" . $total . "</td><td>" . $grade . "</td><td>" . $row[ "Remarks" ] . "</td></tr>";
      }
    }else{
        echo "No data to display";
      }


      function getGrade($value)
                    {
                        if ($value >= 95 && $value <= 100) {
                            $grade = 'O';
                        } elseif ($value >= 90 && $value < 95) {
                            $grade = 'A+';
                        } elseif ($value >= 80 && $value < 90) {
                            $grade = 'A';
                        } elseif ($value >= 70 && $value < 80) {
                            $grade = 'B+';
                        } elseif ($value >= 60 && $value < 70) {
                            $grade = 'B';
                        } elseif ($value >= 50 && $value < 60) {
                            $grade = 'C+';
                        } elseif ($value >= 30 && $value < 50) {
                            $grade = 'C';
                        } elseif ($value >= 0 && $value < 30) {
                            $grade = 'F';
                        } else {
                            $grade = 'X - Exam not attempted';
                        }
                        return $grade;
                    }
       ?>

     </table>
    </div>
	
	 <?php include 'footer.php'?>
	</div>
</body>
</html>