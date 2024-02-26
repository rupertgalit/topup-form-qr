<?php $this->load->view('dash-partial/header'); ?>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation-->
        <?php $this->load->view('dash-partial/nav'); ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="welcome-message">
                        <p>Welcome,
                            <?= $this->session->userdata('fullname'); ?>
                        </p>
                    </div>
                    <h1 class="page-header">Update Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <link rel="stylesheet" type="text/css"
                href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            </link>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
            <div class="container">
                <script src="<?= base_url("assets/js/update-form.js"); ?>"></script>
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>

                <form class="well form-horizontal" action=" " method="post" id="contact_form">
                    <fieldset>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Account Number</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="glyphicon glyphicon-credit-card"></i></span>
                                    <input name="account_number" placeholder="Account Number" class="form-control"
                                        type="text">
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Bill Number</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                    <input name="bill_number" id="bill_number" placeholder="Bill Number"
                                        class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- Select Basic -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Unpaid month year </label>
                            <!-- Space added after "year" -->
                            <div class="row-md-9">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-calendar"></i></span>
                                        <select name="month" class="form-control selectpicker">
                                            <option value=" "> Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-calendar"></i></span>
                                        <select name="year" class="form-control selectpicker">
                                            <option value=""> Year</option>
                                            <?php
                                            $currentYear = date("Y");
                                            $startYear = $currentYear - 3;
                                            $endYear = $currentYear + 26;
                                            for ($year = $startYear; $year <= $endYear; $year++) {
                                                echo "<option value=\"$year\">$year</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Send <span
                                        class="glyphicon glyphicon-send"></span></button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div><!-- /.container -->
    </div>
    </div>

    <?php $this->load->view('dash-partial/footer'); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

    <script>
        const loader = document.querySelector(".loader-wrapper");
        loader.style.display = "flex";

        setTimeout(function () {
            loader.style.display = "none";
        }, 800);

    </script>
    <script>
        $(document).ready(function () {
            $('#contact_form').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    account_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply the account number'
                            }
                        }
                    },
                    bill_number: {
                        validators: {
                            notEmpty: {
                                message: 'Please supply the bill number'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'The bill number can only consist of numbers'
                            }
                        }
                    },
                    month: {
                        validators: {
                            notEmpty: {
                                message: 'Please select the month'
                            }
                        }
                    },
                    year: {
                        validators: {
                            notEmpty: {
                                message: 'Please select the year'
                            }
                        }
                    }
                }
            })
                .on('success.form.bv', function (e) {
                    $('#success_message').slideDown({ opacity: "show" }, "slow"); // Show success message
                    $('#contact_form').data('bootstrapValidator').resetForm(); // Reset form

                    // Prevent form submission
                    e.preventDefault();

                    // Get the form instance
                    var $form = $(e.target);

                    // Use Ajax to submit form data
                    $.post($form.attr('action'), $form.serialize(), function (result) {
                        console.log(result);
                    }, 'json');
                });

            // Add event listener to input field for numeric validation
            document.getElementById('bill_number').addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, ''); // Replace any non-numeric characters with empty string
            });
        });

    </script>
</body>

</html>