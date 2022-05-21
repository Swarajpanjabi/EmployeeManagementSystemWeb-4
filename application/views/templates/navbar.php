<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light border-bottom">
    <div class="container-fluid d-flex align-items-center justify-center">
        <i class="bi bi-list" id="menu-btn"></i>

        <a href="" class="d-flex align-items-center">
            <h5 class="logo-title ms-lg-4">Employee Management System</h5>
        </a>

        <div class="dropdown ms-auto text-end d-flex align-items-center justify-content-center">
           
            
            <a style="color:black !important;font-size:1.3rem; margin-right:2rem;" href="<?php echo base_url() . "index.php/notification_controller/index"?>"
                class="bi bi-bell-fill p-2" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            </a>
      <a href="<?php echo base_url() . "/logout"?>"
                class="d-block link-dark text-decoration-none text-danger h5" id="dropdownUser1"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Go to profile">
                Logout
            </a>
        </div>
    </div>
</nav>