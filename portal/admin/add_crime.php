<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
	if(isset($_POST['add_crime']))
	{
	
	$crimeid=$_POST['crimeid']; 
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];   
	$gender=$_POST['gender']; 
	$dob=$_POST['dob']; 
	$occupation=$_POST['occupation']; 
	$address=$_POST['address']; 
	$number=$_POST['number']; 
	$crime=$_POST['crime']; 
	$location=$_POST['location']; 
	$status=1;

	 $query = mysqli_query($conn,"select * from tblcrimes where CrimeId = '$crimeid'")or die(mysqli_error());
	 $count = mysqli_num_rows($query);
     
     if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO tblcrimes(CrimeId,FirstName,LastName,Gender,Dob,Occupation,Address,Number,Crime,Location,Status) VALUES('$crimeid','$fname','$lname','$gender','$dob','$occupation','$address','$number','$crime','$location','$status')") or die(mysqli_error()); ?>
		<script>alert('Crime Record Successfully  Added');</script>;
		<script>
		window.location = "crimes.php"; 
		</script>
		<?php   }
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/favicon-32x32.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>New Crime Record</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">New Crime Record</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<form method="post" action="">
							<section>
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Crime Id :</label>
											<input name="crimeid" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label >Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="text" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Occupation :</label>
											<input name="occupation" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="address" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="number" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Crime :</label>
											<select name="crime" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Crime</option>
												<option value="Theft">Theft</option>
												<option value="Robbery">Robbery</option>
												<option value="Rape">Rape</option>
												<option value="Fraud">Fraud</option>
												<option value="Kidnap">Kidnap</option>
												<option value="Murder">Murder</option>
												<option value="Others">Others</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Location :</label>
											<select name="location" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Location</option>
												<option value="Layali">Layali</option>
												<option value="Royal Suite">Royal Suite</option>
												<option value="Cheche">Cheche</option>
												<option value="SV">SV</option>
												<option value="SL">SL</option>
												<option value="FL">FL</option>
												<option value="GRA">GRA</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												<button class="btn btn-primary" name="add_crime" id="add_crime" data-toggle="modal">Add&nbsp;Record</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>