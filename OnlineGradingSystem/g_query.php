

<?php
session_start();
include 'dbconnect.php';
error_reporting(E_ALL);

$sem = $_POST['sem'];
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
	  
	  <h2 style="font-size: 30px;">Generate Grade <?php echo $_SESSION['specialization'] ?></h2>
		
			<form class="gsystem" action="g_query.php" method="post">

				<label for="username">Name </label>
				<select  name="Name" required>
					<option value="" value="">--select--</option>
					<?php
                    
                    

                    $sql = "SELECT Name FROM students WHERE Semester='$sem'";
                    echo $sql;
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        extract($row)
                        ?>
					<option value="<?php echo $Name; ?>">
						<?php echo $Name; ?>
					</option>
					<?php
                    } ?>
				</select>
                
                <?php echo " ".$sem; ?>

                <input type="hidden" name="semester2" value="<?php echo $sem; ?>">

                <?php if($_SESSION['specialization'] == 'OS'){ ?>
				<input type="number" name="OS" placeholder="OS"><br><br>
                <?php } ?>
                
                <?php if($_SESSION['specialization'] == 'CA'){ ?>
				<input type="number" name="english" placeholder="CA"><br><br>
                <?php } ?>

                <?php if($_SESSION['specialization'] == 'OOP'){ ?>
				<input type="number" name="swahili" placeholder="OOP"><br><br>
                <?php } ?>

                <?php if($_SESSION['specialization'] == 'JAVA'){ ?>
				<input type="number" name="science" placeholder="JAVA"><br><br>
                <?php } ?>

                <?php if($_SESSION['specialization'] == 'DBMS'){ ?>
				<input type="number" name="sscre" placeholder="DBMS"><br><br>
                <?php } ?>
				<b></b>
				<h2>Give Remarks:</h2>(optional)<br><br>
				<center>
					<textarea name="remarks" rows="5" cols="60" id="text" style="font-family:sans-serif;font-size:1.2em;">
				</textarea>
				</center><br><br>
				<input class="button" type="submit" name="Insert" value="Insert"><br>
			</form>
			
			</div>
			</div>
			<div class="errs">
				<?php
                //Assigning variables
                if (isset($_POST[ 'Insert' ])) {
                    echo " check sem: ".$sem;
                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    $NameErr = $semErr = $OSErr = $englishErr = $swahiliErr = $scienceErr = $sscreErr = $remarksErr = "";
                    $name = $semester = $maths = $english = $swahili = $science = $sscre = $remarks = "";
                    //name
                    if (empty($_POST[ 'Name' ])) {
                        $NameErr = "<p>You have not entered a students name</p>";
                    } else {
                        $Name = test_input($_POST[ 'Name' ]);
                    }
                    //sem
                    if (empty($_POST['semester2'])) {
                        $semErr = "<p>You have not entered Semester</p>";
                    } else {
                        $semester = test_input($_POST['semester2']);  
                        // $semester = test_input($sem);
                    }
                    
                    //Maths
                    if (empty($_POST[ 'OS' ])) {
                        $OSErr = "<p>You have not entered OS marks</p>";
                    } else {
                        $OS = test_input(intval($_POST[ 'OS' ]));
                    }
                    //English
                    if (empty($_POST[ 'english' ])) {
                        $englishErr = "<p>You have not entered CA marks</p>";
                    } else {
                        $english = test_input(intval($_POST[ 'english' ]));
                    }
                    //Swahili marks
                    if (empty($_POST[ 'swahili' ])) {
                        $swahiliErr = "<p>You have not entered OOP marks</p>";
                    } else {
                        $swahili = test_input(intval($_POST[ 'swahili' ]));
                    }
                    //Science marks
                    if (empty($_POST[ 'science' ])) {
                        $scienceErr = "<p>You have not entered JAVA marks</p>";
                    } else {
                        $science = test_input(intval($_POST[ 'science' ]));
                    }
                    //SSCRE marks
                    if (empty($_POST[ 'sscre' ])) {
                        $sscreErr = "<p>You have not entered DBMS marks</p>";
                    } else {
                        $sscre = test_input(intval($_POST[ 'sscre' ]));
                    }
                    $remarks = ($_POST[ 'remarks' ]);
                    
                    $m = isset($OS) ? $OS : 0;
                    $e = isset($english) ? $english : 0;
                    $s = isset($swahili) ? $swahili : 0;
                    $sc = isset($science) ? $science : 0;
                    $ss = isset($sscre) ? $sscre : 0;

                    // $total1 = $m + $e + $s + $sc + $ss;
                    // $avg = ($total1 * 100) / 500;
                    //Grading system
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
                    
                    
					if (isset($Name) && isset($semester)) {
                        
						$sqlG = "SELECT * FROM `grade` WHERE Name = '$Name' AND Semester = '$semester'";
                        echo $sqlG;
                            echo "</br>";
            			$resultG = $con->query($sqlG);
            			if ($resultG->num_rows > 0) {
							$rowG = $resultG->fetch_assoc();
							$id = $rowG['Id'];                        
							$total = $rowG['Total'];
                            
                            
							// $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',
							// `OS`='$OS',`CA`='$english',`OOP`='$swahili',`JAVA`='$science',`DBMS`='$sscre',
                            // `Total`='$total',`Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";
                            echo "java ".$science."</br>";
                            echo "dbms ".$sscre."</br>";
                            echo "os ".$OS."</br>";
                            echo "ca ".$english."</br>";
                            echo "oops ".$swahili."</br>";
                            echo "total ".$total."</br>";
                            echo "</br>";
                            $sql = null;
                            if (!empty($science)) {

                                $total = $total + $science;
                                $avg = ($total * 100) / 500;
                                $grade = getGrade($avg);

                                $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',`JAVA`='$science', Total='$total',
                                `Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";

                                // $maths = $english = $swahili = $sscre = $remarks = "";
                            }else if (!empty($OS)) {
                                $total = $total + $OS;
                                $avg = ($total * 100) / 500;
                                $grade = getGrade($avg);

                                $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',`OS`='$OS', Total='$total',
                                `Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";
                            }else if (!empty($english)) {
                                $total = $total + $english;
                                $avg = ($total * 100) / 500;
                                $grade = getGrade($avg);

                                $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',`CA`='$english', Total='$total',
                                `Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";
                            }else if (!empty($swahili)) {
                                $total = $total + $swahili;
                                $avg = ($total * 100) / 500;
                                $grade = getGrade($avg);

                                $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',`OOP`='$swahili', Total='$total',
                                `Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";
                            }else if (!empty($sscre)) {
                                $total = $total + $sscre;
                                $avg = ($total * 100) / 500;
                                $grade = getGrade($avg);

                                $sql = "UPDATE `grade` SET `Name`='$Name',`Semester`='$semester',`DBMS`='$sscre', Total='$total',
                                `Grade`='$grade',`Remarks`='$remarks' WHERE Id = '$id'";
                            }
                            echo $sql;
                            echo "</br>";

                            if ($con->query($sql) === true) {
                                // echo "<p>Student: " . $Name . '</p>';
                                // echo '<p>OS: ' . $m . '</p><p>CA: ' . $e . '</p><p>OOP: ' . $s . '</p><p>JAVA: ' . $sc . '</p><p>DBMS: ' . $ss . '</p>';
                                // echo '<p>' . intval($total) . '% ' . $grade . '</p>';
                                header("Location: grade.php");
                                exit;
                            } else {
                                echo "Error: " . $sql . "<br>" . $con->error;
                            }
						}else{
                            $sql = "INSERT INTO grade (Name, Semester, os, ca, oop, java, dbms, total, grade, remarks)
                    	            VALUES ('$Name', '$semester', '$OS', '$english', '$swahili', '$science', '$sscre', '', '', '$remarks')";
                            echo $sql;
                            if ($con->query($sql) === true) {
                                // echo "<p>Student: " . $Name . '</p>';
                                // echo '<p>OS: ' . $m . '</p><p>CA: ' . $e . '</p><p>OOP: ' . $s . '</p><p>JAVA: ' . $sc . '</p><p>DBMS: ' . $ss . '</p>';
                                // echo '<p>' . intval($total) . '% ' . $grade . '</p>';
                                header("Location: grade.php");
                                exit;
                            } else {
                                echo "Error: " . $sql . "<br>" . $con->error;
                            }
                        }
                    }else{
						?>
						<script>
							alert('Name or Semester not found');
							// window.open('login.php','_self');
						</script>
						<?php
					}
                }
                ?>
			</div>
		
		<!-- <div class="reveal">
		<h1>Student's results</h1>
		<table>
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
            $sql2 = "SELECT * FROM grade ORDER BY `total` DESC";
            $result = $con->query($sql2);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row[ "name" ] . "</td><td>" . $row[ "semester" ] . "</td><td>" . $row[ "os" ] . "</td><td>" . $row[ "ca" ] . "</td><td>" . $row[ "oop" ] . "</td><td>" . $row[ "java" ] . "</td><td>" . $row[ "dbms" ] . "</td><td>" . $row[ "total" ] . "</td><td>" . $row[ "grade" ] . "</td><td>" . $row[ "remarks" ] . "</td></tr>";
                }
            } else {
                echo "No data to display";
            }
            ?>

		</table>
	</div>-->
	</div>

	 <?php include 'footer.php'?>
	</div>
</body>
</html>