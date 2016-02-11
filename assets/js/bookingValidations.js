$(function () {

    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    adt = chd = inf = 0;
    $("ul.booking-item-passengers.step2 li.type-adt").each(function () {
        adtval = $(this).find(".dob").attr("id");
        $("form #" + adtval).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-12Y",
            minDate: "-100Y",
            yearRange: "-100:-12"
        });
    });

    $("ul.booking-item-passengers.step2 li.type-chd").each(function () {
        chdval = $(this).find(".dob").attr("id");
        $("form #" + chdval).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-2Y",
            minDate: "-12Y",
            yearRange: "-12:-2"
        });
    });

    $("ul.booking-item-passengers.step2 li.type-inf").each(function () {
        infval = $(this).find(".dob").attr("id");
        $("form #" + infval).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            minDate: "-2Y",
            yearRange: "-2:+0"
        });
    });

});

log = "user";

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
            $(".emailid1").text("Email is required");
        } else if (!emailid1.match(email_format)) {
            error = 1;
            $("#emailid1").css("border", "1px solid red");
            $(".emailid1").text("Email is not valid");
        } else {
            $("#emailid1").css("border", "1px solid #cccccc");
            $(".emailid1").text("");
        }

        if (password == "" || password.trim() == "") {
            error = 1;
            $("#password").css("border", "1px solid red");
            $(".password").text("Password is required");
        } else {
            $("#password").css("border", "1px solid #cccccc");
            $(".password").text("");
        }
    } else {
        if (emailid == "" || emailid.trim() == "") {
            error = 1;
            $("#emailid").css("border", "1px solid red");
            $(".emailid").text("Email is required");
        } else if (!emailid.match(email_format)) {
            error = 1;
            $("#emailid").css("border", "1px solid red");
            $(".emailid").text("Email is not valid");
        } else {
            $("#emailid").css("border", "1px solid #cccccc");
            $(".emailid").text("");
        }
    }


    if (error == 1) return false;
    else if (log == "guest") {
        $(".step2").show();
        $(".step1,.step3").hide();
        $('.head1').attr('id', 'colortick');
        $('.tick1').show();
        $('.head2').attr('id', 'color1');
        $('.head3').attr('id', 'color1abcomp');
        return true;
    }
    else {
        $.ajax({
            url: "<?php echo base_url('index.php/Auth/loginAjax')?>",
            type: "post",
            data: {email: emailid1, password: password},
            success: function (data) {
                if (data == 'Success') {
                    $(".step2").show();
                    $(".step1,.step3").hide();
                    $('.head1').attr('id', 'colortick');
                    $('.tick1').show();
                    $('.head2').attr('id', 'color1');
                    $('.head3').attr('id', 'color1abcomp');
                }
                else {
                    $(".emailid1").text(data);
                }
            }

        });

    }
});

$("#cancel2").click(function () {
    $(".step1").show();
    $(".step2,.step3").hide();
    $('.head1').attr('id', 'color1');
    $('.tick1').hide();
    $('.head2').attr('id', 'color1abcomp');
    $('.tick2').hide();
    $('.head3').attr('id', 'color1abcomp');
    $('.tick3').hide();
});
$("#cancel3").click(function () {
    $(".step2").show();
    $(".step1,.step3").hide();
    $('.head1').attr('id', 'colortick');
    $('.tick1').show();
    $('.head2').attr('id', 'color1');
    $('.tick2').hide();
    $('.head3').attr('id', 'color1abcomp');
    $('.tick3').hide();
});
$(".pay_card").click(function () {
    $(".cc-form").show();
});
$(".pay_cash").click(function () {
    $(".cc-form").hide();
});

