<?php
$ticketResult = $result['ticketResult'];
$passenger = $result['passenger'];
$flight = $result['flight'];
?>
<div style="font-family:Arial, Helvetica, sans-serif;font-weight:100px;">
<div style="width:800px;margin:auto" class="container" >
<div style="text-align:center;">
			<img style="width:180px;" src="<?php echo base_url(); ?>/assets/admin/layout/img/logo-big.png">
	  </div>
  <h1 style="color:#F60;padding-top:16px;width:100%;min-height:80px;background-color: #F7F7F7;">
	  <span style="float:left;font-size:30px;line-height: 65px;margin-left: 14px;">Flight Reservation Confirmation Number : <b style="color: #000;"><?= $ticketResult[0]->booking_ref_no;
								?></b></span>
	  
	  <span style="clear:both;"></span>
  </h1>
  <br>
  
  <p id="para" style="border-top:3px solid #0067ab;border-bottom:3px solid #0067ab;padding:6px;font-size:20px;background-color: #0065AF;color: #fff;">Flight Details</p>

   <table style="background-color: #FFF; width: 100%; margin-top: 16px; margin-bottom: 10px; border-radius: 6px;" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <?php

						foreach($flight as $flightDetails) {

							$params['flightDetails'] = $flightDetails;
							$this->load->view('booking/flightDetails_eticket', $params);
						}



			            
           ?>
            
       
        
   
			</tbody>
		</table>	
		<h5 class="text-center mb30" style="margin-left: 90px;">
        	<?php 
        		$payment_method = $ticketResult[0]->payment_type;
        		echo $this->lang->line('payment_method')." : ". $payment_method;
        		if($payment_method == "card") {

        			$cardNumber = $ticketResult[0]->four_digit;
					$masked =  str_pad(substr($cardNumber, -4, 4), 13, '*', STR_PAD_LEFT);
					echo ", Last 4 digit of your card: ".$masked;
							
				}

        	?>
        	
        </h5>
   <p id="para" style="border-top:3px solid #0067ab;border-bottom:3px solid #0067ab;padding:6px;font-size:20px;background-color: #0065AF;color: #fff;">Passenger Details</p>  
    <table style="width:100%" class="table table-striped extra-height">
    <thead>
      <tr style="background:#CCC;font-size:12px">
        <th style="padding:7px">S.No</th>
        <th>Name</th>
        <th>Phone No</th>
         <th>Date Of Birth</th>
         <th>E-Ticket</th>
      </tr>
    </thead>
    <tbody style="font-size: 12px; ">
     
	 
	 <?php
	$sno = 1;
	if(is_array($passenger)) {

		foreach ($passenger as $passengerDetails) {
			$Name = $passengerDetails->name;
			$Telephone = $passengerDetails->phone;
			$E_ticket = $passengerDetails->e_ticket;
			$name = $passengerDetails->name;
			$BirthDate = date("m-d-Y", strtotime($passengerDetails->dob));
			
			?>
			<tr>

				<td style="text-align:center;"><?php echo $sno; ?>  </td>
				<td style="text-align:center;"><?php echo $Name; ?>  </td>
				<td style="text-align:center;"><?php echo $Telephone; ?></td>
				<td style="text-align:center;"><?php echo $BirthDate; ?></td>
				<td style="text-align:center;"><?php echo $E_ticket; ?></td>
				
			</tr>
			<?php
			$sno++;
		}
	}
	
	?>
     
    </tbody>
  </table> 
  
  <p style="font-size:12px"><b>This is a computer generated invoice. No signature required.
Thanks for order with us</b></p>
</div>

</div>

