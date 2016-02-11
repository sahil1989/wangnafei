 <div class="initiative__item flightno price-box">
    <?php
	$params = array();
	if ( isset( $flightDetails->AirItineraryPricingInfo ) ) 
	{
		
		$AirItineraryPricingInfo = $flightDetails->AirItineraryPricingInfo;
		$params[ "AirItineraryPricingInfo" ] = $AirItineraryPricingInfo;
		$this->load->view( 'booking/passengerDetails', $params );
	}
	?>

    <table class="initiative-table">
        <tbody>
            <?php
			if ( isset( $result->OTA_TravelItineraryRS->TravelItinerary->ItineraryInfo ) ) 
			{
				$ItineraryInfo = $result->OTA_TravelItineraryRS->TravelItinerary->ItineraryInfo;

				if(isset($ItineraryInfo->ReservationItems->Item))
				{
					$i = 0;
					$Items = $ItineraryInfo->ReservationItems->Item;

					if(is_array($Items)) {
						foreach($Items as $Item) {

							$params['i'] = $i;
							$params['Item'] = $Item;
							$this->load->view('booking/flightDetails', $params);
							$i++;
						}

					}
					else {
							$params['i'] = $i;
							$params['Item'] = $Items;
							$this->load->view('booking/flightDetails', $params);
					}
				}

				
			}
			else {
				if($this->session->has_userdata('CabinArray')) {
					unset($_SESSION['CabinArray']);
					unset($_SESSION['Layover']);
				}
				if(isset($flightDetails->AirItinerary)) {
					$AirItinerary = $flightDetails->AirItinerary;
					$OriginDestinationOptions = $AirItinerary->OriginDestinationOptions;
					if(isset($OriginDestinationOptions->OriginDestinationOption)) {
						$OriginDestinationOptionArray = $OriginDestinationOptions->OriginDestinationOption;
						$i = 0;
						if(is_array($OriginDestinationOptionArray)) {
							foreach ($OriginDestinationOptionArray as $OriginDestinationOption) {
								$cf = 0;
								if(isset($OriginDestinationOption->FlightSegment)) {
									$Items = $OriginDestinationOption->FlightSegment;



									if(is_array($Items)) {

										
										foreach($Items as $Item) {

											if(isset($Items[$cf+1])) {
							                    $departureDateObject = new DateTime( $Items[$cf]->ArrivalDateTime );
							                    $arrivalDateObject = new DateTime( $Items[$cf+1]->DepartureDateTime );
							                    $layover_diff = $arrivalDateObject->diff( $departureDateObject ); 
							                    $layover_different = $layover_diff->format( "%H:%I" );
							                    $params['Layover'] = $layover_different;
							                    $params['i'] = $i;
							                    $cf++;
							                    $i++;  
							                }
							                else {
							                	$params['Layover'] = '';
							                }

											$params['Item'] = $Item;
											$this->load->view('booking/flightDetails', $params);
										}
										     

									}
									else {
										$params['Layover'] = '';
										$params['Item'] = $Items;
										$this->load->view('booking/flightDetails', $params);
									}
								}
							}
						}
						else {
							$OriginDestinationOption = $OriginDestinationOptionArray;
							$cf = 0;
							if(isset($OriginDestinationOption->FlightSegment)) {
								$Items = $OriginDestinationOption->FlightSegment;

								if(is_array($Items)) {
									foreach($Items as $Item) {
										if(isset($Items[$cf+1])) {
						                    $departureDateObject = new DateTime( $Items[$cf]->ArrivalDateTime );
						                    $arrivalDateObject = new DateTime( $Items[$cf+1]->DepartureDateTime );
						                    $layover_diff = $arrivalDateObject->diff( $departureDateObject ); 
						                    $layover_different = $layover_diff->format( "%H:%I" );
						                    $params['Layover'] = $layover_different;
						                    $params['i'] = $i;
						                    $cf++;
						                    $i++;  
						                }
						                else {
						                	$params['Layover'] = '';
						                }

										$params['Item'] = $Item;
										$this->load->view('booking/flightDetails', $params);
									}

								}
								else {
										$params['Layover'] = '';
										$params['Item'] = $Items;
										$this->load->view('booking/flightDetails', $params);
								}
							}
						}
					}

				}
			}

			
			            
           ?>
            
        </tbody>
        
    </table>

</div>