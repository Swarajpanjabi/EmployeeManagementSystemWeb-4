<nav class="sidebar sidebar-expand d-flex flex-column align-item-start" id="sidebar">
    <ul class="nav nav-pills mt-5 flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="nav-item py-2">
            <a href="#" class=" align-middle px-0">
                <span class="ms-1 d-none d-sm-inline">Home</span>
            </a>
        </li>
        <!-- <li class="nav-item py-2">
            <a href="#submenu1" data-bs-toggle="collapse" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100 pt-2">
                    <a href="#" class=" px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                </li>
                <li class="pt-2">
                    <a href="#" class=" px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                </li>
            </ul>
        </li> -->
        <li class="nav-item py-2">
            <a href="<?php echo base_url() . "admin/AdminController/show_verifications" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Verifications</span></a>
        </li>


        <li class="nav-item py-2">
            <a href="<?php echo base_url() . "admin/AdminController/show_employees" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Show Employees</span> </a>
        </li>

        <li class="nav-item py-2">
            <a href="<?php echo base_url() . "leave_types" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Leave Types</span> </a>
        </li>
        <!-- <li class="pt-2">
                    <a href="<?php //echo base_url() . "all_leave" ?>" class=" px-0 align-middle">
                    <span class="ms-1 d-none d-sm-inline">All leave</span> </a>
                </li> -->

        <li class="nav-item py-2">
            <a href="<?php echo base_url() . "index.php/Dsr_controller_folder/Dsr_controller/" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">DSR</span> </a>
        </li>
        <!-- <li class="nav-item py-2">
            <a href="<?php echo base_url() . "index.php/notification_controller/index" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Notifications</span> </a>
        </li> -->
    </ul>

</nav>