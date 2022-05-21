<link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

<section class="px-4 pt-5 mt-4 sec-main my-container">

    <div class="container py-4">
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

        <!-- Task Card -->
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
                            <a href="<?php echo base_url() . 'Hod/HodController/employee_details/' . $employee['sevarth_id'] ?>
" style="font-size: 15px; border-radius: 5px" class="text-dark"><?php echo $employee['sevarth_id'] ?>
                            </a>
                        </th>


                        <td><?php echo $employee['name'] ?></td>
                        <td><?php echo $employee['email'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'Admin/AdminController/delete_employee/' . $employee['sevarth_id'] ?>"
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

<script>
	var menu_btn = document.querySelector("#menu-btn")
	var sidebar = document.querySelector("#sidebar")
	var container = document.querySelector(".leave-page")
	menu_btn.addEventListener("click", () => {
		sidebar.classList.toggle("active-nav")
		container.classList.toggle("active-cont")
	})
</script>