<script type="text/javascript">
    /** Search form start**/
    matrixcount = 0;
    function matrix(id) {
        depart_date = $("#depart" + id).val();
        return_date = $("#return" + id).val();
        nostops = $(".nostops" + id).text();
        $("#depdate1").val(depart_date);
        $("#retdate1").val(return_date);
        $("#fexible1").attr('checked', false);
        $("#flight_type").val(nostops);

        $("form").attr("target", "_blank");

        setTimeout(expire_target, 500);
        matrixcount++;
        $("#submit1").click();
    }
    function expire_target() {
        $("form").attr("target", "");
    }
    function matrixone(id) {
        depart_date = $("#depart" + id).val();
        nostops = $(".nostops" + id).val();
        $("#depdate2").val(depart_date);
        $("#fexible2").attr('checked', false);
        $("#flight_type").val(nostops);

        $("form").attr("target", "_blank");

        setTimeout(expire_target, 500);
        matrixcount++;
        $("#submit2").click();
    }
    /** Search form end**/

    <?php
    if(isset($_GET['common_FlexiblePref'])) {
    ?>
    $('.initiative__item').sort(function (a, b) {
        return $(a).find('.price').data('price') - $(b).find('.price').data('price');
    }).each(function (_, initiative__item) {
        $(initiative__item).parent().append(initiative__item);
    });
    <?php
    }
    ?>


    <?php if($_GET['common_AirlinePref'] != ""){ ?>
    $(".search div").each(function () {
        dataval = $(this).attr("data-value");
        if (dataval == "<?php echo $_GET['common_AirlinePref']; ?>") {
            $("#testid").val($(this).text());
        }
    });
    <?php } ?>


    /** Filter option start **/
    /** More option start **/
    $(".flightno .displaymore").click(function () {

        if ($(this).text() == "<?php echo $this->lang->line('more'); ?>") {
            $(this).text("<?php echo $this->lang->line('less'); ?>");
        }
        else {
            $(this).text("<?php echo $this->lang->line('more'); ?>");
        }

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


    function displaypass(id) {
        $("#flight" + id + " .hd").toggle();
    }

    /** More Option end**/
    /** Price value start**/
        //From value
    tono = $("#tono").val();
    tono = parseInt(tono) - 1;
    costfrom = costto = 0;
    for (i = 0; i <= tono; i++) {
        newcost = parseInt($("#flight" + i + " .initiative-top .booking-item-price").text().replace("$ ", "").replace(",", ""));
        //newcost=$("#fromrange").val(costfrom);
        if (i == 0) {
            costfrom = costto = newcost
        }
        else {
            if (newcost < costfrom) costfrom = newcost;
            if (newcost > costto) costto = newcost;
        }
    }
    multicostfrom = costfrom;
    $("#fromrange").val(costfrom);
    $("#torange").val(costto + 1);


    /** Price value end**/

    /** Price filter start**/
    $(".widget_price_filter,.widget_price_filter a").mouseup(function () {
        pricefilter();
    });
    /*$(".page-sidebar").mouseout(function(){
     setTimeout(function(){
     pricefilter();
     },2000);
     });
     $(".price-slider-wrapper").mouseout(function(){
     setTimeout(function(){
     pricefilter();
     },500);
     });*/

    function pricefilter() {
        fromrange = $("#fromrange").val();
        torange = $("#torange").val();
        fromspan = $(".price_label .from").text().replace("$", "");
        tospan = $(".price_label .to").text().replace("$", "");
        if (fromrange != fromspan || torange != tospan) {
            $("#fromrange").val(fromspan);
            $("#torange").val(tospan);
            $("html, body").animate({scrollTop: 0}, "slow");
            filter(0, 9);
        }

    }

    /** Price filter end**/
    /** Stops filter start**/
    function noofstopsn(id) {
        if (id == "All") $("#nstop1").addClass("current"); else $("#nstop1").removeClass("current");
        if (id == "0") $("#nstop2").addClass("current"); else $("#nstop2").removeClass("current");
        if (id == "1") $("#nstop3").addClass("current"); else $("#nstop3").removeClass("current");
        if (id == "1m") $("#nstop4").addClass("current"); else $("#nstop4").removeClass("current");
        $("#noofstops").val(id);
        $("html, body").animate({scrollTop: 0}, "slow");
        filter(0, 9);
    }
    /** Stops filter end**/
    /** Time filter start**/
    function depat(id) {

        if (id == "All") $("#fdepart1").addClass("current"); else $("#fdepart1").removeClass("current");
        if (id == "1") $("#fdepart2").addClass("current"); else $("#fdepart2").removeClass("current");
        if (id == "2") $("#fdepart3").addClass("current"); else $("#fdepart3").removeClass("current");
        if (id == "3") $("#fdepart4").addClass("current"); else $("#fdepart4").removeClass("current");
        if (id == "4") $("#fdepart5").addClass("current"); else $("#fdepart5").removeClass("current");
        $("#depattime").val(id);
        $("html, body").animate({scrollTop: 0}, "slow");
        filter(0, 9);
    }
    /** Arrival Time filter start**/
    function arrival(id) {

        if (id == "All") $("#farrival1").addClass("current"); else $("#farrival1").removeClass("current");
        if (id == "1") $("#farrival2").addClass("current"); else $("#farrival2").removeClass("current");
        if (id == "2") $("#farrival3").addClass("current"); else $("#farrival3").removeClass("current");
        if (id == "3") $("#farrival4").addClass("current"); else $("#farrival4").removeClass("current");
        if (id == "4") $("#farrival5").addClass("current"); else $("#farrival5").removeClass("current");
        $("#arrivaltime").val(id);
        $("html, body").animate({scrollTop: 0}, "slow");
        filter(0, 9);
    }
    /** Time filter end**/


    filter(0, 9); //starting pagination
    function filter(fromno, tonum) {
        //return false;
        fromrange = parseInt($("#fromrange").val());
        torange = parseInt($("#torange").val());
        noofstops = $("#noofstops").val();
        flcount = 0;

        var $flightno = $('.flightno');

        n = 0;

        flightcount = 0;

        $flightno.each(function () {
            id = $(this).attr("id");
            //Cost
            fcost = parseFloat($("#" + id + " .booking-item-price").text().replace("$ ", "").replace(",", ""));
            //Stops
            stopsd = $("#" + id + " .initiative-table tr.flightmain:first .stopscount").text();
            stopsdl = $("#" + id + " .initiative-table tr.flightmain:last .stopscount").text();
            stopacc = 0;
            if (noofstops == "All") stopacc = 1;
            else if (noofstops == "0" && stopsd == "Non Stop" && stopsdl == "Non Stop") stopacc = 1;
            else if (noofstops == "1" && stopsd == "1 Stop" && stopsdl == "1 Stop") stopacc = 1;
            else if (noofstops == "1m" && stopsd != "1 Stop" && stopsd != "Non Stop" && stopsdl != "1 Stop" && stopsdl != "Non Stop") stopacc = 1;
            //Departure Time
            timeval = "no";
            deptime = $("#" + id + " .initiative-table tr:first .deptime").text();
            dep_time = deptime.split(":");
            dep_time1 = dep_time[0];
            current_time = $("#depattime").val();

            if (current_time == "All") {
                timeval = "yes";
            }
            else if (current_time == 1) {
                if (parseInt(dep_time1) < 6) {
                    timeval = "yes";
                }
            }
            else if (current_time == 2) {
                if (parseInt(dep_time1) >= 6 && parseInt(dep_time1) < 12) {
                    timeval = "yes";
                }
            }
            else if (current_time == 3) {
                if (parseInt(dep_time1) >= 12 && parseInt(dep_time1) < 18) {
                    timeval = "yes";
                }
            }
            else {
                if (parseInt(dep_time1) >= 18 && parseInt(dep_time1) < 24) {
                    timeval = "yes";
                }
            }
            //Arrival Time
            atimeval = "no";
            deptime = $("#" + id + " .initiative-table tr:first .arrtime").text();
            dep_time = deptime.split(":");
            dep_time1 = dep_time[0];
            current_time = $("#arrivaltime").val();

            if (current_time == "All") {
                atimeval = "yes";
            }
            else if (current_time == 1) {
                if (parseInt(dep_time1) < 6) {
                    atimeval = "yes";
                }
            }
            else if (current_time == 2) {
                if (parseInt(dep_time1) >= 6 && parseInt(dep_time1) < 12) {
                    atimeval = "yes";
                }
            }
            else if (current_time == 3) {
                if (parseInt(dep_time1) >= 12 && parseInt(dep_time1) < 18) {
                    atimeval = "yes";
                }
            }
            else {
                if (parseInt(dep_time1) >= 18 && parseInt(dep_time1) < 24) {
                    atimeval = "yes";
                }
            }
            // Airline
            airlinecount = 0;
            newaircount = 0;
            airlines = $("#" + id + " .initiative-table tr:first .airlinename").text();

            $("#airlinelist .airlineentry").each(function () {
                air = $(this).attr("id");
                airvalue = $("." + air).val();
                if (airvalue == airlines) {
                    airlinecount = 1;
                    if ($("." + air).is(':checked')) {
                        newaircount = 1;
                    }
                }

            });


            if (airlinecount == 0 && $("#scriptload").val() == 1) {
                newaircount = 1;
                n++;
                $("#airlinelist").append('<div class="airlineentry" id="check' + n + '" ><label><input type="checkbox" value="' + airlines + '" class="check' + n + '" checked="true"> <i class="awe-icon awe-icon-check"></i> ' + airlines + '</div>');
            }

            //Hide and Show
            if (fcost >= fromrange
                && fcost <= torange
                && stopacc == 1
                && timeval == "yes"
                && atimeval == "yes"
                && newaircount == 1
            ) {
                if (flcount >= fromno && flcount <= tonum) {
                    $(this).show();
                    flightcount++;
                } else {
                    flightcount++;
                    $(this).hide();
                }
                flcount++;
            } else {
                $(this).hide();
            }
        });


        var flightsTotal = $flightno.length;

        var $totalCount = $(".totalcount");

        if (flightsTotal != 0) {
            $totalCount.text(flightsTotal + "  (flights available)");
        } else {
            $totalCount.text("No flights available");
        }


        $("#scriptload").val(2);
        //Pagination
        $(".page__pagination").html("");
        tono = flcount;
        ss = tono / 10;
        for (i = 1; i <= ss; i++) {
            n1 = i * 10 - 10;
            n2 = i * 10 - 1;
            if (fromno == n1 && tonum == n2) {
                $(".page__pagination").append("<a class='current' onclick='filter(" + n1 + "," + n2 + ")' >" + i + "</a>");
            } else {
                $(".page__pagination").append("<a onclick='filter(" + n1 + "," + n2 + ")' >" + i + "</a>");
            }
        }

        a = tono % 10;
        if (a != 0) {
            n1 = i * 10 - 10;
            n2 = i * 10 - 1;
            if (fromno == n1 && tonum == n2) {
                $(".page__pagination").append("<a class='current' onclick='filter(" + n1 + "," + n2 + ")' >" + i + "</a>");
            } else {
                $(".page__pagination").append("<a onclick='filter(" + n1 + "," + n2 + ")' >" + i + "</a>");
            }
        }
        $("html, body").animate({scrollTop: 0}, "fast");

        <?php if(isset($_GET['common_FlexiblePref'])){ ?>
        fcost = 0;
        var arraycost = [];
        $("table.table-booking-history tr").each(function () {
            m = 0;
            $(this).find("td").each(function () {
                //Cost
                fcost = parseFloat($(this).find("a").text().replace("$ ", "").replace(",", ""));


                //Stops
                stopsd = $(this).find(".totstops").text();
                stopacc = 0;
                if (noofstops == "All") stopacc = 1;
                else if (noofstops == "0" && stopsd == "Non Stop") stopacc = 1;
                else if (noofstops == "1" && stopsd == "1 Stop") stopacc = 1;
                else if (noofstops == "1m" && stopsd != "1 Stop" && stopsd != "Non Stop") stopacc = 1;

                //Departure Time
                timeval = "no";
                deptime = $(this).find(".dtime").text();
                dep_time = deptime.split(":");
                dep_time1 = dep_time[0];
                current_time = $("#depattime").val();
                if (current_time == "All") {
                    timeval = "yes";
                }
                else if (current_time == 1) {
                    if (parseInt(dep_time1) < 6) {
                        timeval = "yes";
                    }
                }
                else if (current_time == 2) {
                    if (parseInt(dep_time1) >= 6 && parseInt(dep_time1) < 12) {
                        timeval = "yes";
                    }
                }
                else if (current_time == 3) {
                    if (parseInt(dep_time1) >= 12 && parseInt(dep_time1) < 18) {
                        timeval = "yes";
                    }
                }
                else {
                    if (parseInt(dep_time1) >= 18 && parseInt(dep_time1) < 24) {
                        timeval = "yes";
                    }
                }
                //Arrival Time
                atimeval = "no";
                deptime = $(this).find(".atime").text();
                dep_time = deptime.split(":");
                dep_time1 = dep_time[0];
                current_time = $("#arrivaltime").val();

                if (current_time == "All") {
                    atimeval = "yes";
                }
                else if (current_time == 1) {
                    if (parseInt(dep_time1) < 6) {
                        atimeval = "yes";
                    }
                }
                else if (current_time == 2) {
                    if (parseInt(dep_time1) >= 6 && parseInt(dep_time1) < 12) {
                        atimeval = "yes";
                    }
                }
                else if (current_time == 3) {
                    if (parseInt(dep_time1) >= 12 && parseInt(dep_time1) < 18) {
                        atimeval = "yes";
                    }
                }
                else {
                    if (parseInt(dep_time1) >= 18 && parseInt(dep_time1) < 24) {
                        atimeval = "yes";
                    }
                }

                // Airline
                newaircount = 0;
                airlines = $(this).find(".depairline").text();

                $("#airlinelist .airlineentry").each(function () {
                    air = $(this).attr("id");
                    airvalue = $("." + air).val();
                    if (airvalue == airlines) {
                        if ($("." + air).is(':checked')) {
                            newaircount = 1;
                        }
                    }

                });

                //Final validation
                if (fcost >= fromrange && fcost <= torange && stopacc == 1 && timeval == "yes" && atimeval == "yes" && newaircount == 1) {

                    arraycost.push(fcost);
                    $(this).find("a").show();
                } else {
                    $(this).find("a").hide();
                }


            });
            //alert(airvalue+airlines);
        });


        $("table.table-booking-history tr").each(function () {
            $(this).find("td").each(function () {
                fcost = parseFloat($(this).find("a").text().replace("$ ", "").replace(",", ""));
                if (fcost == Math.min.apply(Math, arraycost) && $(this).find("a").css('display') != 'none') {
                    $(this).find("a").css("color", "#fff");
                    $(this).find("a").css("font-weight", "bold");
                    $(this).css("background", "#ff8800");
                } else {
                    $(this).css("background", "#fff");
                    $(this).find("a").css("font-weight", "normal");
                    $(this).find("a").css("color", "#222222");
                }
            });
        });

        <?php } ?>

    }


    /** Airline list start**/
    $("#airlinelist .airlineentry label input").click(function () {
        if ($(this).val() == "All") {
            if ($(".check0").is(':checked')) {
                $('#airlinelist .airlineentry label input').prop('checked', true);
            } else {
                $('#airlinelist .airlineentry label input').prop('checked', false);
            }
        }
        $("html, body").animate({scrollTop: 0}, "slow");
        filter(0, 9);
    });


    <?php if($_GET['journey_type'] == "Oneway") {?>
    $("#awe-search-tabs-4").css("display", "block !important");
    $("#awe-search-tabs-3").css("display", "none !important ");
    $("#awe-search-tabs-5").css("display", "none  !important");
    $(".awe-search-tabs ul li#nlist2").attr("class", "ui-tabs-active ui-state-active");
    $(".awe-search-tabs ul li#nlist2").click();
    <?php }else if($_GET['journey_type'] == "Round"){ ?>
    $(".awe-search-tabs ul li#nlist1").attr("class", "ui-tabs-active ui-state-active");
    $("#awe-search-tabs-4").css("display", "none  !important");
    $("#awe-search-tabs-3").css("display", "block  !important");
    $("#awe-search-tabs-5").css("display", "none  !important");
    $(".awe-search-tabs ul li#nlist1").click();
    <?php }else{ ?>
    $(".awe-search-tabs ul li#nlist3").attr("class", "ui-tabs-active ui-state-active");
    $("#awe-search-tabs-4").css("display", "none  !important");
    $("#awe-search-tabs-3").css("display", "none  !important");
    $("#awe-search-tabs-5").css("display", "block  !important");
    $(".awe-search-tabs ul li#nlist3").click();
    <?php } ?>


    $(".awe-search-tabs ul li").click(function () {
        $(".awe-search-tabs ul li").removeClass("ui-tabs-active ui-state-active");
        $(this).attr("class", "ui-tabs-active ui-state-active");
    });

    setTimeout(function () {
        <?php if($_GET['journey_type'] == "Oneway") {?>
        $("#awe-search-tabs-4").show();
        $("#awe-search-tabs-3").hide();
        $("#awe-search-tabs-5").hide();
        <?php }else if($_GET['journey_type'] == "Round"){ ?>
        $("#awe-search-tabs-4").hide();
        $("#awe-search-tabs-3").show();
        $("#awe-search-tabs-5").hide();
        <?php }else{ ?>
        $("#awe-search-tabs-4").hide();
        $("#awe-search-tabs-3").hide();
        $("#awe-search-tabs-5").show();
        <?php } ?>

    }, 1000);


    /** Airline list end**/
    /** Filter Option **/
    $(window).resize(function () {
        if ($(window).width() < 1020) {
            gridviewclick();
        }
    });
    if ($(window).width() < 1020) {
        gridviewclick();
    }
    function gridviewclick() {
        $(".table-booking-history td").click(function () {
            $(".table-booking-history td #key .body").css("display", "none");
            $(this).find("#key .body").toggle();
        });
    }

    $("body .table-booking-history td #key .body").on("mouseover", function () {
        return false;
    });
    $("body .table-booking-history td").on("mouseover", function (event) {

        winH = $(window).innerHeight();
        balH = winH - event.clientY;
        //alert("pageY: " +winH+" / "+event.clientY+" / "+balH);
        if (balH < 310) {
            $("td #key .body").css("margin-top", "-280px");
        } else {
            $("td #key .body").css("margin-top", "19px");
        }
    });
</script>
