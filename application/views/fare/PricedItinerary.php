 <div class="initiative__item flightno price-box"  id="flight<?php echo $PricedItineraryIndex; ?>" style="<?php if($PricedItineraryIndex>9) echo "display:none;";?>">
    <?php
	$params = array();
	if ( isset( $PricedItinerary->AirItineraryPricingInfo ) ) 
	{
		
		$AirItineraryPricingInfo = $PricedItinerary->AirItineraryPricingInfo;
		$params[ "AirItineraryPricingInfo" ] = $AirItineraryPricingInfo;
		$this->load->view( 'fare/AirItineraryPricingInfo', $params );
	}
	?>
    
    <table class="initiative-table">
        <tbody>
            <?php
			if ( isset( $PricedItinerary->AirItinerary ) ) 
			{
				$AirItinerary = $PricedItinerary->AirItinerary;

				if ( isset( $AirItinerary->OriginDestinationOptions ) ) 
				{
					$OriginDestinationOptions = $AirItinerary->OriginDestinationOptions;

					if ( isset( $OriginDestinationOptions->OriginDestinationOption ) ) 
					{
						$OriginDestinationOptionArray = $OriginDestinationOptions->OriginDestinationOption;

						if ( is_array( $OriginDestinationOptionArray ) ) 
						{
							$params[ "OriginDestinationOptionTotal" ] = count( $OriginDestinationOptionArray );
						
							foreach ( $OriginDestinationOptionArray as $OriginDestinationOptionIndex => $OriginDestinationOption ) 
							{
								$params[ "OriginDestinationOption" ] = $OriginDestinationOption;
								$params[ "OriginDestinationOptionIndex" ] = $OriginDestinationOptionIndex;
								$this->load->view( 'fare/OriginDestinationOption', $params );
							}
						}
						else
						{
							$params[ "OriginDestinationOptionTotal" ] = 1;
							$params[ "OriginDestinationOption" ] = $OriginDestinationOptionArray;
							$params[ "OriginDestinationOptionIndex" ] = 0;
							$this->load->view( 'fare/OriginDestinationOption', $params );
							
						}
					}
				}
			}

			            
           if ( isset( $PricedItinerary->SequenceNumber ) ) 
			{
				
				$params[ "SequenceNumber" ] = $PricedItinerary->SequenceNumber;
				$params[ "Filename" ] = $Filename;
				$this->load->view( 'booking/bookFlight', $params );
			}
			?>
            
        </tbody>
        
    </table>
</div>
