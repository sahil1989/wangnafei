<script type="text/javascript">
    $(document).ready(function () {


        $(".search div").click(function () {
            classname = $(this).attr("class");
            nval = "[data-value='" + classname + "']";
            $("[data-search='" + classname + "']").val($(this).text());
            $("[data-val='" + classname + "']").val($(this).attr("data-value"));
            $(".search").hide();
        });
        $(".form-item #testid").keyup(function () {
            str = $(this).val().toLowerCase();
            $(".search").show();
            attribute = $(this).attr("data-search");
            $("." + attribute).each(function () {
                var ori = $(this).text().toLowerCase();
                var airlineCode = $(this).attr('data-value').toLowerCase();

                if (airlineCode.indexOf(str) >= 0 || ori.indexOf(str) >= 0) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $(".form-item #testid").blur(function () {
            if ($(this).val() == "") {
                attribute = $(this).attr("data-search");
                $("[data-val='" + attribute + "']").val("");
            }
            setTimeout(function () {
                $(".search").hide();
            }, 250);
        });


    });
    $(document).ready(function (e) {

        var airportsArray = $.map(airports, function (value, key) {
            return {
                value: value,
                data: key
            };
        });


        $("#from1,#from2,#from3,#from4,#from5,#to1,#to2,#to3,#to4,#to5").autocomplete({
            lookup: airportsArray,
        });


        $(window).resize(function () {
            if ($(window).width() < 960) {
                $(".nlist4,.sear_his").click(function () {
                    $(".sear_his").toggle();
                });
            } else {
                $(".nlist4,.sear_his").mouseover(function () {
                    $(".sear_his").show();
                });
                $(".nlist4,.sear_his").mouseout(function () {
                    $(".sear_his").hide();
                });
            }
        });

        if ($(window).width() < 960) {
            $(".nlist4,.sear_his").click(function () {
                $(".sear_his").toggle();
            });
        } else {
            $(".nlist4,.sear_his").mouseover(function () {
                $(".sear_his").show();
            });
            $(".nlist4,.sear_his").mouseout(function () {
                $(".sear_his").hide();
            });
        }


        $(".awe-search-tabs ul li a").click(function () {

            if ($(this).text() == "<?php echo $this->lang->line('round_trip'); ?>") {
                n = 1;
                $("#awe-search-tabs-3").show();
                $("#awe-search-tabs-4,#awe-search-tabs-5").hide();
            }
            if ($(this).text() == "<?php echo $this->lang->line('one_way'); ?>") n = 2;
            if ($(this).text() == "<?php echo $this->lang->line('multi_destination'); ?>") n = 3;

            if ($("#from1").val() != "") {
                $("#from" + n).val($("#from1").val());
            }
            if ($("#from2").val() != "") {
                $("#from" + n).val($("#from2").val());
            }
            if ($("#from3").val() != "") {
                $("#from" + n).val($("#from3").val());
            }
            if (n != 1) $("#from1").val("");
            if (n != 2) $("#from2").val("");
            if (n != 3) $("#from3").val("");
            $("#from" + n + ",#to" + n + ",#depdate" + n + ",#airline" + n + ",#cabin" + n + ",#adl" + n + ",#cld" + n + ",#inf" + n + ",#retdate" + n).css("border", "");
            $(".from" + n + ",.to" + n + ",.depdate" + n + ",.airline" + n + ",.cabin" + n + ",.adl" + n + ",.cld" + n + ",.inf" + n + ",.retdate" + n).html("");
            if ($("#to1").val() != "") {
                $("#to" + n).val($("#to1").val());
            }
            if ($("#to2").val() != "") {
                $("#to" + n).val($("#to2").val());
            }
            if ($("#to3").val() != "") {
                $("#to" + n).val($("#to3").val());
            }
            if (n != 1) $("#to1").val("");
            if (n != 2) $("#to2").val("");
            if (n != 3) $("#to3").val("");

            if ($("#depdate1").val() != "") {
                $("#depdate" + n).val($("#depdate1").val());
            }
            if ($("#depdate2").val() != "") {
                $("#depdate" + n).val($("#depdate2").val());
            }
            if ($("#depdate3").val() != "") {
                $("#depdate" + n).val($("#depdate3").val());
            }
            if (n != 1) $("#depdate1").val("");
            if (n != 2) $("#depdate2").val("");
            if (n != 3) $("#depdate3").val("");


            if ($("#airline1").val() != "") {
                $("#airline" + n).val($("#airline1").val());
            }
            else if ($("#airline2").val() != "") {
                $("#airline" + n).val($("#airline2").val());
            }
            else if ($("#airline3").val() != "") {
                $("#airline" + n).val($("#airline3").val());
            }
            if (n != 1) $("#airline1").val("");
            if (n != 2) $("#airline2").val("");
            if (n != 3) $("#airline3").val("");


            if ($("#cabin1").val() != "All") {
                $("#cabin" + n).val($("#cabin1").val());
            }
            if ($("#cabin2").val() != "All") {
                $("#cabin" + n).val($("#cabin2").val());
            }
            if ($("#cabin3").val() != "All") {
                $("#cabin" + n).val($("#cabin3").val());
            }
            //alert(n);
            if (n != 1) $("#cabin1").val("All");
            if (n != 2) $("#cabin2").val("All");
            if (n != 3) $("#cabin3").val("All");


            if ($("#adl1").val() != 1) {
                $("#adl" + n).val($("#adl1").val());
            }
            if ($("#adl2").val() != 1) {
                $("#adl" + n).val($("#adl2").val());
            }
            if ($("#adl3").val() != 1) {
                $("#adl" + n).val($("#adl3").val());
            }
            if (n != 1) $("#adl1").val(1);
            if (n != 2) $("#adl2").val(1);
            if (n != 3) $("#adl3").val(1);

            if ($("#cld1").val() != 0) {
                $("#cld" + n).val($("#cld1").val());
            }
            if ($("#cld2").val() != 0) {
                $("#cld" + n).val($("#cld2").val());
            }
            if ($("#cld3").val() != 0) {
                $("#cld" + n).val($("#cld3").val());
            }
            if (n != 1) $("#cld1").val(0);
            if (n != 2) $("#cld2").val(0);
            if (n != 3) $("#cld3").val(0);

            if ($("#inf1").val() != 0) {
                $("#inf" + n).val($("#inf1").val());
            }
            if ($("#inf2").val() != 0) {
                $("#inf" + n).val($("#inf2").val());
            }
            if ($("#inf3").val() != 0) {
                $("#inf" + n).val($("#inf3").val());
            }
            if (n != 1) $("#inf1").val(0);
            if (n != 2) $("#inf2").val(0);
            if (n != 3) $("#inf3").val(0);


            if ($('#fexible1').is(':checked')) {
                $("#fexible" + n).prop('checked', true);
            }
            if ($('#fexible2').is(':checked')) {
                $("#fexible" + n).prop('checked', true);
            }
            if (n != 1) $("#fexible1").prop('checked', false);
            if (n != 2) $("#fexible2").prop('checked', false);
        });
        var dateToday = new Date();

        $('.from_date').datepicker({
            numberOfMonths: 3, minDate: dateToday,
            onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate());
                $(".to_date").datepicker("option", "minDate", dt);
            }
        });
        $('.to_date').datepicker({
            numberOfMonths: 3, minDate: $('.from_date').val(),
            onSelect: function (selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate() - 1);
                $(".from_date").datepicker("option", "maxDate", dt);

                var dt = new Date(selected);
                dt.setDate(dt.getDate() + 1);
                $(".to_date2").datepicker("option", "minDate", dt);

            }
        });
        if ($('.to_date').val() != '') {
            var todate = $('.to_date').val();
        }
        else {
            var todate = $('.from_date').val();
        }
        $('.to_date2').datepicker({
            numberOfMonths: 3, minDate: todate
        });

    });


    function addmoredestination() {
        cc = $('#citycount').val();
        if (cc <= 2) {
            $('#cremove1,#cremove2,#cremove3').text("");
            $('.multi' + cc).show();
            $('#cremove' + cc).text("<?php echo $this->lang->line('remove'); ?>");
            cc++;
            $('#citycount').val(cc);

        }
        if (cc == 3) {
            $("#cityadd").text("");
        }

    }

    function cremove(nn) {
        $('#cremove1,#cremove2,#cremove3').text("");
        cc = $('#citycount').val();
        if (cc == 2) {
            $('.multi1').hide();
            $('#from4').val('');
            $('#to4').val('');
            $('#depdate4').val('');
            cc--;
        }
        if (cc == 3) {
            $('.multi2').hide();
            $('#from5').val('');
            $('#to5').val('');
            $('#depdate5').val('');
            cc--;
            $('#cremove1').text("<?php echo $this->lang->line('remove'); ?>");
        }
        if (cc == 4) {
            $('.multi3').hide();
            $('#from6').val('');
            $('#to6').val('');
            $('#depdate6').val('');
            cc--;
            $('#cremove2').text("<?php echo $this->lang->line('remove'); ?>");
        }
        if (cc == 5) {
            $('.multi4').hide();
            cc--;
            $('#from7').val('');
            $('#to7').val('');
            $('#depdate7').val('');
            $('#cremove3').text("<?php echo $this->lang->line('remove'); ?>");
        }
        $('#citycount').val(cc);
        $("#cityadd").text("<?php echo $this->lang->line('more_destination'); ?>");
    }

    function dotoggle(a) {

        if ($('#more' + a).text() == "<?php echo $this->lang->line('more_option'); ?>") {
            $('#less' + a + '1,#less' + a + '2,#less' + a + '3,#less' + a + '4').toggle();
            $('#more' + a).text("<?php echo $this->lang->line('less_option'); ?>");

        } else {
            $('#less' + a + '1,#less' + a + '2,#less' + a + '3,#less' + a + '4').toggle();
            $('#more' + a).text("<?php echo $this->lang->line('more_option'); ?>");
        }

    }

    function datevalidate(dateval) {
        validinc = 0;
        for (i = 0; i < 3; i++) {
            date = new Date(Date.parse('<?php echo date("m/d/Y"); ?>'));
            date.setDate(date.getDate() + i);
            newDate = new Date(Date.parse(date.toDateString()));
            d = newDate.getDate();
            if (d.toString().length == 1) d = "0" + d;
            m = newDate.getMonth();
            m += 1;
            if (m.toString().length == 1) m = "0" + m;
            y = newDate.getFullYear();
            newda = m + "/" + d + "/" + y;
            if (dateval == newda) validinc++;
        }
        return validinc;
    }

    testArr = 'Mumbai-Chhatrapati Shivaji- India,BOM';

    matrixcount = 0;
    function frmsubmit(n) {
        mainform = n;
        cc = $('#citycount').val();
        if (n != 3) cc = 1;
        adl = $("#adl" + n).val();
        cld = $("#cld" + n).val();
        inf = $("#inf" + n).val();
        tot = parseInt(adl) + parseInt(cld);
        if (adl == 0) {
            $(".adl" + n).text("Adults Must be minimum 1");
            $("#adl" + n).css("border", "solid 1px red");
            returni = 0;
        } else if (tot > 9) {
            $("#totalval" + n).text("<?php echo $this->lang->line('max_traveler_error'); ?>");
            $("#adl" + n).css("border", "solid 1px red");
            returni = 0;
            $("#cld" + n).css("border", "solid 1px red");
            returni = 0;
        }
        else if (tot < inf) {
            $("#totalval" + n).text("<?php echo $this->lang->line('max_infant_error'); ?>");
            $("#adl" + n).css("border", "solid 1px red");
            $("#cld" + n).css("border", "solid 1px red");
            $("#inf" + n).css("border", "solid 1px red");
            returni = 0;
        } else {
            $("#totalval" + n).text("");
            $(".adl" + n).text("");
            $("#adl" + n).css("border", "");
            $(".cld" + n).text("");
            $("#cld" + n).css("border", "");
            $(".inf" + n).text("");
            $("#inf" + n).css("border", "");
            returni = 1;
        }
        for (k = 0; k < cc; k++) {

            fromd = $("#from" + n).val();
            tod = $("#to" + n).val();
            depdate = $("#depdate" + n).val();
            retdate = $("#retdate" + n).val();

            i = j = 1;
            $.each(airports, function (key, value) {
                if (value == fromd) {
                    i = 2;
                }
                if (value.indexOf(fromd.toUpperCase()) > 1) {
                    i = 2;
                }
                if (value == tod) {
                    j = 2;
                }
                if (value.indexOf(tod.toUpperCase()) > 1) {
                    j = 2;
                }
            });
            if (i == 1) {
                $(".from" + n).text("<?php echo $this->lang->line('from_destination_error'); ?>");
                $("#from" + n).css("border", "solid 1px red");
                returni = 0;
            } else if (fromd == tod) {
                $(".from" + n).text("<?php echo $this->lang->line('from_to_destination_error'); ?>");
                $("#from" + n).css("border", "solid 1px red");
                $("#to" + n).css("border", "solid 1px red");
                returni = 0;
            } else {
                $(".from" + n).text("");
                $("#from" + n).css("border", "");
            }

            if (j == 1) {
                $(".to" + n).text("<?php echo $this->lang->line('to_destination_error'); ?>");
                $("#to" + n).css("border", "solid 1px red");
                returni = 0;
            } else {
                $(".to" + n).text("");
                $("#to" + n).css("border", "");
            }


            dateval = datevalidate(depdate);

            if (depdate == "") {
                $(".depdate" + n).text("<?php echo $this->lang->line('departure_date_required'); ?>");
                $("#depdate" + n).css("border", "solid 1px red");
                returni = 0;
            } else if (dateval == 1) {
                $(".depdate" + n).text("<?php echo $this->lang->line('date_alert'); ?>");
                $("#depdate" + n).css("border", "solid 1px red");
                returni = 0;
            } else {
                $(".depdate" + n).text("");
                $("#depdate" + n).css("border", "");
            }

            if (retdate == "") {
                $(".retdate" + n).text("<?php echo $this->lang->line('return_date_required'); ?>");
                $("#retdate" + n).css("border", "solid 1px red");
                returni = 0;
            } else {
                $(".retdate" + n).text("");
                $("#retdate" + n).css("border", "");
            }
            n++;
        }


        if (returni == 0) {
            return false;
        } else {
            if (matrixcount == 0) {
                $(".sale-flights-section-demo,header,footer,.awe-search-tabs,.filter-page__content,.page-sidebar,.menu-list").css("display", "none");
                $(".preloader:after").css("display", "none");
                $("nav").css("height", "0px");
                $("head").html("");
                $("#preloader-search,.preloader").css("display", "block");
            } else {
                matrixcount = 0;
            }
            //$("body").css({"overflow":"visible","background":"url(<?php echo base_url(); ?>assets/img/bg.jpg) no-repeat","background-size":"cover"});
            //$("body").css({"overflow":"visible"});
            //$(".global-wrap:first").css({"overflow":"hidden","background":"none"});

            if (mainform == 3) {

                fromval = $("#from3").val();
                toval = $("#to3").val();
                if (fromval.indexOf(',') > 1) {
                    fromval1 = fromval.split(",")[1];
                }
                else {
                    fromval1 = fromval.toUpperCase();
                }

                if (toval.indexOf(',') > 1) {
                    toval1 = toval.split(",")[1];
                }
                else {
                    toval1 = toval.toUpperCase();
                }


                if (cc == 1) {
                    $(".mb5").html(fromval1 + " - " + toval1);
                }
                else if (cc == 2) {
                    fromva2 = $("#from4").val();
                    toval2 = $("#to4").val();
                    if (fromval.indexOf(',') > 1) {
                        fromval2 = fromva2.split(",")[1];
                    }
                    else {
                        fromval2 = fromva2.toUpperCase();
                    }

                    if (toval.indexOf(',') > 1) {
                        toval2 = toval2.split(",")[1];
                    }
                    else {
                        toval2 = toval2.toUpperCase();
                    }

                    $(".mb5").html(fromval1 + "  - " + toval1 + " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" + fromval2 + "  -  " + toval2);
                }
                else {
                    fromva2 = $("#from4").val();
                    toval2 = $("#to4").val();
                    if (fromva2.indexOf(',') > 1) {
                        fromval2 = fromva2.split(",")[1];
                    }
                    else {
                        fromval2 = fromva2.toUpperCase();
                    }

                    if (toval2.indexOf(',') > 1) {
                        toval2 = toval2.split(",")[1];
                    }
                    else {
                        toval2 = toval2.toUpperCase();
                    }
                    fromval3 = $("#from5").val();
                    toval3 = $("#to5").val();
                    if (fromval3.indexOf(',') > 1) {
                        fromval3 = fromval3.split(",")[1];
                    }
                    else {
                        fromval3 = fromval3.toUpperCase();
                    }

                    if (toval3.indexOf(',') > 1) {
                        toval3 = toval3.split(",")[1];
                    }
                    else {
                        toval3 = toval3.toUpperCase();
                    }
                    $(".mb5").html(fromval1 + "  - " + toval1 + " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" + fromval2 + "  -  " + toval2 + " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" + fromval3 + "  -  " + toval3);
                }

            }
            else if (mainform == 1) {
                fromval = $("#from1").val();
                if (fromval.indexOf(',') > 1) {
                    fromval1 = fromval.split(",")[1];
                }
                else {
                    fromval1 = fromval.toUpperCase();
                }

                toval = $("#to1").val();
                if (toval.indexOf(',') > 1) {
                    toval1 = toval.split(",")[1];
                }
                else {
                    toval1 = toval.toUpperCase();
                }

                $(".mb5").html(fromval1 + "  - " + toval1 + " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" + toval1 + "  -  " + fromval1);
            }
            else {
                fromval = fromd;
                if (fromval.indexOf(',') > 1) {
                    fromval1 = fromval.split(",")[1];
                }
                else {
                    fromval1 = fromval.toUpperCase();
                }

                toval = tod;
                if (toval.indexOf(',') > 1) {
                    toval1 = toval.split(",")[1];
                }
                else {
                    toval1 = toval.toUpperCase();
                }

                $(".mb5").html(fromval1 + " - " + toval1);
            }
        }

    }

    function setDepartureLocation(item) {
        DepartureLocation = $("#to" + (item)).val();
        $("#from" + (item + 1)).val(DepartureLocation);
    }

    function searchHistory(id) {
        $.ajax({
            url: "<?php echo base_url('trip/searchHistory', get_protocol())?>",
            type: "post",
            data: {
                id: id
            },
            success: function (data) {
                //alert(id);
                details = JSON.parse(data);
                type = details[0]['journey_type'];
                if (type == "Round") {
                    i = 1;
                    $("#flight-search-1").click();
                }
                else if (type == "Oneway") {
                    i = 2;
                    $("#flight-search-2").click();
                }
                else {
                    i = 3;
                    $("#flight-search-3").click();
                }

                $("#from" + i).val(details[0]['departure1']);
                $("#to" + i).val(details[0]['arrival1']);
                $("#depdate" + i).val(details[0]['departuredate1']);
                $("#retdate" + i).val(details[0]['returndate1']);
                $("#adl" + i).val(details[0]['adults']);
                $("#cld" + i).val(details[0]['children']);
                $("#inf" + i).val(details[0]['infants']);
                $("#airline" + i).val(details[0]['airlines']);
                $("#cabin" + i).val(details[0]['class']);

                if (details[0]['flexible'] == "on") $("#fexible" + i).prop("checked", true);
                else $("#fexible" + i).prop("checked", false);

                if (i == 3) {
                    $("#from4").val(details[0]['departure2']);
                    $("#from5").val(details[0]['departure3']);
                    $("#to4").val(details[0]['arrival2']);
                    $("#to5").val(details[0]['arrival3']);
                    $("#depdate4").val(details[0]['departuredate2']);
                    $("#depdate5").val(details[0]['departuredate3']);

                    if (details[0]['arrival2'] != "") $("#cityadd").click();
                    if (details[0]['arrival3'] != "") $("#cityadd").click();
                }

                $("#submit" + i).click();
            }
        });
    }


</script>

<script type="text/javascript">
    $('.remove_search').click(function () {

        id = $(this).text();
        $(this).parent("span").hide();
        $.ajax({
            url: "<?php echo base_url('trip/removeHistory', get_protocol())?>",
            type: "post",
            data: {
                id: id
            },
            success: function (data) {

            }
        });
    })


</script>



