<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/public/assets/style.css">
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
                    <a href="#" class="nav_link "> 
                        <i class="fa fa-th-large" aria-hidden="true" style="font-size: 20px;"></i><span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="<?php echo base_url();?>formcontroller/dto" class="nav_link active1"> 
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 20px;"></i> <span class="nav_name">CAS Applications</span> 
                    </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 20px;"></i><span class="nav_name">SignOut</span> </a>
        </nav>
</div>

<div class="container">
    <h2 class="pt-5 text-white">Cas Applications</h2>
	<div class="container pt-3">
        <div class="tab-content mt-3">
            <div class="tab-pane active" id="Cas_Applications">
                <div class="panel panel-default">
                    <div class="panel-body">
                <?php if(($applications)>0):?>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">Sr No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Employee Code</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php $i = 1; foreach($applications as $applications): ?>
                    <?php if($applications->status == '1' || $applications->status == '2' ||  $applications->status == '3' || $applications->status == '4'): ?>
                    <tr>
                        <td class="align-middle text-center">
                            <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><?= $i;?></div>
                        </td>
                        <td class="text-center align-middle"><?= $applications->Firstname;?> <?= $applications->Middlename;?> <?= $applications->Surname;?></td>
                        <td class="text-center align-middle" ><?= $applications->Email;?></td>
                        <td class="text-center align-middle"><?= $applications->EmployeeCode;?></td>
                        
                        <td class="text-center align-middle">
                        <?php if($applications->status == '1' ) : ?>
                            <a class="text-info" style="margin-right: 10px;padding: 10px;font-size: 18px;text-decoration: none;" id="view_form" href="<?= base_url('cascontroller/formcontroller/viewDetailsdto/'.$applications->Id) ?>" id="view_form"><i class="fa fa-eye" style="margin-right: 10px;" aria-hidden="true"></i>View Form</a>
                        <?php elseif($applications->status == '4'):?>
                            <a class="text-info" style="font-size: 18px;text-decoration: none;" id="view_form" href="<?= base_url('cascontroller/formcontroller/viewDetailsdto/'.$applications->Id) ?>" id="view_form"><i class="fa fa-eye" style="margin-right: 10px;" aria-hidden="true"></i></a>
                            <a class="text-danger"  href="#" style="margin-right: 10px;padding: 10px;font-size: 18px;" id="approved"> <i class="fa fa-times-circle" aria-hidden="true"></i> Rejected</a>
                        <?php else: ?>
                            <a class="text-info" style="font-size: 18px;text-decoration: none;" id="view_form" href="<?= base_url('cascontroller/formcontroller/viewDetailsdto/'.$applications->Id) ?>" id="view_form"><i class="fa fa-eye" style="margin-right: 10px;" aria-hidden="true"></i></a>
                            <a class="text-success"  href="#" style="margin-right: 10px;padding: 10px;font-size: 18px;" id="approved"> <i class="fa fa-check-circle" aria-hidden="true"></i> Approved</a>
                        <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++;?>
                    <?php endif ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php else: ?>
                    <h1 style="padding: 10px;"> NO Records Found </h1>
                <?php endif ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
