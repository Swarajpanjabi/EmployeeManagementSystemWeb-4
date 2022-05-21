<!-- -------------------------------------Form------------------------------- -->
<div class="container pt-4">
	<div class="card pt-4 mb-3">
		<h2 id="heading">Application For Career Advancement Scheme(CAS)</h2>
		<p>All <span style="color: darkred;">*</span> marked fields are mandatory.</p>
		<?php if ($this->session->flashdata('status')) : ?>
			<div class="alert alert-success">
				<?= $this->session->flashdata('status'); ?>
			</div>
		<?php endif; ?>

		<div id="msform">
			<ul id="progressbar">
				<li id="account" class="active"><strong>Personal Information</strong></li>
				<li id="personal"><strong>Professional Information</strong></li>
				<li id="payment"><strong>Confidential Report</strong></li>
				<li id="confirm"><strong>Finish</strong></li>
			</ul>

			<div class="progress mb-4">
				<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
			</div> <br>

			<?= form_open_multipart('cascontroller/formcontroller/insert'); ?>

			<!-- ----------------------------------------First Form-------------------------------------------- -->
			<fieldset>
				<div class="row mb-2">
					<div class="col-md-7">
						<h2 class="fs-title">Personal Information:</h2>
					</div>
					<div class="col-md-5">
						<h2 class="steps">Step 1 - 4</h2>
					</div>
				</div>

				<!-- ------------------------------Name---------------------- -->
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="surname" class="form-label">Name<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="surname" name="Surname" placeholder="Surname" value="<?= set_value('Surname') ?>">
						<span class="text-danger"><?= form_error('Surname'); ?></span>
					</div>

					<div class="form-group col-md-4" id="Firstname">
						<label for="firstname" class="form-label"><br></label>
						<input type="text" class="form-control" id="firstname" name="Firstname" placeholder="Firstname" value="<?= set_value('Firstname') ?>">
						<span class="text-danger"><?= form_error('Firstname'); ?></span>
					</div>
					<div class="form-group col-md-4" id="Middlename">
						<label for="middlename" class="form-label"><br></label>
						<input type="text" class="form-control" id="middlename" name="Middlename" placeholder="Middlename" value="<?= set_value('Middlename') ?>">
						<span class="text-danger"><?= form_error('Middlename'); ?></span>
					</div>
				</div>

				<!-- -----------------------Email/Phone Number----------------- -->
				<div class="row mb-4">




					<div class="form-group col-md-4">
						<label for="email" class="form-label">Email<span style="color: darkred;"> *</span></label>
						<input type="email" class="form-control" id="email" name="Email" placeholder="Email" value="<?= set_value('Email') ?>">
						<span class="text-danger"><?= form_error('Email'); ?></span>
					</div>

					<!-- <div class="form-group col-md-4">
						<button type="button" class="btn btn-success" id="verified" style="display: none;">Verified</button>
					</div> -->

					<div class="form-group col-md-4">
						<label for="otp" class="form-label"></label>
						<input type="text" class="form-control" id="otp" name="Otp" placeholder="Enter Otp" style="display: none;margin-top:10px;">

						<label for="otp" class="form-label"></label>
						<button type="button" class="btn btn-primary" id="send" style="display: block;margin-top:10px;">Send Otp</button>

						<label for="verified" class="form-label"></label>
						<button type="button" class="btn btn-success" id="verified" style="display: none;margin-top:10px;">Verified <i class="fa fa-check-circle" aria-hidden="true"></i> </button>
					</div>

					<div class="form-group col-md-4">
						<label for="verify" class="form-label"></label>
						<!-- <button type="button" class="btn btn-primary" id="send" style="display: block;margin-top:10px;">Send Otp</button>  -->
						<button type="button" class="btn btn-primary" value="Verify Otp" id="verify" style="display: none;margin-top:10px;">Verify Otp</button>
						<span class="text-danger"><?= form_error('Phone'); ?></span>
					</div>





				</div>

				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="phone" class="form-label">Phone<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="phone" name="Phone" placeholder="Phone" value="<?= set_value('Phone') ?>">
						<span class="text-danger"><?= form_error('Phone'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label class="mb-2 form-label">Designation<span style="color: darkred;"> *</span></label>
						<select class="form-select" name="Designation" aria-label="Default select example" id="branch"> value="<?= set_value('Branch') ?>">
							<option value>--Select--</option>
							<option value="Computer">Lecturer</option>
							<option value="IT">Senior Grade Lecturer</option>
							<option value="Civil">Selection Grade Lecturer 1</option>
						</select>
						<span class="text-danger"><?= form_error('Designation'); ?></span>
					</div>
				</div>

				<!-------------- DOB, Age and Geder ---------------------------->
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="dob" class="form-label">DOB<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="dob" name="DOB" placeholder="Date Of Birth" value="<?= set_value('DOB') ?>" max="2000-12-31">
						<span class="text-danger"><?= form_error('DOB'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="age" class="form-label">Age<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="age" name="Age" placeholder="Age" value="<?= set_value('Age') ?>">
						<span class="text-danger"><?= form_error('Age'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label class="mb-2 form-label">Gender<span style="color: darkred;"> *</span></label>
						<select class="form-select" name="Gender" aria-label="Default select example" id="gender" value="<?= set_value('Gender') ?>">
							<option value>--Select--</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
						<span class="text-danger"><?= form_error('Gender'); ?></span>
					</div>
				</div>
				<!-------------------- DOJ, code and Branch -------------->
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="doj" class="form-label">DOJ<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="doj" name="DOJ" placeholder="DOJ" value="<?= set_value('DOJ') ?>">
						<span class="text-danger"><?= form_error('DOJ'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="employeecode" class="form-label">Sevarth Id<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="employeecode" name="EmployeeCode" placeholder="Sevarth Id" value="<?= set_value('EmployeeCode') ?>">
						<span class="text-danger"><?= form_error('EmployeeCode'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label class="mb-2 form-label">Branch<span style="color: darkred;"> *</span></label>
						<select class="form-select" name="Branch" aria-label="Default select example" id="branch"> value="<?= set_value('Branch') ?>">
							<option value>--Select--</option>
							<option value="Computer">Computer</option>
							<option value="IT">IT</option>
							<option value="Civil">Civil</option>
							<option value="Mechanical">Mechanical</option>
							<option value="Electrical">Electrical</option>
							<option value="Pharmacy">Pharmacy</option>
						</select>
						<span class="text-danger"><?= form_error('Branch'); ?></span>
					</div>
				</div>
				<!-------------------------- Adress Details --------------------------->
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="exampleInputPassword2" class="form-label">Address<span style="color: darkred;"> *</span></label>
						<textarea name="Address" placeholder="Address" id="address" value="<?= set_value('Address') ?>"></textarea>
						<span class="text-danger"><?= form_error('Address'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="state" class="form-label">State<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="state" name="State" placeholder="State" value="<?= set_value('State') ?>">
						<span class="text-danger"><?= form_error('State'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="city" class="form-label">City<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="city" name="City" placeholder="City" value="<?= set_value('City') ?>">
						<span class="text-danger"><?= form_error('City'); ?></span>
					</div>
				</div>
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="taluka" class="form-label">Taluka<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="taluka" name="Taluka" placeholder="Taluka" value="<?= set_value('Taluka') ?>">
						<span class="text-danger"><?= form_error('Taluka'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="village" class="form-label">Village<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="village" name="Village" placeholder="Village" value="<?= set_value('Village') ?>">
						<span class="text-danger"><?= form_error('Village'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="pincode" class="form-label">Pincode<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="pincode" name="Pincode" placeholder="Pincode" value="<?= set_value('Pincode') ?>">
						<span class="text-danger"><?= form_error('Pincode'); ?></span>
					</div>
				</div>

				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>

			<!-- -----------------------------------------Second Form---------------------------------------------------- -->
			<fieldset>
				<div class="row mb-2">
					<div class="col-md-7">
						<h1 class="fs-title">Professional Details:</h1>
					</div>
					<div class="col-md-5">
						<h2 class="steps">Step 2 - 4</h2>
					</div>
				</div>
				<div class="row mb-4">
					<div class="form-group col-md-6">
						<label for="dop" class="form-label">Date of Probession<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="dop" name="Probession" placeholder="Probession Date" value="<?= set_value('Probession') ?>">
						<span class="text-danger"><?= form_error('Probession'); ?></span>
					</div>
					<div class="form-group col-md-6">
						<label for="gr" class="form-label">GR No<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="gr" name="GRNo" placeholder="Gr No." value="<?= set_value('GRNo') ?>">
						<span class="text-danger"><?= form_error('GRNo'); ?></span>
					</div>
				</div>

				<div class="row mb-2">
					<div class="col-md-12">
						<h4 class="">Previous Service Details</h4>
					</div>
				</div>
				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="insname" class="form-label">Institute Name<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="insname" name="InstituteName[]" placeholder="Institute Name" value="<?= set_value('InstituteName') ?>">
						<span class="text-danger"><?= form_error('InstituteName'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="ssd" class="form-label">Service Start Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="ssd" name="ServiceStartDate[]" placeholder="Service Start Date" value="<?= set_value('ServiceStartDate') ?>">
						<span class="text-danger"><?= form_error('ServiceStartDate'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="sed" class="form-label">Service End Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="sed" name="ServiceEndDate[]" placeholder="Service End Date" value="<?= set_value('ServiceEndDate') ?>">
						<span class="text-danger"><?= form_error('ServiceEndDate'); ?></span>
					</div>
				</div>
				<div class="row mb-4">
					<div class="form-group col-md-6">
						<label for="upload" class="form-label">Upload Proof Here<span style="color: darkred;"> *</span></label>
						<!-- <input type="file" class="form-control" id="upload" name="Proof"> -->
						<?= form_upload(['name' => 'userfile[]', 'class' => 'form-control',]) ?>
					</div>
				</div>
				<div id="newRow"></div>
				<div class="d-flex justify-content-center mb-4">
					<div>
						<button id="addRow" type="button" class="btn btn-info btn-lg mt-4">Add</button>
					</div>
					<!-- <div><button id="removeRow" type="button" class="btn btn-danger">Remove</button></div> -->
				</div>

				<div class="row mb-4">
					<div class="col-md-12">
						<h4 class="">Training Details</h4>
					</div>
					<div class="form-group col-md-4">
						<label for="trainingname" class="form-label">Training Name<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="trainingname" name="TrainingName[]" placeholder="Training Name" value="<?= set_value('TrainingName') ?>">
						<span class="text-danger"><?= form_error('TrainingName'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="sponsoredby" class="form-label">Sponsored By<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="sponsoredby" name="SponsoredBy[]" placeholder="Sponsored By" value="<?= set_value('SponsoredBy') ?>">
						<span class="text-danger"><?= form_error('SponsoredBy'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="type" class="form-label">Type<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="type" name="Type[]" value="<?= set_value('Type') ?>">
						<span class="text-danger"><?= form_error('Type'); ?></span>
					</div>
				</div>

				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="duration" class="form-label">Duration<span style="color: darkred;"> *</span></label>
						<select class="form-select" name="Duration[]" aria-label="Default select example" id="gender" value="<?= set_value('Gender') ?>">
							<option value>--Select--</option>
							<option value="1 Week">1 Week</option>
							<option value="2 Week">2 Week</option>
							<option value="3 Week">3 Week</option>
							<option value="3 Week">3 Week</option>
						</select>
						<span class="text-danger"><?= form_error('Duration'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="sd" class="form-label">Start Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="sd" name="StartDate[]" placeholder="Training Start Date" value="<?= set_value('StartDate') ?>">
						<span class="text-danger"><?= form_error('StartDate'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="ed" class="form-label">End Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="ed" name="EndDate[]" placeholder="Training End Date" value="<?= set_value('EndDate') ?>">
						<span class="text-danger"><?= form_error('EndDate'); ?></span>
					</div>
				</div>

				<div id="add">
				</div>
				<div class="d-flex justify-content-center">
					<div><button id="addRow1" type="button" class="btn btn-info btn-lg">Add</button></div>

					<!-- <div><button id="removeRow" type="button" class="btn btn-danger">Remove</button></div> -->
				</div>

				<input type="button" name="next" class="next action-button" value="Next" />
				<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>

			<!-- -------------------------------------------Third Form--------------------------------------------- -->
			<fieldset>
				<div class="row">
					<div class="col-md-7">
						<h2 class="fs-title">Confidential Report:</h2>
					</div>
					<div class="col-md-5">
						<h2 class="steps">Step 3 - 4</h2>
					</div>
				</div>

				<div class="row mb-4">
					<div class="form-group col-md-4">
						<label for="cred" class="form-label">CR Start Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="crsd" name="CRStartDate[]" value="<?= set_value('CRStartDate') ?>">
						<span class="text-danger"><?= form_error('CRStartDate'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="crsd" class="form-label">CR End Date<span style="color: darkred;"> *</span></label>
						<input type="date" class="form-control" id="cred" name="CREndDate[]" value="<?= set_value('CREndDate') ?>">
						<span class="text-danger"><?= form_error('CRStartDate'); ?></span>
					</div>
					<div class="form-group col-md-4">
						<label for="grade" class="form-label">Grade<span style="color: darkred;"> *</span></label>
						<input type="text" class="form-control" id="grade" name="Grade[]" placeholder="Grade" value="<?= set_value('Grade') ?>">
						<span class="text-danger"><?= form_error('CRStartDate'); ?></span>
					</div>
				</div>
				<div id=add1></div>
				<div class="d-flex justify-content-center">
					<div><button id="addRow2" type="button" class="btn btn-info btn-lg">Add</button>
					</div>
				</div>
				<input type="button" name="next" class="next action-button" value="Next" />
				<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>

			<!-- ------------------------------------------Fourth Form---------------------------------------------- -->
			<fieldset>

				<!-- Trigger/Open The Modal -->
				<input type="button" id="myBtn" value="view_form">
				<!-- The Modal -->
				<div id="myModal" class="modal">
					<!-- Modal content -->
					<div class="modal-content">
						<div class="modal-body" id="print">
							<!-- <div class="content"> -->
							<h2> <span style="cursor: pointer;" class="close">&times;</span> </h2>
							<div class="row" style="border-bottom: 1px solid #8e44ad;">
								<div class="form-group col-md-4">
									<h3>Applicant Details</h3>
								</div>
							</div>
							<!-- ---------------------Pesonal Details---------------------------- -->
							<div class="container-fluid style" style="border: 1px solid #8e44ad">
								<div class="row">
									<div class="form-group col-md-4 view_title">
										<h4>Pesonal Details</h4>
									</div>
								</div>

								<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
									<div class="row">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Name</h5>
												<h6 id="name"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Email</h5>
												<h6 id="Email"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Phone Number</h5>
												<h6 id="Phone"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>DOB</h5>
												<h6 id="Dob"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Age</h5>
												<h6 id="Age"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Gender</h5>
												<h6 id="Gender"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>DOJ</h5>
												<h6 id="Doj"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Sevarth Id</h5>
												<h6 id="Code"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Branch</h5>
												<h6 id="Branch"></h6>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- ---------------------Adderess Details---------------------------- -->
							<div class="container-fluid style" style="border: 1px solid #8e44ad">
								<div class="row">
									<div class="form-group col-md-4">
										<h4>Address Details</h4>
									</div>
								</div>

								<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
									<div class="row">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Address</h5>
												<h6 id="Address"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>State</h5>
												<h6 id="State"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>City</h5>
												<h6 id="City"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Taluka</h5>
												<h6 id="Taluka"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Village</h5>
												<h6 id="Village"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Pincode</h5>
												<h6 id="Pincode"></h6>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- -----------------Professional Details---------------------------- -->
							<div class="container-fluid style" style="border: 1px solid #8e44ad; margin-top: 70px;">
								<div class="row">
									<div class="form-group col-md-4">
										<h4>Professional Details</h4>
									</div>
								</div>
								<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
									<div class="row">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>DOP Completion</h5>
												<h6 id="Dop"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Gr No.</h5>
												<h6 id="Gr"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Institute Name</h5>
												<h6 id="Insname"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Service Start Date</h5>
												<h6 id="Ssd"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Service End Date</h5>
												<h6 id="Sed"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Training Name</h5>
												<h6 id="Trainingname"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Sponsored By</h5>
												<h6 id="Sponsoredby"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Type</h5>
												<h6 id="Type"></h6>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Duration</h5>
												<h6 id="Duration"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Start Date</h5>
												<h6 id="Sd"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>End Date</h5>
												<h6 id="Ed"></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- -----------------------CR Details----------------------------- -->
							<div class="container-fluid style" style="border: 1px solid #8e44ad">
								<div class="row">
									<div class="form-group col-md-4">
										<h4>CR Details</h4>
									</div>
								</div>
								<div class="container" style="padding-top: 30px;padding-bottom: 30px;">
									<div class="row">
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>CR Start Date</h5>
												<h6 id="Crsd"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>CR End Date</h5>
												<h6 id="Cred"></h6>
											</div>
										</div>
										<div class="form-group col-md-4">
											<div class="d-flex flex-column">
												<h5>Grade</h5>
												<h6 id="Grade"></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-4 d-flex justify-content-center">
								<input type="button" value="Close" style="width: 85px;" id="click">
							</div>
						</div>
					</div>
				</div>
				<input type="button" name="previous" class="previous action-button-previous" value="Previous" />
				<button type="submit" class="btn btn-primary mt-4">Submit</button>
			</fieldset>

			<?= form_close(); ?>

		</div>
	</div>
</div>
<!-- -------------------------------------Form End------------------------------- -->