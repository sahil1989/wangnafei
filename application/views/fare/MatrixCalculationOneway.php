<?php
			echo "<td id='keyoneway'>";
			$value = 0;
			if(is_array($PricedItineraries)) {
					foreach($PricedItineraries as $AirItineraryIndex=>$PricedItinerary) {
						$OriginDestinationOptions = $PricedItinerary->AirItinerary->OriginDestinationOptions->OriginDestinationOption ;
						$AirItineraryPricingInfo = $PricedItinerary->AirItineraryPricingInfo;
						$ItinTotalFare = $AirItineraryPricingInfo->ItinTotalFare;
						if ( isset( $ItinTotalFare->Taxes ) ) 
						{
							$Taxes = $ItinTotalFare->Taxes;
				
							if ( isset( $Taxes->Tax ) ) 
							{
				
								$TaxesAmount = $Taxes->Tax->Amount / pow ( 10, $DecimalPlaces );
				
								$totalTax = $CurrencyCode . " " . number_format( $TaxesAmount, $DecimalPlaces );
							}
						}
						if ( isset( $ItinTotalFare->TotalFare ) ) 
						{
							$TotalFare 	= $ItinTotalFare->TotalFare;
				
							$TotalFareAmount = $TotalFare->Amount / pow ( 10, $DecimalPlaces );
				
							$totalFare = $CurrencyCode . " " . number_format( $TotalFareAmount, $DecimalPlaces );
						}
	
						$FlightSegmentArray = $OriginDestinationOptions->FlightSegment;


						if(is_array($FlightSegmentArray)) {
							$FlightSegmentCount = count($FlightSegmentArray) - 1;
							$stops = $FlightSegmentCount;

							$FlightSegment = $FlightSegmentArray;
							$DepartureDateObj = $FlightSegment[0]->DepartureDateTime;
							$ArrivalDateObj = $FlightSegment[$FlightSegmentCount]->ArrivalDateTime;
							$DepartureAirportObj = $FlightSegment[0]->DepartureAirport;
							$ArrivalAirportObj = $FlightSegment[$FlightSegmentCount]->ArrivalAirport;
							$MarketingAirlineObj = $FlightSegment[0]->MarketingAirline;														
						}
						else {
								$FlightSegmentCount = 'Non Stop';
								$stops = $FlightSegmentCount;
								$FlightSegment = $FlightSegmentArray;
								$DepartureDateObj = $FlightSegment->DepartureDateTime;
								$ArrivalDateObj = $FlightSegment->ArrivalDateTime;
								$DepartureAirportObj = $FlightSegment->DepartureAirport;
								$ArrivalAirportObj = $FlightSegment->ArrivalAirport;
								$MarketingAirlineObj = $FlightSegment->MarketingAirline;
						}
					
						$DepartureDateObject = new DateTime( $DepartureDateObj );
						$DepartureAirportDate = $DepartureDateObject->format( "m/d/Y" );
						
						if($DepartureAirportDate == $departureDatefun) {
							$value = $DepartureAirportDate;
							$noofStops = $stops. ' Stop';
							$DepartureDate = $DepartureDateObject->format( "m/d/Y" );
							$DepartureDatenew = $DepartureDateObject->format( "m/d/Y" );							
							$DepartureTime = $DepartureDateObject->format( "H:i" );
							$ArrivalDateObject = new DateTime( $ArrivalDateObj );
							$ArrivalTime = $ArrivalDateObject->format( "H:i" );
							$DepartureAirportDate = $DepartureDateObject->format( "m/d/Y" );
																
							$DepartureAirlineCode = $MarketingAirlineObj->Code;
							$DepartureAirlineName = $MarketingAirlineObj->_;
							$DepartureAirportCode = $DepartureAirportObj->LocationCode;
							$ArrivalAirportCode = $ArrivalAirportObj->LocationCode;
							
							$totalFare2 = $totalFare;
							
						}
					}
			}
					
		if( $value != 0) {
			?>
			  <a   id="key"  ><?php echo $totalFare2; ?>
					<div class="body">
                        <div class="media airline-logo"><img  id="jj" src="<?php echo base_url('assets/airline_logo/' . $DepartureAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $DepartureAirlineCode; ?>" title="Jet Airways (9W)"></div>
                        <div class="block">
                            <strong><?php echo $this->lang->line('departure'); ?> › <?php echo $DepartureDate; ?></strong>
							<input type="hidden" value="<?php echo $DepartureDatenew;?>" id="depart<?php echo $count; ?>"/>
                            <div class="comment depairline"><?php echo $DepartureAirlineName; ?></div>
                            <div class="small">
                                <?php echo $DepartureAirportCode.' <span class="dtime">'.$DepartureTime."</span>"; ?> →
                               <?php echo $ArrivalAirportCode.' <span class="atime">'.$ArrivalTime."</span>"; ?>   &nbsp;
                               <span class="quiet totstops nostops<?php echo $count; ?>" style="display:none;"><?php echo $noofStops; ?></span>
                               <?php
								if ( isset( $PricedItinerary->SequenceNumber ) ) 
								{
									
									if ( isset( $SequenceNumber ) ) 
									{
										?>
											<button  onclick="matrixone(<?php echo $count; ?>)" class="awe-btn awe-btn-style3" style="margin:20px;"><?php echo $this->lang->line('search_flight'); ?></button>
										<?php													
									} 
								}
								?>
                            </div>
                        </div>
                        <hr style="margin: 10px 0">
                     </div>
               </a>
		<?php
		}
		else {
			echo '-';	
		}
		echo "</td>";
?>