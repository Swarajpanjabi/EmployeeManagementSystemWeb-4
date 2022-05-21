<link rel="stylesheet" href="<?php echo base_url(); ?>css/leave.css">

<body>
	<div class="fluid-container leave-page mt-5">
		<div class="card card-1">
			<div class="card-body">
				<h5 class="card-title">Leave Portal</h5>
				<h6 class="card-subtitle mb-2 text-muted ">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#" style="color: #6c757d !important">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Apply Leave</li>
						</ol>
					</nav>
				</h6>
			</div>
		</div>

		<div class="card card-2">
			<div class="card-body">
				<h5 class="card-title">Staff form</h5>
				<form method="post" action="<?php echo base_url('hod_post_apply_leave') ?>">
					<section>
						<div class="row px-3">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Sevarth ID </label>
									<?php
									if (isset($employees_details)) {
									?>
										<input name="sevarth_id" type="text" class="form-control wizard-required mt-3 mb-3" autocomplete="off" readonly value="<?php echo $this->session->userdata('user_id') ?>">
								</div>

							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Fullname </label>
									<input name="full_name" type="text" class="form-control wizard-required mt-3 mb-3" readonly autocomplete="off" value="<?php echo ($employees_details['name']); ?>">
								</div>

							</div>
						</div>

					<?php

									}
					?>


					<div class="row  px-3">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label>Leave Type <label style="color: red;">*</label> </label>
								<select id="leave_types" name="leave_type" class="custom-select form-control mt-3 mb-3" onclick="getType()" autocomplete="off">
									<option value="">Select leave type...</option>
									<?php
									if (isset($leave_types)) {
										foreach ($leave_types as $key) {
									?>
											<option required="true" id="leave_type"><?php echo ($key['leave_type']); ?></option>
									<?php
										}
									}
									?>
								</select>

							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<br>
								<!-- <label>Available Leave Days</label> <br> -->
								<div class="accordion accordion-flush " id="accordionFlushExample">
									<div class="accordion-item">
										<h2 class="accordion-header" id="flush-headingOne">
											<button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
												<b>Click here to Check Available Leave Days</b>
											</button>
										</h2>

										<!-- <?php
												//if (isset($leave_types)) {
												//foreach ($leave_types as $key1) {
												?> -->
										<?php if (isset($available_leave)) {
											// print_r($available_leave);
											foreach ($available_leave as $key => $value) {
										?>
												<div id="flush-collapseOne" class="border accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
													<div class="accordion-body " style="padding:0 !important;">
														<ul class="list-group">
															<?php
															if ($key == "sevarth_id") {
																//
															} else {
															?>
																<li class="p-2"> <?php echo "$key   -   $value" ?></li>
															<?php															}

															?>
														</ul>
													</div>
												</div>
										<?php }
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>




					<div class="row  px-3">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label>Start Leave Date </label><label style="color: red;">*</label>
								<input id="start_date" name="start_date" type="date" class="form-control date-picker mt-3 mb-3" autocomplete="off" required="true">
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label>End Leave Date </label><label style="color: red;">*</label>
								<input id="end_date" name="end_date" type="date" class="form-control date-picker mt-3 mb-3" autocomplete="off" required="true">
							</div>
						</div>
					</div>


					<div class="row  px-3">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label>Reason For Leave </label><label style="color: red;">*</label>
								<textarea id="leave_reason" name="leave_reason" class="form-control mt-3 mb-3" length="200" maxlength="250" autocomplete="off" style="resize:none; height:10rem" required="true"></textarea>
							</div>
							<div class="form-group">
								<div class="justify-content-center">
									<div class="dropdown">
										<input class="btn btn-primary mt-3 mb-3" type="submit" value="APPLY LEAVE" name="submit" id="add">
									</div>
								</div>
							</div>
						</div>
					</section>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>

</body>


<script>
	var menu_btn = document.querySelector("#menu-btn")
	var sidebar = document.querySelector("#sidebar")
	var container = document.querySelector(".leave-page")
	menu_btn.addEventListener("click", () => {
		sidebar.classList.toggle("active-nav")
		container.classList.toggle("active-cont")
	});

	var leave_type = document.querySelector("#leave_type")
	leave_type.addEventListener("click", () => {

	});

	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	$('.date_picker').attr('min', today);
</script>

<script language="javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	$('#start_date').attr('min', today);
	$('#end_date').attr('min', today);
</script>













<script type="text/javascript">
	// 	$(document).ready(function(){
	//     $('.').live("click",function () {
	//         var id = $(this).attr('data-id');
	//         window.location = "Customer/Details/" + id;
	//     })
	// });


	function getType() {
		selectElement = document.querySelector('#leave_types');
		output = selectElement.value;
		console.log(output);


	}
</script>