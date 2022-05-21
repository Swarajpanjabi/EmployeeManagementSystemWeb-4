<link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

<section class="px-4 pt-5 mt-4 sec-main my-container">

    <div class="container py-4">



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

        </div> <!-- Task Card -->
        <div class=" shadow-sm card-task p-3">
            <h4>List of Employees</h4>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Sevarth ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Delete</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>

                        <?php if (!empty($employees)) {foreach ($employees as $employee) {?>
                    <tr>
                        <th scope=" row">
                            <a href="<?php echo base_url() . 'Hod/HodController/employee_details/' . $employee['sevarth_id'] ?>"
                                style="font-size: 15px; border-radius: 5px"
                                class="text-dark"><?php echo $employee['sevarth_id'] ?>
                            </a>
                        </th>


                        <td><?php echo $employee['name'] ?></td>
                        <td><?php echo $employee['email'] ?></td>

                        <td>
                            <a href="<?php echo base_url() . 'Hod/HodController/delete_employee/' . $employee['sevarth_id'] ?>"
                                style="font-size: 12px; border-radius: 5px" class="btn btn-primary"> Delete
                            </a>
                        </td>

                    </tr>
                    <?php }} ?>

                    </tr>
                </tbody>
            </table>
        </div>


    </div>


</section>