$('.carousel').carousel({
        interval: 3000 //changes the speed
    })


function getstates(countryid, baseurl)
{
	$.ajax({
							url:baseurl+'users/get_states',
							type: "POST",
							data: {cid:countryid},
							success:function(response) {
								if(response=="statesnotfound") {
									var optionhtml = '<option value="">Select State</option>';
									document.getElementById("cstates").innerHTML = optionhtml;
								}
								else {
								var optionhtml='<option value="">Select State</option>';
								var finalres = $.parseJSON(response);
								$.each(finalres, function (key, val) {
									optionhtml += "<option value=" + key  + ">" +val + "</option>"
								});
								document.getElementById("cstates").innerHTML = optionhtml;
							}
						 }
						 
						});
}

function getexpocities(contid, baseurl) {

	$.ajax({
					url:baseurl+'users/get_cities',
							type: "POST",
							data: {conid:contid},
							success:function(response) {
							
							if(response=="citiesnotfound") {
									var optionhtml = '<option value="">Select City</option>';
									document.getElementById("cscities").innerHTML = optionhtml;
								}
								else {
								
								var optionhtml='<option value="">Select City</option>';
								var finalres = $.parseJSON(response);
							
								$.each(finalres, function (key, val) {
									optionhtml += "<option value=" + key  + ">" +val + "</option>";
	
								});
			$("#cscities").parent().children().eq(1).children().html(dodie);
						document.getElementById("cscities").innerHTML = optionhtml;
							}
								
							}
						 
						});
}

function getcities(contid, baseurl) {
	$.ajax({
							url:baseurl+'users/get_cities',
							type: "POST",
							data: {conid:contid},
							success:function(response) {
							
							if(response=="citiesnotfound") {
									var optionhtml = '<option value="">Select City</option>';
									document.getElementById("cscities").innerHTML = optionhtml;
								}
								else {
								
								var optionhtml='<option value="">Select City</option>';
								var finalres = $.parseJSON(response);
								$.each(finalres, function (key, val) {
									optionhtml += "<option value=" + key  + ">" +val + "</option>"
								});
								document.getElementById("cscities").innerHTML = optionhtml;
							}
								
							}
						 
						});
}
	
	function getcities_forprofile(stateid, baseurl) {
	
			$.ajax({
						url:baseurl+'users/get_all_cities',
							type: "POST",
							data: {sid:stateid},
							success:function(response) {
							
							if(response=="citiesnotfound") {
									var optionhtml = '<option value="">Select City</option>';
									document.getElementById("cscities").innerHTML = optionhtml;
								}
								else {
								
								var optionhtml='<option value="">Select City</option>';
								var finalres = $.parseJSON(response);
								$.each(finalres, function (key, val) {
									optionhtml += "<option value=" + key  + ">" +val + "</option>"
								});
								document.getElementById("cscities").innerHTML = optionhtml;
							}
								
							}
						 
						});
}




// FLIGHT SEARCH ENGINE ************** APRIL 29 2015 *******************

$(document).ready(function(e) {
    if($('input:radio[name=journey_type]:checked').val()== "Round") {
		
		$("#moreoptsround").css('display','block');
		$("#moreoptsoneway").css('display','none');
		//$("#moreoptsmulti").css('display','none');
		$("#multidestcont").css('display','none');
		
	}
	else if($('input:radio[name=journey_type]:checked').val()== "OneWay") {
		$("#moreoptsround").css('display','none');
		$("#moreoptsoneway").css('display','block');
		//$("#moreoptsmulti").css('display','none');
		//$("#multicityaddmoredestination").css('display','none');
		
		$("#multidestcont").css('display','none');
	}
	else {
		$("#moreoptsround").css('display','none');
		$("#moreoptsoneway").css('display','none');
		//$("#moreoptsmulti").css('display','block');
		
		$("#multidestcont").css('display','block');
		
	}
});

