<link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css">

<section class="px-4 pt-5 mt-4 sec-main my-container">

    <div class="container py-4">


        <!-- Task Card -->
        <div class=" shadow-sm card-task p-3">
            <h4>List of Employees</h4>

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Sevarth ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Decline</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>

                        <?php if (!empty($principle_for_verification_from_admin)) {foreach ($principle_for_verification_from_admin as $employees) {?>
                    <tr>
                        <th scope="row"><?php echo $employees['sevarth_id'] ?></th>
                        <td><?php echo $employees['name'] ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'Admin/AdminController/accept_principle_request/' . $employees['sevarth_id'] ?>"
                                style="font-size: 12px; border-radius: 5px" class="btn btn-primary"> Accept
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url() . 'Admin/AdminController/accept_principle_request/' . $employees['sevarth_id'] ?>"
                                style="font-size: 12px;  border-radius: 5px"" class=" btn btn-danger">Decline</a>
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