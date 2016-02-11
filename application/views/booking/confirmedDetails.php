<?php
if(is_array($result)) {
	$param['Errors'] = $result;
	?>
	<div class="container" style="min-height:490px; padding:20px 0 0 0;">
			<?php
				$this->load->view('booking/cardError', $param);
			?>
	</div>
	<?php

}
else {
	$OTA_TravelItineraryRS = $result->OTA_TravelItineraryRS;
	$param = array();
	$param['OTA_TravelItineraryRS'] = $OTA_TravelItineraryRS;

	if(isset($OTA_TravelItineraryRS->Success)) {
		?>
		<div class="gap"></div>
	    <div class="container">
	        <div class="row successful">
	            <div class="col-md-12">
	                <div class="row row-wrap" data-gutter="60">
					<div class="col-md-8 col-md-offset-2">
					<div>
	                  <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30 col-md-5" style="
					    width: 90px;
					    height: 90px;
					    line-height: 90px;
					    font-size: 42px;
					    margin:0 auto;
					    text-align: center;
					    display: block;
					    position: initial;
					    color: #FFFFFF;
					    background: #3c763d;
					    border-radius: 50%;
					        margin-top: 3%;
					    ">
						</i>
					</div>
	                <h2 class="text-center "><?php echo $this->lang->line('payment_successfull'); ?></h2>

	                <h5 class="text-center mb30"><?php echo $this->lang->line('booking_details_sent'); ?>
	                	<?php
	                	if(auth()->get('email') != '') {  echo auth()->get('email'); }
	                	else { 	echo $_POST['emailid']; }
	                	?>
	                </h5>

	                <h5 class="text-center mb30" style="margin-left: 90px;">
	                	<?php
	                		echo $this->lang->line('payment_method')." : ". ucwords($_POST['ratioOption']);
	                		if($_POST['ratioOption'] == "card") {
	                			$cardNumber = str_replace(" ","",$_POST['cardNumber']);
								$masked =  str_pad(substr($cardNumber, -4, 4), strlen($cardNumber), '*', STR_PAD_LEFT);
								echo ", Last 4 digit of your card: ".$masked;
							}

	                	?>

	                </h5>

	            </div>
			    </div>
	        </div>
	    </div>
	    <div class="container">
	    	<div class="row printbutton">
	    		<div class="col-md-12 pull-right" style="float:right;">
					<button class="btn btn-danger pull-right" onClick="window.print();"><?php echo $this->lang->line('print'); ?></button>
				</div>
	    	</div>
	    </div>





	    <div id="printdata">
	    	<div class="content">
			    <div class="content-container">
			        <div class="row">
			            <div style="padding-bottom: 10px;padding-left: 0;" class="col-sm-12 col-xs-12">
			                <div class="col-sm-8 col-xs-12" style="padding-left: 0;">
			                    <table width="100%">
			                        <tbody>
			                            <tr>
			                                <td><b style="font-size: 25px;line-height: 94px;color:#545454" class="mainhead"><?php echo $this->lang->line('flight_reservation'); ?></b></td>
			                            </tr>
			                        </tbody>
			                    </table>
			                </div>

			                <div class="col-sm-4 col-xs-12">
			                    <table width="100%">
			                        <tbody>
			                            <tr>
			                                <td><b style="font-size:24px;"><img src="<?php echo base_url('assets/img/logo-invert.png', get_protocol()); ?>" alt="Image Alternative text" title="Image Title" class="img-responsive" /></b></td>
			                            </tr>
			                        </tbody>
			                    </table>
			                </div>
			                <?php
							$param['flightDetails'] = $flightDetails;
							$this->load->view('booking/bookFlightDetails', $param);
							?>

			            </div>
					    <div class="row booking-bot" style="background-color:#fff; ">
							<h6 class="text-center"><?php echo $this->lang->line('thank_you_booking'); ?></h6>
						</div>
						<div class="row  booking-bot" style="background-color:#fff;">
							<p class="btn text-center" style="color: #FFF;background-color: #1298D5;border-color: #1298D5;">
								<?php echo $this->lang->line('reference_number'); ?><br>
								<span style="font-size:25px; font-weight:bold;">
									<?php
									echo $OTA_TravelItineraryRS->TravelItinerary->ItineraryRef->ID
									?>
								</span>
							</p>
							<p class="text-center"><?php echo $this->lang->line('write_down'); ?><br></p>
							<p>&nbsp;</p>
						</div>
						<div class="row  booking-bot" style="background-color:#fff;">
							<p class="text-center"><?php echo $this->lang->line('have_a_nice_trip'); ?></p>
						</div>

					</div>

				</div>
			</div>
		</div>

		<div class="row booking-bota"><a href="<?= base_url('trip'); ?>"  class="btn" style="color: #FFF; background-color: #1298D5; border-color: #1298D5;">
			<?php echo $this->lang->line('new_search'); ?></a></div>

		    <?php
				//$this->load->view('emails/ticketConfirmation', $param);
			?>

		<?php
		if($this->session->userdata('auth.user_email') != '') {
			$emailid = $this->session->userdata('auth.user_email');
		}
		else {
			$emailid = $_POST['emailid'].'1';
		}
		$this->email->to($emailid);
		$this->email->from('sales@wangnafei.com', 'WangNaFei.com');
		$this->email->subject($this->lang->line('payment_successfull'));
		$this->email->message($this->load->view('emails/ticketConfirmation', $param,true));
		if($this->email->send()) {
			$this->email->clear();
		} else {
			echo "Mail not send";
		}

		$this->email->to('sales@wangnafei.com');
		$this->email->from('sales@wangnafei.com', 'WangNaFei.com');
		$this->email->subject($this->lang->line('payment_successfull'));
		$this->email->message($this->load->view('emails/ticketConfirmation', $param,true));
		$this->email->send();
		$this->email->clear();

		$this->email->to('darrellchen@outlook.com');
		$this->email->from('sales@wangnafei.com', 'WangNaFei.com');
		$this->email->subject($this->lang->line('payment_successfull'));
		$this->email->message($this->load->view('emails/ticketConfirmation', $param,true));
		$this->email->send();
		$this->email->clear();

		$this->email->to($confirm_cc);
		$this->email->from('sales@wangnafei.com', 'WangNaFei.com');
		$this->email->subject($this->lang->line('payment_successfull'));
		$this->email->message($this->load->view('emails/ticketConfirmation', $param,true));
		$this->email->send();
		$this->email->clear();
	}

	if(isset($OTA_TravelItineraryRS->Errors)) {
		$param['Errors'] = $OTA_TravelItineraryRS->Errors;
		?>
		<div class="container"  style="min-height:415px; padding:20px 0 0 0;">
				<?php
					$this->load->view('booking/confirmedErrorDetails', $param);
				?>
		</div>
	<?php
	}
	?>
	<style>
	    .table-booking-history td,
	    .table-booking-history th {
	        padding: 10px !important;
	    }

	    .table-booking-history th {
	        border: none !important;
	        background: #F2F2F2 !important;
	    }
	</style>


	<br>
	<br>
	<?php
}
?>



<style>
@media print  {
header,footer,.successful,.printbutton{display:none;}
.mainhead{color: #FF7800;}
}
#maildesign{ /*visibility:hidden;height: 0; */}
</style>
