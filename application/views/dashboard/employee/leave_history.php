<link rel="stylesheet" href="<?php echo base_url(); ?>css/leave.css">

<div class="fluid-container leave-page mt-5">
    <div class="card card-1">
        <div class="card-body">
            <h5 class="card-title">Leave Portal</h5>
            <h6 class="card-subtitle mb-2 text-muted ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" style="color: #6c757d !important">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leave History</li>
                    </ol>
                </nav>
            </h6>
        </div>
    </div>
    <div class="card card-2">
        <div class="card-body table-responsive" style="overflow-x: scroll; overflow-y: scroll">
            <h5 class="card-title">Leave History</h5>
            <table id="example" class="table table-striped table-hover align-middle" style="width: 100%;">
                <thead>
                    <tr>
                        <th>APPLICATION ID</th>
                        <th>SEVARTH ID</th>
                        <th>STAFF NAME</th>
                        <th>LEAVE TYPE</th>
                        <th>LEAVE REASON</th>
                        <th>LEAVE STATUS</th>
                        <th>RANGE</th>
                        <th>DURATION</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($leave_application)) {
                        foreach ($leave_application as $key) {
                    ?>
                            <tr>
                                <td style="text-align: center;"><?php echo ($key['application_id']); ?></td>
                                <td><?php echo ($key['sevarth_id']); ?></td>
                                <td><label class="profile-name"><?php echo ($key['full_name']); ?></label></td>
                                <td><?php echo ($key['leave_type']); ?></td>
                                <td style="max-width:100px"><?php echo ($key['leave_reason']); ?></td>

                                <td id="status" class="approved">
                                    <?php
                                    if ($key['leave_status'] == "Rejected") { ?>
                                        <p class="text-danger"> <?php echo ($key['leave_status']); ?>
                                        <p>
                                        <?php
                                    } else {
                                        ?>
                                        <p class="text-success"> <?php echo ($key['leave_status']); ?></p>
                                    <?php                                                            }

                                    ?>
                                </td>

                                <td> <b>From : </b> <?php echo ($key['start_date']); ?><br> <b>To :&nbsp;&nbsp;&nbsp; &nbsp; </b> <?php echo ($key['end_date']); ?></td>
                                <td style="text-align: center;"><?php echo ($key['duration']); ?></td>
                                <td>
                                <?php
                                    if ($key['leave_status'] == "Pending") { ?>
                                         <a href="javascript:void(0);" style="color: black !important;" name="delete" class="btn" onclick="delete_type(<?php echo $key['application_id'] ?>)"><i class="far fa-trash-alt"></i>
                                        <?php
                                    }
                                    ?>
                                </td>
        </div>
<?php
                        }
                    }
?>


</tbody>
</table>
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
    })

    var status = document.querySelector("#status")
    leave_status = status.value
    console.log(leave_status);
    if (status == "Rejected") {
        status.classList.add('rejected');
    }
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            order: [
                [0, 'desc']
            ],
        })

    });
</script>

<script type="text/javascript">
    var url = "<?php echo base_url(); ?>"

    function delete_type(application_id) {
        var r = confirm("Do you really want to delete Application ID = " + application_id + " ?")
        if (r == true)
            window.location = url + "leave_application/delete/" + application_id;
        else
            return false
    }
</script>

<!-- <script src="<?php echo base_url(); ?>js/leave.js"></script> -->