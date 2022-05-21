<!DOCTYPE html>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css">

<body>

    <div class="main">

        <div class="top-box py-3">

        </div>

        <section class="signup mt-5">


            <div class="container container_new">



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
                    </div>

                </div>




                <div class="signup-content">

                    <h2 class="text-center">Apply For Training</h2>
                    <?php
                        $attributes = array('role' => 'form');
                        echo form_open_multipart("Employee/EmployeeController/apply_training");
                    ?>

                    <form action="" name="registerForm" id="registerForm signupform" class="signupform" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Training Name</label>
                                <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>"
                                    class="form-input form-control <?php echo (form_error('name') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="Training Name">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('name')); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="organization_name">Organization Name</label>
                                <input type="text" name="organization_name" id="organization_name"
                                    value="<?php echo set_value('organization_name'); ?>"
                                    class="form-input form-control <?php echo (form_error('organization_name') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="Organization Name">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('organization_name')); ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group">
                                <label for="fname">Organized By</label>
                                <input type="text" name="organized_by" id="organized_by"
                                    value="<?php echo set_value('organized_by'); ?>"
                                    class="form-input form-control <?php echo (form_error('organized_by') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="Organized By">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('organized_by')); ?></p>

                            </div>
                            <div class="form-group">
                                <label for="fname">Duration</label>
                                <input type="number" name="duration" id="duration"
                                    value="<?php echo set_value('duration'); ?>"
                                    class="form-input form-control <?php echo (form_error('duration') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="Duration">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('duration')); ?></p>

                            </div>


                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date"
                                    value="<?php echo set_value('start_date'); ?>"
                                    class="form-input form-control <?php echo (form_error('start_date') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="dd/mm/yy">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('start_date')); ?></p>

                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date"
                                    value="<?php echo set_value('end_date'); ?>"
                                    class="form-input form-control <?php echo (form_error('end_date') != "") ? 'is-invalid' : '' ?>"
                                    placeholder="dd/mm/yy">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('end_date')); ?></p>

                            </div>


                        </div>



                        <div class="form-row">

                            <div class="form-radio">
                                <label for="apply_to">Apply To</label>
                                <div class="form-flex">
                                    <input type="radio" name="apply_to" value="1" id="1" checked="checked" />
                                    <label for="1">HOD</label>

                                    <input type="radio" name="apply_to" value="2" id="2" />
                                    <label for="2">Principal</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="training_type">Training Type</label>
                                <select class="form-select" name="training_type" id="training_type">
                                    <?php if (!empty($training_types)) {foreach ($training_types as $training_type) {?>

                                    <option value="<?php echo $training_type['id'] ?>">
                                        <?php echo $training_type['name'] ?></option>

                                    <?php }} else {?>
                                    <option value="">Select Application Type</option>


                                    <?php }?>

                                </select>
                            </div>




                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="pdf">Select PDF</label>
                                <input type="file" name="pdf" id="pdf" value="<?php echo set_value('pdf'); ?>"
                                    class="form-input form-control <?php echo (form_error('pdf') != "") ? 'is-invalid' : '' ?>">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('pdf')); ?></p>

                            </div>


                        </div>

                </div>
                <div class="form-row">
                    <div class=" form-group">
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