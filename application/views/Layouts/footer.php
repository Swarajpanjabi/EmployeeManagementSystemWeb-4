
<div class="d-flex flex-column h-100">
    <!-- FOOTER -->
    <!-- <footer class="w-100 py-4 flex-shrink-0" style="background-color: #212529;"> -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">FB.</h5>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="#">Bootstrapious.com</a></p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-">
                    <h5 class="text-white mb-3">Newsletter</h5>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- -------------------------------------Footer End------------------------------- -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>


<script src="<?= base_url();?>/public/cas_assets/header.js"></script>
<script src="<?= base_url();?>/public/cas_assets/form.js"></script>
<script src="<?= base_url();?>/public/cas_assets/status.js"></script>
<script src="<?= base_url();?>/public/cas_assets/modal.js"></script>
<script src="<?= base_url();?>/public/cas_assets/statusModal.js"></script>
<script src="<?= base_url(); ?>/public/cas_assets/rejectmodal.js"></script>

<script>
    $(document).ready(function() {

        $("#send").click(function() {

            var email = $('#email').val();

            // $("#email").prop('disabled', true)
            if ($('#email').val()) {

                $("#send").css("display", "none");
                $("#verify").css("display", "block");
                $("#otp").css("display", "block");
                $.ajax({
                    url: "<?php echo base_url(); ?>cascontroller/formcontroller/otp",
                    method: "POST",
                    data: {
                        email: email
                    },
                    error: function() {
                        alert("Error");
                    },
                    success: function(data) {
                        alert("Email has been sent to the given Email Address");
                        alert(data);
                    }
                });
            } else {
                alert("Please enter your email address");
            }

        });

        $("#verify").click(function() {

            var email = $('#email').val();
            var otp = $('#otp').val();

            $.ajax({
                url: "<?php echo base_url(); ?>cascontroller/formcontroller/verifyotp",
                method: "POST",
                data: {
                    email: email,
                    otp: otp
                },
                error: function() {
                    alert("Error");
                },
                success: function(data) {
                    if (data == 'success') {
                        $("#otp").css("display", "none");
                        $("#verify").css("display", "none");
                        $("#verified").css("display", "block");
                        alert("Verified");
                        // $("#email").prop('disabled', true);
                    } else {
                        alert("Wrong Otp");
                    }

                }
            });
        });

    });
</script>


</body>
</html>
