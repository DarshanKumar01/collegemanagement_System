<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
</head>
<body>
	<?php include('common/header.php') ;
	include("connection/connection.php");?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Online Addmission Form</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-3">
			<div class="col-md-12">
				<form action="student.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" class="browser-default custom-select" name="prospectus_issued" value="No">
						<input type="hidden" class="browser-default custom-select" name="prospectus_amount" value="No" >
							<input type="hidden" class="browser-default custom-select" name="applicant_status" value="Admitted">
								<input type="hidden" name="form_b" class="form-control">
						
								<input type="hidden" class="browser-default custom-select" name="application_status" value="Approved">
									
							<input type="hidden" name="place_of_birth" class="form-control">
					
								<input type="hidden" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" class="form-control">
							
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Applicant First Name:*</label>
								<input type="text" name="first_name" class="form-control" pattern="[a-zA-Z'-'\s]*" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Middle Name:</label>
								<input type="text" name="middle_name" pattern="[a-zA-Z'-'\s]*" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Applicant Last Name:*</label>
								<input type="text" name="last_name" pattern="[a-zA-Z'-'\s]*" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
					
												    <input type="hidden" name="roll_no" value="<?php $ran = rand(10,10000); $roll_st = 'st'.$ran; echo $roll_st?>" class="form-control">
											    
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Father Name:*</label>
								<input type="text" name="father_name" pattern="[a-zA-Z'-'\s]*" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Applicant Email:*</label>
								<input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="number" name="mobile_no" id="fieldSelectorId" class="form-control"  pattern="[6-9]{1}[0-9]{9}" 
       title="Phone number with 6-9 and remaing 9 digit with 0-9" onkeypress="phoneno()" maxlength="10"  required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Course which you want?: </label>
								<select class="browser-default custom-select" name="course_code" required>
									<option >Select Course</option>
									<?php
										$query="select course_code, course_name from courses";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
										?>
									
										<option value="<?php echo $row['course_code']?>"><?php echo $row['course_name']?></option>
										<?php //	echo	"<option value=".$row['course_code'].">".$row['course_name']."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Select Session:</label>
								<select class="browser-default custom-select" name="session" required>
									<option  >Select Session</option>
									<?php
										$query="select session from sessions";
										$run=mysqli_query($con,$query);
										while($row=mysqli_fetch_array($run)) {
											echo	"<option value=".$row['session']." selected='selected'>".$row['session']."</option>";
										}
									?>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Your Profile Image:</label>
								<input type="file" name="profile_image" placeholder="Student Age" class="form-control" required>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Date of Birth: </label>
								<input type="date" name="dob" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Other Phone:</label>
								<input type="tel" name="other_phone" class="form-control" pattern="[6-9]{1}[0-9]{9}" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
								<select class="browser-default custom-select" name="gender">
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Permanent Address: </label>
								<input type="text" name="permanent_address" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Current Address:</label>
								<input type="text" name="current_address" class="form-control">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">SSLC Complition Date: </label>
								<input type="date" name="matric_complition_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">SSLC Awarded Date:</label>
								<input type="date" name="matric_awarded_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload SSLC Certificate:</label>
								<input type="file" name="matric_certificate" class="form-control" value="there is no image">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">PU Complition Date: </label>
								<input type="date" name="fa_complition_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">PU Awarded Date:</label>
								<input type="date" name="fa_awarded_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload PU Certificate:</label>
								<input type="file" name="fa_certificate" class="form-control" value="there is no image" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">DEGREE Complition Date: </label>
								<input type="date" name="ba_complition_date" class="form-control" value="0">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">DEGREE Awarded Date:</label>
								<input type="date" name="ba_awarded_date" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload DEGREE Certificate:</label>
								<input type="file" name="ba_certificate" class="form-control" >
							</div>
						</div>
					</div>
				
					<!-- _________________________________________________________________________________
														Hidden Values are here
					_________________________________________________________________________________ -->
					<div>
						<input type="hidden" name="password" value="student123*">
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- _________________________________________________________________________________
														Hidden Values are end here
					_________________________________________________________________________________ -->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary px-5" name="btn_save">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 w-100 p-5">
				<h4 class="bg-secondary p-3 text-center text-white">Undertaking</h4>
				<h5>Candidates awaiting results are required to sign the following undertaking:</h5>
				<p class="tet-justify">
					I solemnly declare that I have submitted the application with the consent of my father / guardian. I pledge to abide by the Rules and Regulations of the USMR college and shall not take part in political activities of any kind. If I do so the USMR Administration will have the right to strike my name off the USMR Rolls. I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time. I understand that if my class attendance percentage is not up to the required standard of the USMR, I will not be eligible to sit in the final examinations. I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the USMR Administration shall be rightful to cancel my admission and to take necessary action against me.
					
				</p>
			</div>
		</div>	
	</div>
</body>
<script>        
          jQuery(document).ready(function () {
      jQuery("#fieldSelectorId").keypress(function (e) {
         var length = jQuery(this).val().length;
       if(length > 9) {
            return false;
       } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
       } else if((length == 0) && (e.which == 48)) {
            return false;
       }
      });
    });
       </script>
</html>