<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: rgba(71, 35, 217, 0.4);
        }

        img {
            height: 230px;
            width: 450px;
            transition: all 0.5s ease;
        }

        img:hover {
            transform: scale(3);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .modal2 {
            display: none;
            /*Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 2000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            /*overflow: auto;*/
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            animation-name: fadeIn;
            animation-duration: 0.4s
        }

        .modal-content2 {
            position: relative;
            top: 35%;
            left: 13%;
            width: 855px;
        }

        .modal-body2 {
            width: 100%;
            background: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 50px 35px 10px 35px;
        }

        .close2 {
            position: absolute;
            top: 5px;
            left: 34px;
        }
        
    </style>

    <title>View</title>

</head>

<body>
    <?php foreach ($view->result() as $row) : ?>

        <div class="container mt-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <a class="btn btn-danger me-md-2" type="button" href="<?= base_url('cascontroller/formcontroller/principal'); ?>">Back</a>
            </div>
        </div>

        <div class="container bg-white" style="margin-top:50px;padding: 20px;border-radius: 10px;border: 1px solid #000;">
            <h2> Personal Details </h2>
            <hr>
            <div class="row">
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Name</h5>
                        <h7><?= $row->Firstname ?> <?= $row->Middlename ?> <?= $row->Surname ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Email</h5>
                        <h7><?= $row->Email ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Phone No.</h5>
                        <h7><?= $row->Phone ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Designation</h5>
                        <h7><?= $row->Designation ?></h7>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>DOB</h5>
                        <h7><?= $row->DOB ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Age</h5>
                        <h7><?= $row->Age ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Gender</h5>
                        <h7><?= $row->Gender ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>DOJ</h5>
                        <h7><?= $row->DOJ ?></h7>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Sevarth Id</h5>
                        <h7><?= $row->EmployeeCode ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Branch</h5>
                        <h7><?= $row->Branch ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="d-flex flex-column">
                        <h5>Address</h5>
                        <h7><?= $row->Address ?></h7>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>State</h5>
                        <h7><?= $row->State ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>City</h5>
                        <h7><?= $row->City ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Taluka</h5>
                        <h7><?= $row->Taluka ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Pincode</h5>
                        <h7><?= $row->Pincode ?> </h7>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-white" style="margin-top:100px;padding: 20px;border-radius: 10px;border: 1px solid #000;">
            <h2> Professional Details </h2>
            <hr>
            <div class="row">
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>Date Of Probession</h5>
                        <h7><?= $row->Probession ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5>GR No.</h5>
                        <h7><?= $row->GRNo ?></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5></h5>
                        <h7></h7>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <h5></h5>
                        <h7></h7>
                    </div>
                </div>
            </div>

        </div>

        <div class="container bg-white" style="margin-top:100px;padding: 20px;border-radius: 10px;border: 1px solid #000;">
            <h2> Previous Service Details </h2>
            <hr>
            <?php $strInsName = $row->InstituteName; ?>
            <?php $arrInsName = explode(',', $strInsName); ?>

            <?php $strServiceStartDate = $row->ServiceStartDate; ?>
            <?php $arrServiceStartDate = explode(',', $strServiceStartDate); ?>

            <?php $strServiceEndDate = $row->ServiceEndDate; ?>
            <?php $arrServiceEndDate = explode(',', $strServiceEndDate); ?>

            <?php $strProof = $row->Proof; ?>
            <?php $arrProof = explode(',', $strProof); ?>

            <?php $count = count($arrInsName); ?>
            <table class="table table-striped">
                <thead style="background-color: #5f27cd;">
                    <tr>
                        <th scope="col" class="text-white" style="width: 75px;">Sr No.</th>
                        <th scope="col" class="text-white">Institute Name</th>
                        <th scope="col" class="text-white">Service Start Date</th>
                        <th scope="col" class="text-white">Service End Date</th>
                        <th scope="col" class="text-white">Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $arrInsName[$i]; ?></td>
                            <td><?= $arrServiceStartDate[$i]; ?></td>
                            <td><?= $arrServiceEndDate[$i]; ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View Document
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url('/uploads/'); ?><?= $arrProof[$i] ?>" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <div class="container bg-white" style="margin-top:100px;padding: 20px;border-radius: 10px;border: 1px solid #000;">
            <h2> Training Details </h2>
            <hr>
            <?php $strTrainingName = $row->TrainingName; ?>
            <?php $arrTrainingName = explode(',', $strTrainingName); ?>

            <?php $strSponsoredBy = $row->SponsoredBy; ?>
            <?php $arrSponsoredBy = explode(',', $strSponsoredBy); ?>

            <?php $strType = $row->Type; ?>
            <?php $arrType = explode(',', $strType); ?>

            <?php $strDuration = $row->Duration; ?>
            <?php $arrDuration = explode(',', $strDuration); ?>

            <?php $strStartDate = $row->StartDate; ?>
            <?php $arrStartDate = explode(',', $strStartDate); ?>

            <?php $strEndDate = $row->EndDate; ?>
            <?php $arrEndDate = explode(',', $strEndDate); ?>

            <?php $count1 = count($arrTrainingName); ?>
            <table class="table table-striped">
                <thead style="background-color: #5f27cd;">
                    <tr>
                        <th scope="col" class="text-white" style="width: 75px;">Sr No.</th>
                        <th scope="col" class="text-white">Training Name</th>
                        <th scope="col" class="text-white">Sponsored By</th>
                        <th scope="col" class="text-white">Type</th>
                        <th scope="col" class="text-white">Duration</th>
                        <th scope="col" class="text-white">Start Date</th>
                        <th scope="col" class="text-white">End Date</th>
                        <th scope="col" class="text-white">Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $count1; $i++) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $arrTrainingName[$i]; ?></td>
                            <td><?= $arrSponsoredBy[$i]; ?></td>
                            <td><?= $arrType[$i]; ?></td>
                            <td><?= $arrDuration[$i]; ?></td>
                            <td><?= $arrStartDate[$i]; ?></td>
                            <td><?= $arrEndDate[$i]; ?></td>
                            <td><?= "Proof"; ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <div class="container bg-white" style="margin-top:100px;padding: 20px;border-radius: 10px;border: 1px solid #000;">
            <h2> CR Details </h2>
            <hr>
            <?php $strCRStartDate = $row->CRStartDate; ?>
            <?php $arrCRStartDate = explode(',', $strCRStartDate); ?>

            <?php $strCREndDate = $row->CREndDate; ?>
            <?php $arrCREndDate = explode(',', $strCREndDate); ?>

            <?php $strGrade = $row->Grade; ?>
            <?php $arrGrade = explode(',', $strGrade); ?>

            <?php $count2 = count($arrGrade); ?>
            <table class="table table-striped">
                <thead style="background-color: #5f27cd;">
                    <tr>
                        <th scope="col" class="text-white" style="width: 75px;">Sr No.</th>
                        <th scope="col" class="text-white">CR Start Date</th>
                        <th scope="col" class="text-white">CR End Date</th>
                        <th scope="col" class="text-white">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $count2; $i++) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $arrCRStartDate[$i]; ?></td>
                            <td><?= $arrCREndDate[$i]; ?></td>
                            <td><?= $arrGrade[$i]; ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <div class="container mt-4 d-grid gap-2 d-md-flex justify-content-center mb-4">
            <?php if ($row->status == '0') : ?>
                <a class="btn btn-success" style="width:125px;" type="button" href="<?= base_url('cascontroller/formcontroller/updateStatus/' . $row->Id . '/' . $row->Email); ?>">Approve</a>
                <button type="button" class="btn btn-danger" style="width:125px;" id="reject" value="Reject">Reject</button>
            <?php elseif ($row->status == '5') : ?>
                <a class="btn btn-danger" style="width:125px;" type="button" href="#">Rejected</a>
            <?php else : ?>
                <a class="btn btn-success" style="width:125px;" type="button">Approved</a>
                <a class="btn btn-danger" style="width:125px;" type="button" href="<?= base_url('cascontroller/formcontroller/revertPrincipal/' . $row->Id) ?>">Revert</a>
            <?php endif ?>
        </div>


        <!-- <input type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Reject"/> -->

        <!-- Modal -->
        <div class="modal2" id="modal2">
            <div class="modal-content2">
                <?= form_open('cascontroller/formcontroller/principalreject/' . $row->Id); ?>
                <div class="modal-body2">
                    <h5>Reject Reason</h5>
                    <span class="close2" style="font-size:30px;cursor:pointer">&times;</span>
                    <input type="text" class="form-control mt-4" name="message">
                    <input type="submit" class="btn btn-danger mt-4" value="Reject"></input>
                </div>
                <?= form_close(); ?>
            </div>
        </div>

        <div class="container" style="padding-top: 100px">
        </div>

    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        // Get the modal
        var modal2 = document.getElementById("modal2");

        // When the user clicks the button, open the modal 
        var btn2 = document.getElementById("reject");

        // Get the <span> element that closes the modal
        var span2 = document.getElementsByClassName("close2")[0];


        btn2.onclick = function() {
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span2.onclick = function() {
            modal2.style.display = "none";
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>
</body>

</html>