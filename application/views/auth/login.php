<link rel="stylesheet" href="<?php echo base_url(); ?>css/loginstyle.css">



<div class="h-100vh">
    <nav>
        <div class="container-fluid d-flex border-bottom align-items-center justify-content-center mb-0  py-3 shadow">
            <img src="<?php echo base_url(); ?>public/logo.png" alt="logo" class="img-fluid" class="logo-img"
                style="width:3rem;height:3rem;border-radius:5px;">
            <h3 class="logo-title mb-0 ms-2">Employee Management System</h3>
        </div>
    </nav>



    <div class="container-fluid" style="background-color: #ecf0f4;">

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

        <div class="row pt-2">
            <div class="col-lg-7 col-sm-12 ps-lg-5 py-lg-5">
                <img src="<?php echo base_url(); ?>public/login-page-img.png" alt="Login Image"
                    class="img-fluid  py-lg-4 ps-lg-5">
            </div>



            <div class="col-lg-5 col-sm-12 pe-lg-5">
                <div class="box p-4 py-lg-5 ms-lg-4  login-box shadow">
                    <h3 class="text-center ">
                        Weclome to EMS
                    </h3>

                    <?php


        if ($this->session->flashdata('message')) {
            echo '
                            <div class="alert alert-danger">
                                ' . $this->session->flashdata("message") . '
                            </div>
                            ';
        }
        ?>

                    <!-- Form -->
                    <form action="<?php echo base_url() . 'index.php/Auth/RegisterController/login' ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>

                            <small class="text-danger form-text"><?php echo form_error('email') ?></small>
                            <div class="input-group with-icon">
                                <!-- Email -->
                                <input
                                    class="form-control rounded p-2 <?php echo (form_error('email') != "") ? 'is-invalid' : '' ?>"
                                    name="email" type="email" value="<?php echo set_value('email'); ?>"
                                    placeholder="Email" autocomplete=off>

                                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 1.3rem;"></i>
                            </div>
                            <small class="text-danger form-text"><?php echo form_error('email') ?></small>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="input-group with-icon">
                                <!-- Password -->
                                <input
                                    class="form-control rounded p-2 <?php echo (form_error('password') != "") ? 'is-invalid' : '' ?>"
                                    name="password" type="password" value="<?php echo set_value('password'); ?>"
                                    placeholder="Password" autocomplete=off>
                                <i class="fa fa-lock" aria-hidden="true" style="font-size:1.3rem"></i>
                            </div>
                            <small class="text-danger form-text"><?php echo form_error('password') ?></small>
                        </div>
                        <div class="mb-3 form-check">
                            <a href="<?php echo base_url() . 'Auth/RegisterController/forgot' ?>"
                                class="link-fp text-primary">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn login-btn p-2 w-100">Submit</button>
                        <div class="mt-3 text-center form-check">
                            <span>
                                Don't have account? <a href="register" class="link-fp text-danger">Create
                                    One</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>