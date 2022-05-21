<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/cas_assets/cas_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Form</title>
</head>


<body id="body-pd">

<!-- -------------------------------------Header------------------------------- -->

<header class="header" id="header">
        <div class="header_toggle"> <i class="fa fa-bars" aria-hidden="true" id="header-toggle"></i> </div>
        <div class="header_img"> <i class="fa fa-user-circle" aria-hidden="true" id="profile_pic"></i></div>
        <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
</header>
<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i> <span class="nav_logo-name">Employee Name</span> 
                </a>
                <div class="nav_list"> 
                    <a href="<?php echo base_url();?>Employee/EmployeeController/index" class="nav_link "> 
                        <i class="fa fa-th-large" aria-hidden="true" style="font-size: 20px;"></i><span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="<?php echo base_url();?>cascontroller/formcontroller/index" class="nav_link"> 
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i> <span class="nav_name">Application</span> 
                    </a> 
                    <!--<a href="#" class="nav_link"> 
                        <i class="fa fa-bell" aria-hidden="true" style="font-size: 20px;"></i> <span class="nav_name">Notifications</span> 
                    </a> -->
                    <a href="<?php echo base_url();?>cascontroller/formcontroller/status" class="nav_link"> 
                        <i class="fa fa-tasks" aria-hidden="true" style="font-size: 20px;"></i> <span class="nav_name">Application Status</span> 
                    </a>
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 20px;"></i><span class="nav_name">SignOut</span> </a>
        </nav>
</div>