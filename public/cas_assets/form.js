$(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                        step: function (now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                });
                                next_fs.css({ 'opacity': opacity });
                        },
                        duration: 500
                });
                setProgressBar(++current);
        });

        $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                        step: function (now) {
                                // for making fielset appear animation
                                opacity = 1 - now;

                                current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                });
                                previous_fs.css({ 'opacity': opacity });
                        },
                        duration: 500
                });
                setProgressBar(--current);
        });

        function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                        .css("width", percent + "%")
        };

        $(".submit").click(function () {
                return false;
        });



        $("#addRow").click(function () {
                var html = '';
                html += '<div class="row mb-4">';
                html += '<div class="form-group col-md-4">';
                html += '<label for="exampleInputPassword3" class="form-label">Institute Name:<span style="color: darkred;"> *</span></label> ';
                html += '<input type="text" class="form-control" id="exampleInputPassword3" name="InstituteName[]" placeholder="Institute Name">';
                // html += '<span class="alert-danger"><?= json_encode(display_error($validation, 'InstituteName'));?></span>';
                html += '</div>';
                html += '<div class="form-group col-md-4">';
                html += '<label class="form-label">Service Starting Date:<span style="color: darkred;"> *</span></label> ';
                html += '<input type="date" name="ServiceStartDate[]" placeholder="Start Date" />';
                html += '</div>';
                html += '<div class="form-group col-md-4">';
                html += '<label class="form-label">Service End Date:<span style="color: darkred;"> *</span></label> ';
                html += '<input type="date" name="ServiceEndDate[]" placeholder="End Date" />';
                html += '</div>';
                html += '</div>';

                html += '<div class="row mb-4">';
                html += '<div class="form-group col-md-6">';
                html += '<label for="upload" class="form-label">Upload Proof Here<span style="color: darkred;"> *</span></label>';
                html += '<input type="file" class="form-control" id="upload" name="userfile[]" multiple>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
        });

        $("#addRow1").click(function () {
                var html = '';
                html += '<div class="row mb-4">';
                html += '<div class="col-md-12">';
                html += '<h4 class="">Training Details</h4>';
                html += '</div>';
                html += '<div class="form-group col-md-4"><label for="trainingname" class="form-label">Training Name<span style="color: darkred;"> *</span></label><input type="text" class="form-control" id="trainingname" name="TrainingName[]" placeholder="Training Name"><span class="text-danger"></span></div>';
                html += '<div class="form-group col-md-4"><label for="sponsoredby" class="form-label">Sponsored By<span style="color: darkred;"> *</span></label><input type="text" class="form-control" id="sponsoredby" name="SponsoredBy[]" placeholder="Sponsored By"><span class="text-danger"></span></div>';
                html += '<div class="form-group col-md-4"><label for="type" class="form-label">Type<span style="color: darkred;"> *</span></label><input type="text" class="form-control" id="type" name="Type[]"><span class="text-danger"><span class="text-danger"></span></div>';
                html += '</div>';

                html += '<div class="row mb-4">';
                html += '<div class="form-group col-md-4"><label for="duration" class="form-label">Duration<span style="color: darkred;"> *</span></label><select class="form-select" name="Duration[]" aria-label="Default select example" id="gender" ><option value>--Select--</option><option value="1 Week">1 Week</option><option value="2 Week">2 Week</option><option value="3 Week">3 Week</option><option value="3 Week">3 Week</option></select></div>';
                html += '<div class="form-group col-md-4"><label for="sd" class="form-label">Start Date<span style="color: darkred;"> *</span></label><input type="date" class="form-control" id="sd" name="StartDate[]" placeholder="Training Start Date"><span class="text-danger"></span></div>';
                html += '<div class="form-group col-md-4"><label for="ed" class="form-label">End Date<span style="color: darkred;"> *</span></label><input type="date" class="form-control" id="ed" name="EndDate[]" placeholder="Training End Date" ><span class="text-danger"></span></div>';
                html += '</div>';

                $('#add').append(html);
        });

        $("#addRow2").click(function () {

                var html = '';

                html += '<div class="row mb-4">';
                html += '<div class="form-group col-md-4"><label for="cred" class="form-label">CR Start Date<span style="color: darkred;"> *</span></label><input type="date" class="form-control" id="crsd" name="CRStartDate[]"><span class="text-danger"></span></div>';
                html += '<div class="form-group col-md-4"><label for="crsd" class="form-label">CR End Date<span style="color: darkred;"> *</span></label><input type="date" class="form-control" id="cred" name="CREndDate[]"><span class="text-danger"></span></div>';
                html += '<div class="form-group col-md-4"><label for="grade" class="form-label">Grade<span style="color: darkred;"> *</span></label><input type="text" class="form-control" id="grade" name="Grade[]" placeholder="Grade"><span class="text-danger"></span></div>';
                html += '</div>';
                []
                $('#add1').append(html);

        });

});


// $(document).on('click', '#removeRow', function () {
//         $(this).closest('#inputFormRow').remove();
//     });