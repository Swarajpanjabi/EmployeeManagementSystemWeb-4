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

                </div> <?php
                    $attributes = array('role' => 'form');
                    echo form_open_multipart("Employee/EmployeeController/complete_training");
                ?>

                <form action="" name="registerForm" id="registerForm signupform" class="signupform" method="post">


                    <div class="signup-content">

                        <h2 class="text-center">Complete Training</h2>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="certificate">Upload Certificate</label>
                                <input type="file" name="certificate" id="certificate"
                                    value="<?php echo set_value('certificate'); ?>"
                                    class="form-input form-control <?php echo (form_error('certificate') != "") ? 'is-invalid' : '' ?>">
                                <p class="invalid-feedback "><?php echo strip_tags(form_error('certificate')); ?></p>

                            </div>


                        </div>


                        <div class="form-group">
                            <label for="training">Select Training</label>
                            <select class="form-select" name="training" id="training">
                                <?php if (!empty($trainings)) {foreach ($trainings as $training) {?>

                                <option
                                    value=<?php echo $training['id'] ?><?php echo set_select('training', $training['id']) ?>>
                                    <?php echo $training['name'] ?>
                                </option>
                                <?php }} else {?>
                                <option value="">Select Training</option>


                                <?php }?>

                            </select>
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