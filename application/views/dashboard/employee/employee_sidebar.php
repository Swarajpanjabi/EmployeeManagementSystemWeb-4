<nav class="sidebar sidebar-expand d-flex flex-column align-item-start" id="sidebar">
    <ul class="nav nav-pills mt-5 flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="nav-item py-2">
            <a href="#" class=" align-middle px-0">
                <span class="ms-1 d-none d-sm-inline">Home</span>
            </a>
        </li>
        <li class="nav-item py-2">
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
        </li>
        <li class="nav-item py-2">
            <a href="#submenu1" data-bs-toggle="collapse" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Training</span> </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="nav-item py-2">
                    <a href="<?php echo base_url() . "Employee/EmployeeController/apply_training"?>"
                        class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Apply Trainings</span></a>
                </li>
                <li class="nav-item py-2">
                    <a href="<?php echo base_url() . "Employee/EmployeeController/add_completed_training"?>"
                        class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Add Completed Training</span></a>
                </li>
                <li class="nav-item py-2">
                    <a href="<?php echo base_url() . "Employee/EmployeeController/show_applied_trainings"?>"
                        class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Show Applied Trainings</span></a>
                </li>
                <li class="nav-item py-2">
                    <a href="<?php echo base_url() . "Employee/EmployeeController/complete_training"?>"
                        class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Add Completion Certificate</span></a>
                </li>
            </ul>
        </li>
       
        <li class="nav-item py-2">
            <a href="<?php echo base_url()."cascontroller/formcontroller/index" ?>"
                class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">CAS</span> </a>
        </li>


        <li class="nav-item py-2">
            <a href="#submenu1" data-bs-toggle="collapse" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Leave</span> </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="nav-item py-2">
                    <a href="<?php echo base_url('apply_leave') ?>" class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Apply leave</span></a>
                </li>
                <li class="nav-item py-2">
                    <a href="<?php echo base_url() . "leave_history"?>" class=" px-0 align-middle">
                        <span class="ms-1 d-none d-sm-inline">Leave History</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item py-2">
            <a href="<?php echo base_url()."index.php/notification_controller/index" ?>" class=" px-0 align-middle">
                <span class="ms-1 d-none d-sm-inline">Notifications</span> </a>
        </li>

    </ul>
</nav>