$(document).ready(function(e) {
	// Round Way
    $("#moreoptsround").click(function(){
		 var link = $(this);
		console.log(link.text());
		if (link.text() =="More Options") {
             link.text('Less Options');  
				 $("#departtime").css('display','block');
				$("#arrivaltime").css('display','block');
				$("#airlines").css('display','block');
				$("#airlineclass").css('display','block');              
        } else {
             link.text('More Options');  
			 $("#departtime").css('display','none');
				$("#arrivaltime").css('display','none');
				$("#airlines").css('display','none');
				$("#airlineclass").css('display','none');              
        } 
		
	});
	
	//ONE Way
	 $("#moreoptsoneway").click(function(){
		 var link = $(this);
		 console.log(link.text());
		if (link.text() =="More Options") {
             link.text('Less Options');  
			 $("#departtime").css('display','block');
				$("#airlines").css('display','block');
				$("#airlineclass").css('display','block');              
        } else {
             link.text('More Options');  
			 $("#departtime").css('display','none');
				$("#airlines").css('display','none');
				$("#airlineclass").css('display','none');              
        } 
	});
	
	//Multi Destination
	 $("#moreoptsmulti").click(function(){
		 var link = $(this);
		 console.log(link.text());
		if (link.text() =="More Options") {
             link.text('Less Options');  
			 $("#departtime").css('display','block');
				$("#airlines").css('display','block');
				$("#airlineclass").css('display','block');              
        } else {
             link.text('More Options');  
			 $("#departtime").css('display','none');
				$("#airlines").css('display','none');
				$("#airlineclass").css('display','none');              
        } 
	});
	
	
});


// TRIP TYPE
function trip(triptype,tripval) {
	if(tripval == "Round") {
		$("#moreoptsround").css('display','block');
		$("#moreoptsoneway").css('display','none');
		//$("#moreoptsmulti").css('display','none');
		$("#multidestcont").css('display','none');
		$("#arrivaldate").css('display','block');
		$("#flexible").removeAttr('disabled');
	}
	else if(tripval =="OneWay") {
		$("#moreoptsround").css('display','none');
		$("#moreoptsoneway").css('display','block');
	//	$("#moreoptsmulti").css('display','none');
		$("#arrivaldate").css('display','none');
		$("#flexible").removeAttr('disabled');
		$("#multidestcont").css('display','none');
	}
	else {
		
		$("#moreoptsround").css('display','none');
		$("#moreoptsoneway").css('display','none');
		//$("#moreoptsmulti").css('display','block');
		$("#multidestcont").css('display','block');
		$("#arrivaldate").css('display','none');
		$("#flexible").attr('disabled','disabled');
		
	}
	
}

//FLEXIBLE DATE 
function flexible_date() {
		if($("#flexible").is(':checked')){
			$("#flexible").val(1);
			$("#multicity").css('display','none');
			$("#multicity").attr('disabled','disabled');
			
		}
		else {
			$("#flexible").val(0);
			$("#multicity").css('display','block');
			$("#multicity").attr('disabled','disabled');
			$("#multicity").removeAttr('disabled');
			
		}
}


/************************* FLIGHT SEARCH ENGINE FORM VALIDATION  *************************/
	
$(document).ready(function(e) {
	$.validator.setDefaults({ ignore: [] });
		$("#FlightSearch").validate({
			ignore: ":hidden",			
			rules: {
				from: {
					required: true,
				},
				to: {
					required: true,
				},
				journey_type: {
					required: true,
				},
				datepicker_from: {
					required: true
				},
				datepicker_to: {
					required: true,
				},
				adult: {
					required: true,
				},
				airline1: {
					required: true,
				},
				cabin: {
					required: true,
				},
				"m_fromc[]": {
					required: true,
				},
				"m_toc[]": {
					required: true,
				},
				"muldatepicker_from[]": {
						required: true,
				}
			},
			messages: {
				from: {
					required: "Please Select Travelling From",
				},
				to: {
					required: "Please Select Travelling To",
				},
				journey_type: {
					required: "Please Select Journey Type",
				},
				datepicker_from: {
					required: "Please Select Travelling From Date",
				},
				datepicker_to: {
					required: "Please Select To Date",
				},
				adult: {
					required: "Please Choose Adults",
				},
				airline1: {
					required: "Please Select Airline",
				},
				cabin: {
					required: "Please Select Class",
				},
				"m_fromc[]": {
					required: "Please Select Travelling From",
				},
				"m_toc[]": {
					required: "Please Select Travelling To",
				},
				"muldatepicker_from[]": {
						required: "Please Select To Date",
				}
			},
			/*highlight: function(element, errorClass) {
				$(element).addClass(errorClass);
				$(element.form).find("label[for=" + element.id + "]")
				.addClass(errorClass);
			},
			unhighlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
				$(element.form).find("label[for=" + element.id + "]")
				.removeClass(errorClass);
			},*/
			submitHandler: function(form) {
				form.submit();
			}
			
		});
	});
		
/************************* FLIGHT SEARCH ENGINE FORM VALIDATION  *************************/		


function show_hide_passinfo(key){
		 $("#show_hide_passinfo"+key).toggle('fast');
}

function viewflightdetail(key) {
		 $("#flightdetail"+key).toggle('fast');	
}