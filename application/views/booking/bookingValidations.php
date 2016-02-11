<script>
    $(function () {
        /** More option start **/
        $(".flightno .displaymore").click(function () {
            x = y = 0;
            $(this).closest("tr").nextAll("tr").each(function () {
                x++;
                if ($(this).hasClass("hd1")) {
                    if (y != 1) {
                        $(this).toggle();
                    }
                } else {
                    if (x != 1) {
                        y = 1;
                    }
                }

            });
        });
        /** More Option end**/
        <?php
        if(auth()->is_logged()) {
        ?>
        $(".step2").show();
        $(".step1,.step3").hide();
        $(".checkout-page__sidebar li").addClass("current");
        $(".checkout-page__sidebar li:first,.checkout-page__sidebar li:last").removeClass("current");
        $("#firstname").val('<?= auth()->get('firstname') ?>');
        $("#lastname").val('<?= auth()->get('lastname') ?>');
        $("#phone").val('<?= auth()->get('phone') ?>');
        $("#street_address").val('<?= auth()->get('address') ?>');
        $("#city").val('<?= auth()->get('city') ?>');
        $("#state").val('<?= auth()->get('state') ?>');
        $("#zipcode").val('<?= auth()->get('zipcode') ?>');
        $("#country").val('<?= auth()->get('country') ?>');
        if ('<?= auth()->get('gender') ?>' == 'Female') {
            $('#adt_sex2').prop('checked', true);
        }
        else {
            $('#adt_sex1').prop('checked', true);
        }
        dob = '<?= auth()->get('dob') ?>';
        if (dob != '' && dob != '0000-00-00') {
            dob_date = dob.split('-');
            new_dob = dob_date[1] + '-' + dob_date[2] + '-' + dob_date[0];
        }
        else {
            dob_date = new Date();
            new_dob = (dob_date.getMonth() + 1) + '-' + dob_date.getDate() + '-' + (dob_date.getFullYear() - 13);
        }


        $("#adt-dob0").val(new_dob);
        $("#email").val('<?= auth()->get('email') ?>');
        <?php
        }
        ?>


        var date = new Date();
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        adt = chd = inf = 0;
        $("#booking-details .step2 .formadult").each(function () {
            adtval = $(this).find(".dob").attr("id");
            $("form #" + adtval).datepicker({
                dateFormat: 'mm-dd-yy',
                minDate: '-100y',
                maxDate: '-13y',
                yearRange: '-100y:-13y',
                changeYear: true,
                changeMonth: true

            });
        });

        $("#booking-details .step2 .formchild").each(function () {
            chdval = $(this).find(".dob").attr("id");
            $("form #" + chdval).datepicker({
                dateFormat: 'mm-dd-yy',
                minDate: '-100y',
                maxDate: new Date(),
                yearRange: '-100y:' + new Date(),
                changeYear: true,
                changeMonth: true
            });
        });

        $("#booking-details .step2 .forminfant").each(function () {
            infval = $(this).find(".dob").attr("id");
            $("form #" + infval).datepicker({
                dateFormat: 'mm-dd-yy',
                minDate: '-100y',
                maxDate: new Date(),
                yearRange: '-100y:' + new Date(),
                changeYear: true,
                changeMonth: true
            });
        });

    });

    log = "user";
    pay = "card";

    $("#logg").click(function () {
        $("#logg1").show();
        $("#logg").hide();
        log = "user";
    });
    $("#logg1").click(function () {
        $("#logg").show();
        $("#logg1").hide();
        log = "guest";
    });


    $(".pay_card").click(function () {
        $(".cc-form").show();
        pay = "card";
    });
    $(".pay_cash").click(function () {
        $(".cc-form").hide();
        pay = "cash";
    });


    $("#step1").click(function () {
        email_format = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        emailid1 = $("#emailid1").val();
        emailid = $("#emailid").val();
        password = $("#password").val();
        error = 0;


        if (log == "user") {
            if (emailid1 == "" || emailid1.trim() == "") {
                error = 1;
                $("#emailid1").css("border", "1px solid red");
                $(".emailid1").text("<?php echo $this->lang->line('email_required'); ?>");
            } else if (!emailid1.match(email_format)) {
                error = 1;
                $("#emailid1").css("border", "1px solid red");
                $(".emailid1").text("<?php echo $this->lang->line('email_error'); ?>");
            } else {
                $("#emailid1").css("border", "1px solid #cccccc");
                $(".emailid1").text("");
            }

            if (password == "" || password.trim() == "") {
                error = 1;
                $("#password").css("border", "1px solid red");
                $(".password").text("<?php echo $this->lang->line('password_required'); ?>");
            } else {
                $("#password").css("border", "1px solid #cccccc");
                $(".password").text("");
            }
        } else {
            if (emailid == "" || emailid.trim() == "") {
                error = 1;
                $("#emailid").css("border", "1px solid red");
                $(".emailid").text("<?php echo $this->lang->line('email_required'); ?>");
            } else if (!emailid.match(email_format)) {
                error = 1;
                $("#emailid").css("border", "1px solid red");
                $(".emailid").text("<?php echo $this->lang->line('email_error'); ?>");
            } else {
                $("#emailid").css("border", "1px solid #cccccc");
                $(".emailid").text("");
            }
        }


        if (error == 1) return false;
        else {
            if (emailid1) {
                $.ajax({
                    url: "<?php echo base_url('auth/loginAjax', get_protocol())?>",
                    type: "post", data: {email: emailid1, password: password},
                    success: function (data) {
                        if (data == '<?php echo $this->lang->line('email_invalid'); ?>' || data == '<?php echo $this->lang->line('password_invalid'); ?>' || data == '<?php echo $this->lang->line('activation_error'); ?>') {
                            $(".emailid1").text(data);
                        }
                        else {
                            json = JSON.parse(data);
                            if (json[0].cash_option == 1) $(".cashoption").show();

                            $("#firstname").val(json[0].firstname);
                            $("#lastname").val(json[0].lastname);
                            $("#phone").val(json[0].phone);
                            if (json[0].gender == 'Female') {
                                $('#adt_sex2').prop('checked', true);
                            }
                            else {
                                $('#adt_sex1').prop('checked', true);
                            }
                            dob_date = json[0].dob.split('-');

                            new_dob = dob_date[1] + '-' + dob_date[2] + '-' + dob_date[0];
                            $("#adt-dob0").val(new_dob);
                            $("#email").val(json[0].email);
                            $("#street_address").val(json[0].address);
                            $("#city").val(json[0].city);
                            $("#state").val(json[0].state);
                            $("#zipcode").val(json[0].zipcode);
                            $("#country").val(json[0].country);
                            $(".step2").show();
                            $(".step1,.step3").hide();
                            $(".checkout-page__sidebar li").addClass("current");
                            $(".checkout-page__sidebar li:first,.checkout-page__sidebar li:last").removeClass("current");
                        }
                    }

                });
            }
            else {
                $.ajax({
                    url: "<?php echo base_url('auth/registrationAjax', get_protocol())?>",
                    type: "post",
                    data: {email: emailid},
                    success: function (data) {
                        if (data == 'Success') {
                            $(".step2").show();
                            $(".step1,.step3").hide();
                            $(".checkout-page__sidebar li").addClass("current");
                            $(".checkout-page__sidebar li:first,.checkout-page__sidebar li:last").removeClass("current");
                        }
                        else {
                            $(".emailid").text(data);
                        }
                    }

                });
            }
        }


    });

    $("#cancel2").click(function () {
        $(".step1").show();
        $(".step2,.step3").hide();
    });
    $("#cancel3").click(function () {
        $(".step2").show();
        $(".step1,.step3").hide();
        $(".checkout-page__sidebar li").addClass("current");
        $(".checkout-page__sidebar li:first,.checkout-page__sidebar li:last").removeClass("current");
    });


    $("#payment_button").click(function () {
        if (pay == "card") {
            var date = new Date();
            var currentMonth = date.getMonth();
            var currentDate = date.getDate();
            var currentYear = date.getFullYear();
            space_name_format = /^[a-zA-Z ]+$/;
            name_card = $("#name_card").val();
            card = $("#card").val();
            cvv = $("#cvv").val();
            edate = $("#edate").val();
            expiryDateArray = edate.split(' / ');
            expireMonth = expiryDateArray[0];
            expireYear = expiryDateArray[1];
            street_address = $("#street_address").val();
            city = $("#city").val();
            state = $("#state").val();
            zipcode = $("#zipcode").val();
            country = $("#country").val();
            country_format = /^[a-zA-Z ]+$/;

            error = 0;
            if (card == "" || card.trim() == "") {
                error = 1;
                $("#card").css("border", "1px solid red");
                $(".card").text("<?php echo $this->lang->line('card_required'); ?>");
            } else if (card.length >= 23 || card.length <= 13) {
                error = 1;
                $("#card").css("border", "1px solid red");
                $(".card").text("<?php echo $this->lang->line('card_error'); ?>");
            }
            else {

                $("#card").css("border", "1px solid #cccccc");
                $(".card").text("");
            }

            if (cvv == "" || cvv.trim() == "") {
                error = 1;
                $("#cvv").css("border", "1px solid red");
                $(".cvv").text("<?php echo $this->lang->line('cvv_required'); ?>");
            } else if (cvv.length != 3 && cvv.length != 4) {
                error = 1;
                $("#cvv").css("border", "1px solid red");
                $(".cvv").text("<?php echo $this->lang->line('cvv_valid'); ?>");
            } else {
                $("#cvv").css("border", "1px solid #cccccc");
                $(".cvv").text("");
            }
            if (name_card == "" || name_card.trim() == "") {
                error = 1;
                $("#name_card").css("border", "1px solid red");
                $(".name_card").text("<?php echo $this->lang->line('name_required'); ?>");
            } else if (!name_card.match(space_name_format)) {
                error = 1;
                $("#name_card").css("border", "1px solid red");
                $(".name_card").text("<?php echo $this->lang->line('name_valid'); ?>");
            } else if (!(name_card.length <= 50)) {
                error = 1;
                $("#name_card").css("border", "1px solid red");
                $(".name_card").text("<?php echo $this->lang->line('name_length'); ?>");
            } else {
                $("#name_card").css("border", "1px solid #cccccc");
                $(".name_card").text("");
            }

            if (edate == "" || edate.trim() == "") {
                error = 1;
                $("#edate").css("border", "1px solid red");
                $(".edate").text("<?php echo $this->lang->line('expiry_date_required'); ?>");
            } else if (!(edate.length == 9)) {
                error = 1;
                $("#edate").css("border", "1px solid red");
                $(".edate").text("<?php echo $this->lang->line('expiry_date_error'); ?>");
            }
            else if (expireMonth > 12 || expireYear > currentYear + 20 || expireYear < currentYear || (currentYear == expireYear && currentMonth > expireMonth)) {
                error = 1;
                $("#edate").css("border", "1px solid red");
                $(".edate").text("<?php echo $this->lang->line('expiry_date_error'); ?>");
            }
            else {
                $("#edate").css("border", "1px solid #cccccc");
                $(".edate").text("");
            }


            if (street_address == "" || street_address.trim() == "") {
                error = 1;
                $("#street_address").css("border", "1px solid red");
                $(".street_address").text("<?php echo $this->lang->line('street_address_required'); ?>");
            }
            else {
                $("#street_address").css("border", "1px solid #cccccc");
                $(".street_address").text("");
            }

            if (city == "" || city.trim() == "") {
                error = 1;
                $("#city").css("border", "1px solid red");
                $(".city").text("<?php echo $this->lang->line('city_required'); ?>");
            }
            else {
                $("#city").css("border", "1px solid #cccccc");
                $(".city").text("");
            }

            if (state == "" || state.trim() == "") {
                error = 1;
                $("#state").css("border", "1px solid red");
                $(".state").text("<?php echo $this->lang->line('state_required'); ?>");
            }
            else {
                $("#state").css("border", "1px solid #cccccc");
                $(".state").text("");
            }

            if (zipcode == "" || zipcode.trim() == "") {
                error = 1;
                $("#zipcode").css("border", "1px solid red");
                $(".zipcode").text("<?php echo $this->lang->line('zipcode_required'); ?>");
            }
            else {
                $("#zipcode").css("border", "1px solid #cccccc");
                $(".zipcode").text("");
            }

            if (country == "" || country.trim() == "") {
                error = 1;
                $("#country").css("border", "1px solid red");
                $(".country").text("<?php echo $this->lang->line('country_required'); ?>");
            } else if (!name_card.match(country_format)) {
                error = 1;
                $("#country").css("border", "1px solid red");
                $(".country").text("<?php echo $this->lang->line('only_latin_characters'); ?>");
            }
            else {
                $("#country").css("border", "1px solid #cccccc");
                $(".country").text("");
            }


            if (error == 1) {
                return false;
            } else {
                $(".sale-flights-section-demo,header,footer,.awe-search-tabs,.filter-page__content,.page-sidebar,.menu-list").css("display", "none");
                $("head").html("");
                $("#preloader-search,.preloader").css("display", "block");
                $(".preloader:after,#probar,.whitebg,.checkout-page__sidebar,.checkout-section-demo").css("display", "none");
                $(".loading_item").css("font-size", "25px");
                $("nav").css("height", "0px");

            }
        } else {
            $(".sale-flights-section-demo,header,footer,.awe-search-tabs,.filter-page__content,.page-sidebar,.menu-list").css("display", "none");
            $("head").html("");
            $("#preloader-search,.preloader").css("display", "block");
            $(".preloader:after,#probar,.whitebg,.checkout-page__sidebar,.checkout-section-demo").css("display", "none");
            $(".loading_item").css("font-size", "25px");
            $("nav").css("height", "0px");
        }


    });

    $("#step2,#submit").click(function () {
        error = 0;
        i = 0;
        totalFare = $(".booking-item-price").text();
        totalfareAmt = totalFare.substring(3);
        $("#totalFareamt").val(totalFare);
        $("#booking-details .step2 .formvalid").each(function () {
            firstname = $(this).find("#firstname").val();
            lastname = $(this).find("#lastname").val();
            dob = $(this).find(".dob").val();
            email = $("#email").val();
            phone = $("#phone").val();
            name_format = /^[a-zA-Z]+$/;
            space_name_format = /^[a-zA-Z ]+$/;
            email_format = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            number_format = /^[0-9]+$/;

            //First Name
            if (firstname == "" || firstname.trim() == "") {
                error = 1;
                $(this).find("#firstname").css("border", "1px solid red");
                $(this).find(".firstname").text("<?php echo $this->lang->line('first_name_required'); ?>");
            } else if (!firstname.match(space_name_format)) {
                error = 1;
                $(this).find("#firstname").css("border", "1px solid red");
                $(this).find(".firstname").text("<?php echo $this->lang->line('first_name_error'); ?>");
            } else if (!(firstname.length <= 15)) {
                error = 1;
                $(this).find("#firstname").css("border", "1px solid red");
                $(this).find(".firstname").text("<?php echo $this->lang->line('first_name_characters'); ?>");
            } else {
                $(this).find("#firstname").css("border", "1px solid #cccccc");
                $(this).find(".firstname").text("");
            }
            //Last Name

            if (lastname == "" || lastname.trim() == "") {
                error = 1;
                $(this).find("#lastname").css("border", "1px solid red");
                $(this).find(".lastname").text("<?php echo $this->lang->line('last_name_required'); ?>");
            } else if (lastname != "" || lastname.trim() != "") {
                if (!lastname.match(space_name_format)) {
                    error = 1;
                    $(this).find("#lastname").css("border", "1px solid red");
                    $(this).find(".lastname").text("<?php echo $this->lang->line('last_name_error'); ?>");
                } else if (!(lastname.length <= 15)) {
                    error = 1;
                    $(this).find("#lastname").css("border", "1px solid red");
                    $(this).find(".lastname").text("<?php echo $this->lang->line('first_name_characters'); ?>");
                } else {
                    $(this).find("#lastname").css("border", "1px solid #cccccc");
                    $(this).find(".lastname").text("");
                }
            } else {
                $(this).find("#lastname").css("border", "1px solid #cccccc");
                $(this).find(".lastname").text("");
            }
            //Dob
            if (dob == "") {
                error = 1;
                $(this).find(".dob").css("border", "1px solid red");
                $(this).find(".dobn").text("<?php echo $this->lang->line('dob_required'); ?>");
            } else {
                $(this).find(".dob").css("border", "1px solid #cccccc");
                $(this).find(".dobn").text("");
            }
            //Email
            if (email == "") {
                error = 1;
                $("#email").css("border", "1px solid red");
                $(".email").text("<?php echo $this->lang->line('email_required'); ?>");
            } else if (!email.match(email_format)) {
                error = 1;
                $("#email").css("border", "1px solid red");
                $(".email").text("<?php echo $this->lang->line('email_error'); ?>");
            } else {
                $("#email").css("border", "1px solid #cccccc");
                $(".email").text("");
            }

            //Phone
            if (phone == "") {
                error = 1;
                $("#phone").css("border", "1px solid red");
                $(".phone").text("<?php echo $this->lang->line('phone_required'); ?>");
            } else if (!phone.match(number_format)) {
                error = 1;
                $("#phone").css("border", "1px solid red");
                $(".phone").text("<?php echo $this->lang->line('only_numbers'); ?>");
            } else if (!(phone.length >= 10 && phone.length <= 13)) {
                error = 1;
                $("#phone").css("border", "1px solid red");
                $(".phone").text("<?php echo $this->lang->line('phone_length_error'); ?>");
            } else {
                $("#phone").css("border", "1px solid #cccccc");
                $(".phone").text("");
            }

        });

        if (error == 1) return false;
        else {
            $(".step3").show();
            $(".step1,.step2").hide();
            $(".checkout-page__sidebar li").removeClass("current");
            $(".checkout-page__sidebar li:last").addClass("current");
        }
    });

</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.mask.min.js', get_protocol()); ?>"></script>

<script type="text/javascript">
    $(function () {
        $('#card').mask('0000 0000 0000 0000');
        $('#edate').mask('00 / 0000');
        $('#cvv').mask('0000');
    });

</script>

