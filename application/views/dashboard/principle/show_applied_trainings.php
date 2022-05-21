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

        </div> <!-- Get Training By Status -->
        <div class="container container_new ">

            <form action="<?php echo base_url() . 'Principle/PrincipleController/show_applied_trainings' ?>"
                name="mainForm" id="mainForm signupform" class="signupform" method="post">
                <div class="form-row  d-flex align-items-center ms-auto align-item-space-between">
                    <!-- Select Training Status -->
                    <div class="form-group">
                        <label for="status">Status</label>

                        <select class="form-select" name="status" id="status" style="width: 250px; margin-bottom: 20px">

                            <option value="-1">
                                All Status
                            </option>

                            <?php if (!empty($trainingstatus)) {foreach ($trainingstatus as $status) {?>

                            <option name='status_id'
                                value=<?php echo $status['id'] ?><?php echo set_select('status', $status['id']) ?>>
                                <?php echo $status['status'] ?>
                            </option>

                            <?php }}?>

                        </select>



                    </div>
            </form>

            <div class="form-group">
                <input type="submit" name="signin" id="signin" class="btn btn-primary ms-2" value="Search"
                    style=" font-size: 12px " />
            </div>

        </div>
        <!-- Generate PDF -->
        <div class="container container_new ">

            <form action="<?php echo base_url() . 'Principle/PrincipleController/generate_pdf' ?>" name="mainForm"
                id="mainForm signupform" class="signupform" method="post">
                <div class="form-row  d-flex align-items-center ms-auto align-item-space-between">
                    <!-- Select Training Status -->
                    <div class="form-group">
                        <label for="status">Status</label>

                        <select class="form-select" name="status" id="status" style="width: 250px; margin-bottom: 20px">

                            <option value="-1">
                                All Status
                            </option>

                            <?php if (!empty($trainingstatus)) {foreach ($trainingstatus as $status) {?>

                            <option name='status_id'
                                value=<?php echo $status['id'] ?><?php echo set_select('status', $status['id']) ?>>
                                <?php echo $status['status'] ?>
                            </option>

                            <?php }}?>

                        </select>



                    </div>
            </form>

            <div class="form-group">
                <input type="submit" name="signin" id="signin" class="btn btn-primary ms-2" value="Generate PDF"
                    style=" font-size: 12px " />
            </div>

        </div>

        <!-- Task Card -->
        <div class=" shadow-sm card-task p-3">
            <h4>List of Trainings</h4>


            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Organization Name</th>
                        <th scope="col">Organized By</th>
                        <th scope="col">Apply Letter</th>
                        <th scope="col">Status</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Decline</th>
                        <th scope="col">Generate</th>



                    </tr>

                </thead>

                <tbody>
                    <tr>

                        <?php if (!empty($trainings)) {foreach ($trainings as $training) {?>
                    <tr>
                        <th scope="row"><?php echo $training['id'] ?></th>

                        <th scope="row"><?php echo $training['name'] ?></th>
                        <th scope="row">
                            <?php if ($training['duration'] < 8) {echo $training["duration"] . " days";} else {echo ceil(($training['duration'] % 365) / 7) . " weeks";}?>
                        </th>
                        <th scope="row"><?php echo $training['start_date'] ?></th>
                        <th scope="row"><?php echo $training['end_date'] ?></th>
                        <th scope="row"><?php echo $training['org_name'] ?></th>
                        <th scope="row"><?php echo $training['organized_by'] ?></th>
                        <th scope="row">
                            <a href="#" style="font-size: 12px; border-radius: 5px" class="btn btn-primary">
                                View
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

                        <th scope="row">
                            <a href="<?php echo base_url() . "Principle/PrincipleController/accept_training_application/" . $training['id'] ?>"
                                style="
                                font-size: 12px; border-radius: 5px" class="btn btn-success"> Accept
                            </a>
                        </th>
                        <th scope="row">
                            <a href="<?php echo base_url() . "Principle/PrincipleController/decline_training_application/" . $training['id'] ?>"
                                style="
                                font-size: 12px; border-radius: 5px" class="btn btn-danger"> Decline
                            </a>
                        </th>
                        <th scope="row">
                            <a href="<?php echo base_url() . "Principle/PrincipleController/generate_single_pdf/" . $training['id'] ?>"
                                style="
                                font-size: 12px; border-radius: 5px" class="btn btn-danger"> Generate
                            </a>
                        </th>


                    </tr>


                    <?php }}?>

                    </tr>
                </tbody>
            </table>
        </div>


    </div>
    </div>

</section>