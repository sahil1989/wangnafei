<?php

    if ( isset( $OTA_AirLowFareSearchPlusRS->Errors ) ) 
	{
                $this->load->view( 'fare/RequestError', array( "errors" => $OTA_AirLowFareSearchPlusRS->Errors ) );
	} 
	else 
	{
		if ( isset( $OTA_AirLowFareSearchPlusRS->PricedItineraries ) ) 
		{
			$PricedItineraries = $OTA_AirLowFareSearchPlusRS->PricedItineraries;
			
			if ( isset( $PricedItineraries->PricedItinerary ) ) 
			{

				$PricedItineraryCount = count( $PricedItineraries->PricedItinerary );

				$params = array();
				$params[ "PricedItineraryTotal" ] = $PricedItineraryCount;
								
				$pages = array( "PricedItineraryTotal" => $PricedItineraryCount );
		         $this->load->view( 'fare/ItineraryPagination', $pages );
		        ?>
		        <button class="btn-success btn-lg btn" onclick="history.go(-1);" style="margin-bottom:10px;">Go Back</button>
		        <?php
				$count = 1;
				 print( "<ul class='booking-list'>" );
				if(is_array($PricedItineraries->PricedItinerary)) {
					foreach ( $PricedItineraries->PricedItinerary as $PricedItineraryIndex => $PricedItinerary ) 
					{						
						$currentAmtVal = $PricedItinerary->AirItineraryPricingInfo->ItinTotalFare->TotalFare->Amount;

						if($currentAmtVal == $totalAmtVal) {
							$params[ "PricedItineraryIndex" ] = $PricedItineraryIndex;
							$params[ "PricedItinerary" ] = $PricedItinerary;
							$params[ "Filename" ] = $Filename;
							$params[ "Count" ] = $count;
							$params[ "totalAmtVal" ] = $totalAmtVal;
							$this->load->view( 'fare/PricedItinerary', $params );
							$totalAmt = $totalAmtVal;
						}

						
					}
						

						
					
				}
				else {
					$params[ "PricedItineraryIndex" ] = 0;
					$params[ "PricedItinerary" ] = $PricedItineraries->PricedItinerary;
					$params[ "Filename" ] = $Filename;
					$params[ "Count" ] = $count;
					$params[ "totalAmtVal" ] = $totalAmtVal;
			        $this->load->view( 'fare/PricedItinerary', $params );
				}
				print( "</ul>" );
			}
		}
	}
?>
