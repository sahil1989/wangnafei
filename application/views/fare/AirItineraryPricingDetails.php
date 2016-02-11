<?php
				
$currentPassenger = $PTC_FareBreakdown->PassengerTypeQuantity->Quantity . " x " . $PTC_FareBreakdown->PassengerTypeQuantity->Code;
$currentBase      = $CurrencyCode . " 0.00";
$currentTax       = $CurrencyCode . " 0.00"; 
$currentService   = $CurrencyCode . " 0.00";
$currentDiscount  = $CurrencyCode . " 0.00";
$currentFare      = $CurrencyCode . " 0.00";

if ( isset( $PTC_FareBreakdown->PassengerFare ) ) 
{
	$PassengerFare = $PTC_FareBreakdown->PassengerFare;
	if ( isset( $PassengerFare->BaseFare ) ) 
	{
		$Amount = $PassengerFare->BaseFare->Amount / pow ( 10, $DecimalPlaces );
		$currentBase 	= $CurrencyCode . " " . number_format( $Amount, $DecimalPlaces );
	}
	if ( isset( $PassengerFare->TotalFare ) ) 
	{
		$Amount = $PassengerFare->TotalFare->Amount / pow ( 10, $DecimalPlaces );
		$currentFare 	= $CurrencyCode . " " . number_format( $Amount, $DecimalPlaces );
	}	
	if ( isset( $PassengerFare->Taxes ) ) 
	{
		if ( isset( $PassengerFare->Taxes->Tax ) ) 
		{
			$Amount = $PassengerFare->Taxes->Tax->Amount / pow ( 10, $DecimalPlaces );
			$currentTax 	= $CurrencyCode . " " . number_format( $Amount, $DecimalPlaces );
		}
	}	
}
					
?>
<tr>
    <td><?php echo $currentPassenger; ?></td>
    <td><?php echo $currentBase; ?></td>
    <td><?php echo $currentTax; ?></td>
    <!-- <td><?php echo $currentService; ?></td>
    <td><?php echo $currentDiscount; ?></td> -->
    <td><?php echo $currentFare; ?></td>
</tr>
<?php
				
			