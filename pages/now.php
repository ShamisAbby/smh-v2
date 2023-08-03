<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Create Account</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<!-- <link rel="stylesheet" href="css/style.css"/> -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/font.css">
	<link rel="stylesheet" href="../assets/css/icons.css">

</head>

<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
				<form class="form-register" action="../handles/newStud.php" method="post" onsubmit="validate()">
					<div id="form-total">
						<!-- SECTION 1 -->
						<h2>
							<p class="step-icon"><span>01</span></p>
							<span class="step-text">Peronal Infomation</span>
						</h2>
						<section>
							<div class="inner">
									<div class="wizard-header">
										<h3 class="heading">Peronal Infomation</h3>
										<p>Please enter your infomation and proceed to the next step so we can build your accounts. </p>
									</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Full Name</legend>
											<input type="text" placeholder="Full Name" name="name" required />
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>User Name</legend>
											<input type="text" placeholder="User Name" name="user" required />
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email</legend>
											<input type="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@gmail.com" name="mail" required />

										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Phone Number</legend>
											<!-- <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 888-999-7777" required> -->
											<input type="tel" placeholder="+255 ***-***-***" name="phone" required />

										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Password</legend>
											<input type="password" placeholder="Enter Password" name="fPass" required />
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Confirm Password</legend>
											<input type="password" placeholder="Re-enter Password" name="sPass" required />
										</fieldset>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<p class="step-icon"><span>02</span></p>
							<span class="step-text">Educational Info</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Educational Information</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Registretion No</legend>
											<input type="text" placeholder="DIT/**/**/TZ" name="regNo" required />
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Confirm Password</legend>
											<input type="password" placeholder="Re-enter Password" name="sPass" required />
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Password</legend>
											<input type="password" placeholder="Enter Password" name="fPass" required />
										</fieldset>
									</div>
								</div>


							</div>
						</section>
						<!-- SECTION 3 -->
						<h2>
							<p class="step-icon"><span>03</span></p>
							<span class="step-text">Financial Info</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Financial Info</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Birth Date:</label>
										<select name="month" id="month">
											<option value="" disabled selected>-- Select Network --</option>
											<option value="Zantel">Zantel</option>
											<option value="Tigo">Tigo</option>
											<option value="Airtel">Airtel</option>
											<option value="Vodacom">Vodacom</option>
											<option value="TTCL">TTCL</option>
										</select>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Payment Number</legend>
											<input type="tel" placeholder="+255 ***-***-***" name="accnt" required />
										</fieldset>
									</div>
								</div>
							</div>

							<button class="btn btn-primary btn-sm " name="submit"  role="button"> Submit </button>
						</section>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../assets/js/regForm/jquery-1.min.js"></script>
	<script src="../assets/js/regForm/jquery-2.steps.js"></script>
	<script src="../assets/js/regForm/main.js"></script>

</body>

</html>