$("#payment_button").click(function () {
    space_name_format = /^[a-zA-Z ]+$/;
    name_card = $("#name_card").val();
    card = $("#card").val();
    cvv = $("#cvv").val();
    edate = $("#edate").val();
    address = $("#address").val();

    if (card == "" || card.trim() == "") {
        $("#card").css("border", "1px solid red");
        $(".card").text("Card number is required");
    } else if (card.length != 19) {
        $("#card").css("border", "1px solid red");
        $(".card").text("Plese enter valid card number");
    } else {
        $("#card").css("border", "1px solid #cccccc");
        $(".card").text("");
    }
    if (cvv == "" || cvv.trim() == "") {
        $("#cvv").css("border", "1px solid red");
        $(".cvv").text("CVV number is required");
    } else if (cvv.length != 3 && cvv.length != 4) {
        $("#cvv").css("border", "1px solid red");
        $(".cvv").text("Plese enter valid cvv number");
    } else {
        $("#cvv").css("border", "1px solid #cccccc");
        $(".cvv").text("");
    }

    if (name_card == "" || name_card.trim() == "") {
        $("#name_card").css("border", "1px solid red");
        $(".name_card").text("Name of the is required");
    } else if (!name_card.match(space_name_format)) {
        $("#name_card").css("border", "1px solid red");
        $(".name_card").text("Name of the must be alphabets");
    } else if (!(name_card.length <= 50)) {
        $("#name_card").css("border", "1px solid red");
        $(".name_card").text("Cannot exceed 50 Characters");
    } else {
        $("#name_card").css("border", "1px solid #cccccc");
        $(".name_card").text("");
    }

    if (edate == "" || edate.trim() == "") {
        $("#edate").css("border", "1px solid red");
        $(".edate").text("Name of the is required");
    } else if (!(edate.length == 9)) {
        $("#edate").css("border", "1px solid red");
        $(".edate").text("Enter valid date");
    } else {
        $("#edate").css("border", "1px solid #cccccc");
        $(".edate").text("");
    }

    if (address == "" || address.trim() == "") {
        $("#address").css("border", "1px solid red");
        $(".address").text("Address is required");
    }
    return false;

});

$("#step2,#submit").click(function () {
    error = 0;
    i = 0;

    $("ul.booking-item-passengers.step2 li").each(function () {
        firstname = $(this).find("#firstname").val();
        lastname = $(this).find("#lastname").val();
        dob = $(this).find(".dob").val();
        email = $(this).find("#email").val();
        phone = $(this).find("#phone").val();
        name_format = /^[a-zA-Z]+$/;
        space_name_format = /^[a-zA-Z ]+$/;
        email_format = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        number_format = /^[0-9]+$/;

        //First Name
        if (firstname == "" || firstname.trim() == "") {
            error = 1;
            $(this).find("#firstname").css("border", "1px solid red");
            $(this).find(".firstname").text("First Name is required");
        } else if (!firstname.match(space_name_format)) {
            error = 1;
            $(this).find("#firstname").css("border", "1px solid red");
            $(this).find(".firstname").text("First Name must be alphabets");
        } else if (!(firstname.length <= 50)) {
            error = 1;
            $(this).find("#firstname").css("border", "1px solid red");
            $(this).find(".firstname").text("Cannot exceed 50 Characters");
        } else {
            $(this).find("#firstname").css("border", "1px solid #cccccc");
            $(this).find(".firstname").text("");
        }
        //Last Name

        if (lastname != "" || lastname.trim() != "") {
            if (!lastname.match(space_name_format)) {
                error = 1;
                $(this).find("#lastname").css("border", "1px solid red");
                $(this).find(".lastname").text("Last Name must be alphabets");
            } else if (!(lastname.length >= 1 && lastname.length <= 50)) {
                error = 1;
                $(this).find("#lastname").css("border", "1px solid red");
                $(this).find(".lastname").text("Cannot exceed 50 Characters");
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
            $(this).find("#dob").css("border", "1px solid red");
            $(this).find(".dob").text("Date of Birth is required");
        } else {
            $(this).find("#dob").css("border", "1px solid #cccccc");
            $(this).find(".dob").text("");
        }
        //Email
        if (email == "") {
            error = 1;
            $(this).find("#email").css("border", "1px solid red");
            $(this).find(".email").text("Email is required");
        } else if (!email.match(email_format)) {
            error = 1;
            $(this).find("#email").css("border", "1px solid red");
            $(this).find(".email").text("Enter Valid Email");
        } else {
            $(this).find("#email").css("border", "1px solid #cccccc");
            $(this).find(".email").text("");
        }

        //Phone
        if (phone == "") {
            error = 1;
            $(this).find("#phone").css("border", "1px solid red");
            $(this).find(".phone").text("Phone No is required");
        } else if (!phone.match(number_format)) {
            error = 1;
            $(this).find("#phone").css("border", "1px solid red");
            $(this).find(".phone").text("Only numbers are accepted");
        } else if (!(phone.length >= 10 && phone.length <= 13)) {
            error = 1;
            $(this).find("#phone").css("border", "1px solid red");
            $(this).find(".phone").text("Phone No length between 10 to 13");
        } else {
            $(this).find("#phone").css("border", "1px solid #cccccc");
            $(this).find(".phone").text("");
        }

    });

    if (error == 1) return false;
    else {
        $(".step3").show();
        $(".step1,.step2").hide();
        $('.head1').attr('id', 'colortick');
        $('.tick1').show();
        $('.head2').attr('id', 'colortick');
        $('.tick2').show();
        $('.head3').attr('id', 'color1');
    }

});
