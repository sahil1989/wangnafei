   <?php
			echo "<td>";
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
	
						//$FlightSegmentCount=0;
						if(is_array($OriginDestinationOptions)) {
							foreach($OriginDestinationOptions as $OriginDestinationOptionIndex=>$OriginDestinationOption) {
								$FlightSegmentArray = $OriginDestinationOption->FlightSegment;
								if(is_array($FlightSegmentArray)) {
									$FlightSegment = $FlightSegmentArray;
									$FlightSegmentCount= count($FlightSegment) - 1;
									if($OriginDestinationOptionIndex == 0) {

										$departureStop = $FlightSegmentCount. ' Stop';
										
										($DepartureDateObj = $FlightSegment[0]->DepartureDateTime);
										($ArrivalDateObj = $FlightSegment[$FlightSegmentCount]->ArrivalDateTime);
										($DepartureAirportObj = $FlightSegment[0]->DepartureAirport);
										($ArrivalAirportObj = $FlightSegment[$FlightSegmentCount]->ArrivalAirport);
										($MarketingAirlineObj = $FlightSegment[0]->MarketingAirline);

									}
									if($OriginDestinationOptionIndex == 1) {
										$arrivalStop = $FlightSegmentCount. ' Stop';
										
										($ReturnDateObj = $FlightSegment[0]->DepartureDateTime);
										($ReturnArrivalDateObj = $FlightSegment[$FlightSegmentCount]->ArrivalDateTime);
										($ReturnDepartureAirportObj = $FlightSegment[0]->DepartureAirport);
										($ReturnArrivalAirportObj = $FlightSegment[ $FlightSegmentCount ]->ArrivalAirport);
										($ReturnMarketingAirlineObj = $FlightSegment[ 0 ]->MarketingAirline);

									}
								}
								else {
									$FlightSegment = $FlightSegmentArray;
									if($OriginDestinationOptionIndex == 0) {
										$departureStop = 'Non Stop';
										($DepartureDateObj = $FlightSegment->DepartureDateTime);
										($ArrivalDateObj = $FlightSegment->ArrivalDateTime);
										($DepartureAirportObj = $FlightSegment->DepartureAirport);
										($ArrivalAirportObj = $FlightSegment->ArrivalAirport);
										($MarketingAirlineObj = $FlightSegment->MarketingAirline);

									}
									else {
										$arrivalStop = 'Non Stop';
										($ReturnDateObj = $FlightSegment->DepartureDateTime);
										($ReturnArrivalDateObj = $FlightSegment->ArrivalDateTime);
										($ReturnDepartureAirportObj = $FlightSegment->DepartureAirport);
										($ReturnArrivalAirportObj = $FlightSegment->ArrivalAirport);
										($ReturnMarketingAirlineObj = $FlightSegment->MarketingAirline);
									}
								}
								
								
							}
							
								$DepartureDateObject = new DateTime( $DepartureDateObj );
								$DepartureAirportDate = $DepartureDateObject->format( "m/d/Y" );
								$ReturnDateObject = new DateTime( $ReturnDateObj );
								$ReturnAirportDate = $ReturnDateObject->format( "m/d/Y" );
								if($DepartureAirportDate == $departureDatefun && $ReturnAirportDate == $returnDatefun) {
									$value = 1;
									$DepartureDate = $DepartureDateObject->format( "m/d/Y" );
									$DepartureDatenew = $DepartureDateObject->format( "m/d/Y" );
									$noofStops = $departureStop;
									$ReturnnoofStops = $arrivalStop;

									$DepartureTime = $DepartureDateObject->format( "H:i" );
									$ArrivalDateObject = new DateTime( $ArrivalDateObj );
									$ArrivalTime = $ArrivalDateObject->format( "H:i" );
									$DepartureAirportDate = $DepartureDateObject->format( "m/d/Y" );
																		
									$DepartureAirlineCode = $MarketingAirlineObj->Code;
									$DepartureAirlineName = $MarketingAirlineObj->_;
									$DepartureAirportCode = $DepartureAirportObj->LocationCode;
									$ArrivalAirportCode = $ArrivalAirportObj->LocationCode;
									$SequenceNumber = $PricedItinerary->SequenceNumber;
									
									$ReturnDate = $ReturnDateObject->format( "m/d/Y" );
									$ReturnDatenew = $ReturnDateObject->format( "m/d/Y" );
									$ReturnDepartureTime = $ReturnDateObject->format( "H:i" );
									$ReturnArrivalDateObject = new DateTime( $ReturnArrivalDateObj );
									$ReturnArrivalTime = $ReturnArrivalDateObject->format( "H:i" );
									$ReturnAirlineCode = $ReturnMarketingAirlineObj->Code;
									$ReturnAirlineName = $ReturnMarketingAirlineObj->_;
									$ReturnDepartureAirportCode = $ReturnDepartureAirportObj->LocationCode;
									$ReturnArrivalAirportCode = $ReturnArrivalAirportObj->LocationCode;
									$totalFare2 = $totalFare;
								}
							
						}
						else {
							$FlightSegment = $OriginDestinationOption->FlightSegment;
						}
					
					}
					
					}
					else {
						$OriginDestinationOption = $PricedItineraries->PricedItinerary->AirItinerary->OriginDestinationOptions->OriginDestinationOption;
					}
					if( $value != 0) {
					
						?>
                        
                       <a id="key" >
						<?php echo $totalFare2; ?>
                        
                        
                            <div class="body">
							
                                <div class="media airline-logo"><img id="jj" src="<?php echo base_url('assets/airline_logo/' . $DepartureAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $DepartureAirlineCode; ?>" title="Jet Airways (9W)"></div>
                                <div class="block">
                                    <strong><?php echo $this->lang->line('departure'); ?> › <?php echo $DepartureDate; ?></strong>
									<input type="hidden" value="<?php echo $DepartureDatenew;?>" id="depart<?php echo $count; ?>"/>
                                    <div class="comment depairline"><?php echo $DepartureAirlineName; ?></div>
                                    <div class="small top">
                                        <?php echo $DepartureAirportCode.' <span class="dtime">'.$DepartureTime."</span>"; ?> →
                                            <?php echo $ArrivalAirportCode.' <span class="atime">'.$ArrivalTime."</span>"; ?> &nbsp;
                                                <span class="quiet totstops nostops<?php echo $count; ?>" style="display:none;"><?php echo $noofStops; ?></span>
                                    </div>
                                </div>
                                <hr style="margin: 10px 0">
                                <div class="media airline-logo"><img id="jj" src="<?php echo base_url('assets/airline_logo/' . $ReturnAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $ReturnAirlineCode; ?>" title="Jet Airways (9W)"></div>
                                <div class="block">
								
								
                                    <strong><?php if(set_value('journey_type') == 'Round') { echo $this->lang->line('return'); } else { echo $this->lang->line('return'); } ?> › <?php echo $ReturnDate; ?></strong>
									<input type="hidden" value="<?php echo $ReturnDatenew;?>" id="return<?php echo $count; ?>"/>
                                    <div class="comment">
                                        <?php echo $ReturnAirlineName; ?>
                                    </div>
                                    <div class="small top">
                                        <?php echo $ReturnDepartureAirportCode.$ReturnDepartureTime; ?> →
                                            <?php echo $ReturnArrivalAirportCode.$ReturnArrivalTime; ?> &nbsp;
                                            <span class="quiet" style="display:none;"><?php echo $ReturnnoofStops; ?></span>
											
											<?php
											if ( isset( $PricedItinerary->SequenceNumber ) ) 
											{
												//$this->load->view( 'flightresults/BookFlightMatrix', $params );
												if ( isset( $SequenceNumber ) ) 
												{
													?>
														<button  onclick="matrix(<?php echo $count; ?>)" class="awe-btn awe-btn-style3" style="margin:20px;"><?php echo $this->lang->line('search_flight'); ?></button>
													<?php													
												} 
											}
											?>
											
												
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                        
                        </a>
                        
                        
                        
                        
                       <?php 
					}
					else {
						?>
						<p style="text-align:center;">-</p>
						<?php
					}
					echo "</td>";
		?>