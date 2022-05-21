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

        </div>



        <!-- Task Card -->
        <div class=" shadow-sm card-task p-3">
            <h4>List of Trainings</h4>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Sevarth ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Organization Name</th>
                        <th scope="col">Organized By</th>
                        <th scope="col">Apply Letter</th>
                        <th scope="col">Status</th>


                    </tr>

                </thead>

                <tbody>
                    <tr>

                        < <?php if (!empty($trainings)) {foreach ($trainings as $training) {?> <tr>
                            <th scope="row"><?php echo $training['id'] ?></th>

                            <th scope="row"><?php echo $training['sevarth_id'] ?></th>
                            <th scope="row"><?php echo $training['name'] ?></th>
                            <th scope="row">
                                <?php if($training['duration'] < 8) { echo $training["duration"]." days";} else {echo ceil(($training['duration'] % 365)/7). " weeks";} ?>
                            </th>
                            <th scope="row"><?php echo $training['start_date'] ?></th>
                            <th scope="row"><?php echo $training['end_date'] ?></th>
                            <th scope="row"><?php echo $training['org_name'] ?></th>
                            <th scope="row"><?php echo $training['organized_by'] ?></th>
                            <th scope="row">
                                <a href="#" style="font-size: 12px; border-radius: 5px" class="btn btn-success"> View
                                </a>
                            </th>
                            <td>
                                <?php
                                if ($training['training_status_id'] == 1) {
                                    echo 'APPLIED TO HOD';
                                } else if ($training['training_status_id'] == 2) {
                                    echo 'APPLIED TO PRINCIPAL';
                                } else if ($training['training_status_id'] == 3) {
                                    echo 'APPROVED BY HOD';
                                } else if ($training['training_status_id'] == 4) {
                                    echo 'DECLINE BY HOD';
                                } else if ($training['training_status_id'] == 5) {
                                    echo 'APPROVED BY PRINCIPAL';
                                } else if ($training['training_status_id'] == 6) {
                                    echo 'DECLINE BY PRINCIPAL';
                                } else if ($training['training_status_id'] == 7) {
                                    echo 'COMPLETED';
                                }
                        ?>
                            </td>



                    </tr>


                    <?php }}?>

                    </tr>
                </tbody>
            </table>
        </div>


    </div>


</section>