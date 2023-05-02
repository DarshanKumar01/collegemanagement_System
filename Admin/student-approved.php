<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_GET['roll_no'])) {

		$roll_no= $_GET["roll_no"];
 		$query="UPDATE `student_info` SET admission_from ='0' where roll_no ='$roll_no'";
 		$run=mysqli_query($con, $query);
 		   echo "<script>alert('Successfully Approved');
		location.href='student.php';
	</script>"; 
 	}
?>
