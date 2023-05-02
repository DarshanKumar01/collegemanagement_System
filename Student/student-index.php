<!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
	if($_SESSION['LoginStudent']){
		$_SESSION['LoginAdmin'] = "";
	}
		require_once "../connection/connection.php";
		
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>


	<body onload="myFunction()" style="margin:0;">
	<div id="loader"></div>
	
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100" style="display:none;" id="myDiv" class="animate-bottom">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Welcome To <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> Dashboard </h4> </h4>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-two text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-file-text-o mr-3" aria-hidden="true"></i>Subjects Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapseOne">
									<table class="w-100 table-elements table-two-tr"cellpadding="2">
										<tr class="pt-5 table-two text-white" style="height: 32px;">
											<th>Subject Code</th>
											<th>Subject Name</th>
											<th>Semester</th>
											<th>Credit Hours</th>
										</tr>
										<?php $roll_no=$_SESSION['LoginStudent'];
											$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
											$max_run = mysqli_query($con, $max_semester);
											$row = mysqli_fetch_array($max_run);
											$semester = $row['semester'];
											$query="select sc.subject_code,cs.subject_name,sc.semester,cs.credit_hours, sc.roll_no, sc.semester from student_courses sc inner join course_subjects cs on sc.subject_code=cs.subject_code where sc.roll_no='$roll_no' and sc.semester = $semester";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>								
										<tr>
											<td><?php echo $row['subject_code'] ?></td>
											<td><?php echo $row['subject_name'] ?></td>
											<td><?php echo $row['semester'] ?></td>
											<td><?php echo $row['credit_hours'] ?></td>
										</tr>
										<?php } ?>
									</table>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-md-6 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-three text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i>Fee Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<table class="w-100 table-elements table-three-tr"cellpadding="2">
										<tr class="pt-5 table-three text-white" style="height: 32px;">
											<th>Voucher No.</th>
											<th>Roll No.</th>
											<th>Amt (Rs.)</th>
											<th>Posting Date</th>
											<th>Status</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$query="select * from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
											<tr class="text-center">
												<td><?php echo $row['fee_voucher'] ?></td>
												<td><?php echo $row['roll_no'] ?></td>
												<td><?php echo $row['amount'] ?></td>
												<td><?php echo $row['posting_date'] ?></td>
												<td><?php echo $row['status'] ?></td>
											</tr>
											<?php	
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-4">
								<div class="btn btn-block table-five text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-info-circle mr-3" aria-hidden="true"></i> Current Semester Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsethree">
									<table class="w-100 table-elements table-five-tr"cellpadding="2">
										<tr class="pt-5 table-five text-white" style="height: 32px;">
											<th>Subject code</th>
											<th>Subject Name</th>
											<th>Semester</th>
											<th>Marks</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
											$max_run = mysqli_query($con, $max_semester);
											$row = mysqli_fetch_array($max_run);
											$semester = $row['semester'];
											$query="select * from student_courses inner join course_subjects on student_courses.subject_code=course_subjects.subject_code where student_courses.roll_no='$roll_no' and student_courses.semester = '$semester'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>								
											<tr>
												<td><?php echo $row['subject_code'] ?></td>
												<td><?php echo $row['subject_name'] ?></td>
												<td><?php echo $row['semester'] ?></td>
												<td>100</td>
											</tr>
											<?php } 
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-4">
								<div class="btn btn-block table-one text-light d-flex">
									<span class="font-weight-bold"><i class="fa fa-check-square-o mr-3" aria-hidden="true"></i>Attendance Status</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsefour"><i class="fa fa-plus text-light" aria-hidden="true"></i></a>
									
								</div>
								<div class="collapse show mt-2" id="collapsefour">
								
								
									<table class="w-100 table-elements table-one-tr"cellpadding="2">
										<tr class="pt-5 table-one text-white" style="height: 32px;">
											<th>Roll No</th>
											<th>Present</th>
											<th>Absent</th>
											<th>Percentage</th>
										</tr>
										<?php 
											$roll_no=$_SESSION['LoginStudent'];
											$query="select count(attendance_id) as attendance_id,sum(attendance) as attendance,student_id from student_attendance where student_id='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row1=mysqli_fetch_array($run)) { ?>
											<tr>
												<td><?php echo $_SESSION['LoginStudent'] ?></td>
												<td><?php echo $row1['attendance'] ? $row1['attendance'] : "0" ?></td>
												<td><?php echo $row1['attendance_id']-$row1['attendance']?></td>
												<?php $attendace =  $row1['attendance_id'] > 0 ? round(($row1['attendance']*100)/$row1['attendance_id'])."%" : "0%";
												$attendace1 =  $row1['attendance_id'] > 0 ? round(($row1['attendance']*100)/$row1['attendance_id'])."" : "";
												$rem = 100 - $attendace1;
												 ?>
												<td> <?php echo $attendace ?> </td>
											</tr>
											<?php	
											}
										?>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
				
								 <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Attendance', <?php echo $attendace1 ?>],
  ['Absent', <?php echo $rem ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Attendance Status', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
	</div>
	</div>
			</div>
		</main>
		
		<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>