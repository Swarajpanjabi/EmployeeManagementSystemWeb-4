<!DOCTYPE html>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<body>

    <div class="main">



        <div class="row">

            <div>

                <?php


                    if ($this->session->flashdata('failure')) {
                        echo '
                                        <div class="container">
                                        <div class="alert alert-danger">
                                            ' . $this->session->flashdata("failure") . '
                                        </div>
                                        </div>
                                        ';
                    }
                 ?>

                <?php


                    if ($this->session->flashdata('success')) {
                        echo '
                                        <div class="container">
                                        <div class="alert alert-success">
                                            ' . $this->session->flashdata("success") . '
                                        </div>
                                        </div>
                                        ';
                    }
                ?>


                <section class="signup mt-5">
                    <!-- <img src="images/signup-bg.jpg" alt=""> -->
                    <div class="container container_new">
                        <?php

            if ($this->session->flashdata('msg')) {
                echo '
                    <div class="container">
                        <div class="alert alert-danger">
                            ' . $this->session->flashdata("msg") . '
                        </div>
                    </div>
                    ';
            }
            ?>

                    </div>
            </div>





            <div class="signup-content">

                <h2 class="text-center">Employee De</h2>
                <?php
                        $attributes = array('role' => 'form');
                        echo form_open_multipart("Auth/RegisterController/details");
                    ?>
                <form action="" name="registerForm" id="registerForm signupform" class="signupform" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name"
                                value="<?php echo set_value('first_name'); ?>"
                                class="form-input form-control <?php echo (form_error('first_name') != "") ? 'is-invalid' : '' ?>"
                                placeholder="First Name">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('first_name')); ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name"
                                value="<?php echo set_value('middle_name'); ?>"
                                class="form-input form-control <?php echo (form_error('middle_name') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Middle Name">
                            <p class="invalid-feedback ">
                                <?php echo strip_tags(form_error('middle_name')); ?></p>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group">
                            <label for="fname">Last Name</label>
                            <input type="text" name="last_name" id="last_name"
                                value="<?php echo set_value('last_name'); ?>"
                                class="form-input form-control <?php echo (form_error('last_name') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Last Name">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('last_name')); ?>
                            </p>

                        </div>
                        <div class="form-group">
                            <label for="dob">D.O.B</label>
                            <input type="date" name="dob" id="dob" value="<?php echo set_value('dob'); ?>"
                                class="form-input form-control <?php echo (form_error('dob') != "") ? 'is-invalid' : '' ?>"
                                placeholder="dd/mm/yy">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('dob')); ?></p>

                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-radio">
                            <label for="gender">Gender</label>
                            <div class="form-flex">
                                <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                <label for="male">Male</label>

                                <input type="radio" name="gender" value="female" id="female" />
                                <label for="female">Female</label>
                            </div>
                        </div>
                        <!--File Uploading -->
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="file" name="qualification" id="qualification"
                                value="<?php echo set_value('qualification'); ?>"
                                class="form-input form-control <?php echo (form_error('qualification') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Qualification">
                            <p class="invalid-feedback ">
                                <?php echo strip_tags(form_error('qualification')); ?></p>

                        </div>


                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="cast">Cast</label>
                            <input type="text" name="cast" id="cast" value="<?php echo set_value('cast'); ?>"
                                class="form-input form-control <?php echo (form_error('cast') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Cast">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('cast')); ?></p>

                        </div>


                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="subcast">Sub Cast</label>
                            <input type="text" name="subcast" id="subcast" value="<?php echo set_value('subcast'); ?>"
                                class="form-input form-control" placeholder="Sub Cast">
                        </div>


                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation"
                                value="<?php echo set_value('designation'); ?>"
                                class="form-input form-control <?php echo (form_error('designation') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Designation">
                            <p class="invalid-feedback ">
                                <?php echo strip_tags(form_error('designation')); ?></p>

                        </div>
                    </div>





                    <div class="form-row">
                        <div class="form-group">
                            <label for="retirement_date">Retirement Date</label>
                            <input type="date" name="retirement_date" id="retirement_date"
                                value="<?php echo set_value('retirement_date'); ?>"
                                class="form-input form-control <?php echo (form_error('retirement_date') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Retirement Date">
                            <p class="invalid-feedback ">
                                <?php echo strip_tags(form_error('retirement_date')); ?>
                            </p>

                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="file" name="experience" id="experience"
                                value="<?php echo set_value('experience'); ?>"
                                class="form-control <?php echo (form_error('experience') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Experience">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('experience')); ?>
                            </p>

                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="aadhar_no">Aadhar Card Number</label>
                            <input type="text" name="aadhar_no" id="aadhar_no"
                                value="<?php echo set_value('aadhar_no'); ?>"
                                class="form-input form-control <?php echo (form_error('aadhar_no') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Aadhar Card Number">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('aadhar_no')); ?>
                            </p>

                        </div>
                        <div class="form-group">
                            <label for="pan_no">Pan Card Number</label>
                            <input type="text" name="pan_no" id="pan_no" value="<?php echo set_value('pan_no'); ?>"
                                class="form-input form-control <?php echo (form_error('pan_no') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Pan Card Number">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('pan_no')); ?></p>

                        </div>


                    </div>


                    <div class="form-group">
                        <label for="blood_grp">Blood Group</label>
                        <select class="form-select" name="blood_grp" id="blood_grp">

                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="+O">O+</option>

                        </select>

                    </div>

                    <!-- <div class=" form-group">
                            <label for="blood_grp">Blood Group</label>
                            <input type="text" name="blood_grp" id="blood_grp"
                                value="<?php echo set_value('blood_grp'); ?>" class="form-input form-control
                                <?php echo (form_error('blood_grp') != "") ? 'is-invalid' : '' ?>"
                                placeholder="Blood Group">
                            <p class="invalid-feedback "><?php echo strip_tags(form_error('blood_grp')); ?></p>

                        </div> -->
                    <div class="form-group">
                        <label for="identification_mark">Identification Mark</label>
                        <input type="text" name="identification_mark" id="identification_mark"
                            value="<?php echo set_value('identification_mark'); ?>"
                            class="form-input form-control <?php echo (form_error('identification_mark') != "") ? 'is-invalid' : '' ?>"
                            placeholder="Identification Mark">
                        <p class="invalid-feedback ">
                            <?php echo strip_tags(form_error('identification_mark')); ?></p>

                    </div>


            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" value="<?php echo set_value('photo'); ?>"
                        class="form-input form-control <?php echo (form_error('photo') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Select Photo">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('photo')); ?></p>


                </div>
                <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no" value="<?php echo set_value('contact_no'); ?>"
                        class="form-input form-control <?php echo (form_error('contact_no') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Contact Number">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('contact_no')); ?></p>

                </div>

            </div>


            <div class="form-row">
                <div class="form-group">
                    <label for="alternate_contact_no">Alternate Contact Number</label>
                    <input type="text" name="alternate_contact_no" id="alternate_contact_no"
                        value="<?php echo set_value('alternate_contact_no'); ?>"
                        class="form-input form-control <?php echo (form_error('alternate_contact_no') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Alternate Contact Number">
                    <p class="invalid-feedback ">
                        <?php echo strip_tags(form_error('alternate_contact_no')); ?></p>

                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>"
                        class="form-input form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Address">
                    <p class="invalid-feedback ">
                        <?php echo strip_tags(form_error('address')); ?></p>

                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="city">City Name</label>
                    <input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>"
                        class="form-input form-control <?php echo (form_error('city') != "") ? 'is-invalid' : '' ?>"
                        placeholder="City Name">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('city')); ?></p>

                </div>
                <div class="form-group">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" name="pin_code" id="pin_code" value="<?php echo set_value('pin_code'); ?>"
                        class="form-input form-control <?php echo (form_error('pin_code') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Pin Code">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('pin_code')); ?></p>

                </div>


            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" value="<?php echo set_value('state'); ?>"
                        class="form-input form-control <?php echo (form_error('state') != "") ? 'is-invalid' : '' ?>"
                        placeholder="State">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('state')); ?></p>

                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" value="<?php echo set_value('country'); ?>"
                        class="form-input form-control <?php echo (form_error('country') != "") ? 'is-invalid' : '' ?>"
                        placeholder="Country">
                    <p class="invalid-feedback "><?php echo strip_tags(form_error('country')); ?></p>

                </div>


            </div>




            <div class="form-row">
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
                </div>

            </div>
            </form>
        </div>
    </div>
    </section>

    </div>

    <!-- JS -->

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>