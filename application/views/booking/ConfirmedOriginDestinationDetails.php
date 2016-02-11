<?php 
    $totalFare     = "";
    if ( $OriginDestinationOptionIndex === 0 )
    {
        $DecimalPlaces = 2;
        $CurrencyCode  = "$";
        if ( isset( $AirItineraryPricingInfo->ItinTotalFare ) ) 
        {
            $ItinTotalFare = $AirItineraryPricingInfo->ItinTotalFare;
            if ( isset( $ItinTotalFare->TotalFare ) ) 
            {
                $TotalFare  = $ItinTotalFare->TotalFare;
                $TotalFareAmount = $TotalFare->Amount / pow ( 10, $DecimalPlaces );
                $totalFare = $CurrencyCode . " " . number_format( $TotalFareAmount, $DecimalPlaces );
            }
        }
    }

    $flightTitle = "Departure";
    if(isset($_GET['journey_type'] )) {
        $journey_type = $_GET['journey_type'];
    }
    else {
        $journey_type = '';
    }
    if ( $OriginDestinationOptionTotal > 1 && $journey_type === 'Round' ) 
    {
        if ( $OriginDestinationOptionIndex == $OriginDestinationOptionTotal - 1 ) 
        {
            $flightTitle = "Return";
        }
    }
        

    if ( isset($OriginDestinationOption->FlightSegment) ) {

        $FlightSegmentArray = $OriginDestinationOption->FlightSegment;
        $stopNumber = "Non Stop";
        if ( is_array( $FlightSegmentArray ) ) 
        {
            $FlightSegmentCount = count($FlightSegmentArray) - 1;
            $stopNumber =  "{$FlightSegmentCount} Stop";
            $startFlight = $FlightSegmentArray[ 0 ];
            $stopFlight  = $FlightSegmentArray[ $FlightSegmentCount ];

        }
        else
        {   
            $FlightSegment = $FlightSegmentArray;
            $startFlight = $FlightSegment;
            $stopFlight  = $FlightSegment;
        }
        

        $startAirlineName = "";
        $startAirlineCode = "";
        if ( isset( $startFlight->MarketingAirline ) )
        {
            $MarketingAirline = $startFlight->MarketingAirline;
            $startAirlineName = $MarketingAirline->_;
            $startAirlineCode = $MarketingAirline->Code;
        }
        
        $stopAirlineName = "";
        $stopAirlineCode = "";
        if ( isset( $stopFlight->MarketingAirline ) )
        {
            $MarketingAirline = $stopFlight->MarketingAirline;
            $stopAirlineName = $MarketingAirline->_;
            $stopAirlineCode = $MarketingAirline->Code;
        }


        $startOperatingAirlineName = "";
        if ( isset( $startFlight->OperatingAirline ) )
        {
            $OperatingAirline = $startFlight->OperatingAirline;
            $startOperatingAirlineName = $OperatingAirline->_;
        }


        $stopOperatingAirlineName = "";
        if ( isset( $stopFlight->OperatingAirline ) )
        {
            $OperatingAirline = $stopFlight->OperatingAirline;
            $stopOperatingAirlineName = $OperatingAirline->_;
        }


        if($startAirlineName != $startOperatingAirlineName) {
            $StartDifferentOperatingAirlineName = $startOperatingAirlineName;
        }
        else {
            $StartDifferentOperatingAirlineName = '';
        }

        if($stopAirlineName != $stopOperatingAirlineName) {
            $stopDifferentOperatingAirlineName = $stopOperatingAirlineName;
        }
        else {
            $stopDifferentOperatingAirlineName = '';
        }
        
        $DepartureAirportName = "";
        $DepartureAirportCode = "";
        if ( isset( $startFlight->DepartureAirport ) )
        {
            $DepartureAirport = $startFlight->DepartureAirport;
            $DepartureAirportName = str_replace(', United States', '', $DepartureAirport->_);
            $DepartureAirportCode = $DepartureAirport->LocationCode;
        }
        $ArrivalAirportName = "";
        $ArrivalAirportCode = "";
        if ( isset( $stopFlight->ArrivalAirport ) )
        {
            $ArrivalAirport = $stopFlight->ArrivalAirport;
            $ArrivalAirportName = str_replace(', United States', '', $ArrivalAirport->_);
            $ArrivalAirportCode = $ArrivalAirport->LocationCode;
        }
        
        $JourneyTotalDuration = $startFlight->TPA_Extensions->JourneyTotalDuration; 
        

        $departureDateObject = new DateTime( $startFlight->DepartureDateTime );
        $DepartureAirportTime = $departureDateObject->format( "H:i" );
        $DepartureAirportDate = $departureDateObject->format( "l, d M" );

        $arrivalDateObject = new DateTime( $stopFlight->ArrivalDateTime );
        $ArrivalAirportTime = $arrivalDateObject->format( "H:i" );
        $ArrivalAirportDate = $arrivalDateObject->format( "l, d M" );

        $flightTimeArray = explode(":", $JourneyTotalDuration);
        $flightTime = $flightTimeArray[0].' h '.$flightTimeArray[1].' m';

        $FlightNumber = $startFlight->FlightNumber;

       
        if ( is_array( $FlightSegmentArray ) ) 
        {
            $cf = 0;
            foreach ( $FlightSegmentArray as $FlightSegmentIndex => $FlightSegment ) 
            {
                $AirlineName = "";
                $AirlineCode = "";
                if ( isset( $FlightSegment->MarketingAirline ) )
                {
                    $MarketingAirline = $FlightSegment->MarketingAirline;
                    $AirlineName = $MarketingAirline->_;
                    $AirlineCode = $MarketingAirline->Code;
                }


                $OperatingAirlineName = "";
                $OperatingAirlineCode = "";
                if ( isset( $FlightSegment->OperatingAirline ) )
                {
                    $OperatingAirline = $FlightSegment->OperatingAirline;
                    $OperatingAirlineName = $OperatingAirline->_;
                }

                if($AirlineName != $OperatingAirlineName) {
                    $DifferentOperatingAirlineName = $OperatingAirlineName;
                }
                else {
                    $DifferentOperatingAirlineName = '';
                }
                
                $EquipmentType = "";
                $EquipmentName = "";
                if ( isset( $FlightSegment->Equipment ) ) 
                {
                    $Equipment = $FlightSegment->Equipment;
                    if ( isset( $Equipment->_            ) ) { $EquipmentName = $Equipment->_;            }
                    if ( isset( $Equipment->AirEquipType ) ) { $EquipmentType = $Equipment->AirEquipType; }
                
                }
                
                $CabinName = "";
                if ( isset( $FlightSegment->TPA_Extensions ) )
                {
                    $TPA_Extensions = $FlightSegment->TPA_Extensions;
                    if ( isset( $TPA_Extensions->CabinType ) )
                    {
                        $CabinType = $TPA_Extensions->CabinType;
                        if ( isset( $CabinType->Cabin ) )
                        {
                            $CabinName = $CabinType->Cabin;
                        }
                    }
                }

                $DepartureAirportTitle = "";
                $DepartureAirportCode  = "";
                $DepartureAirportTime  = "";
                $DepartureAirportDate  = "";
                if ( isset( $FlightSegment->DepartureAirport ) )
                {
                    $DepartureAirport = $FlightSegment->DepartureAirport;   
                    $DepartureAirportCode = $DepartureAirport->LocationCode;
                    $DepartureAirportTitle = str_replace(', United States', '', $DepartureAirport->_);
                }
                $departureDateObject = new DateTime( $FlightSegment->DepartureDateTime );
                $DepartureAirportTime = $departureDateObject->format( "H:i" );
                $DepartureAirportDate = $departureDateObject->format( "l, d M" );

                $ArrivalAirportTitle = "";
                $ArrivalAirportCode  = "";
                $ArrivalAirportTime  = "";
                $ArrivalAirportDate  = "";
                if ( isset( $FlightSegment->ArrivalAirport ) )
                {
                    $ArrivalAirport = $FlightSegment->ArrivalAirport;   
                    $ArrivalAirportCode = $ArrivalAirport->LocationCode;
                    $ArrivalAirportTitle = str_replace(', United States', '', $ArrivalAirport->_);
                }
                $arrivalDateObject = new DateTime( $FlightSegment->ArrivalDateTime );
                $ArrivalAirportTime = $arrivalDateObject->format( "H:i" );
                $ArrivalAirportDate = $arrivalDateObject->format( "l, d M" );

                /*$diff = $arrivalDateObject->diff( $departureDateObject ); 
                $flightTime = $diff->format( "%h h %i min" );*/

                $FlightNumber = $FlightSegment->FlightNumber;

               // print_r($FlightSegmentArray);
                $layover_different = '';

                if(isset($FlightSegmentArray[$cf+1])) {
                    $departureDateObject = new DateTime( $FlightSegmentArray[$cf]->ArrivalDateTime );
                    $arrivalDateObject = new DateTime( $FlightSegmentArray[$cf+1]->DepartureDateTime );
                    $layover_diff = $arrivalDateObject->diff( $departureDateObject ); 
                    $layover_different = $layover_diff->format( "%h:%i" );                 
                }
                
                ?>           
                <tr id="connection_flight<?= $cf; ?>">
                    <td>
                        <div style="text-align:center;">
                            <div ><img src="<?php echo base_url('assets/airline_logo/' . $AirlineCode . '.gif', 'https'); ?>" alt="<?php echo $AirlineCode; ?>" title="<?php echo $AirlineName; ?>" style="background-color: #fff; padding: 10px 20px; width:70px;">
                            </div>
                            <div  style="margin-top: 8px;text-align:center;">
                                <span style="font-size: 12px; font-weight: 400; color: #A5A5A5;"><?php echo $AirlineName; ?></span>
                                <p style="font-size: 18px; font-weight: 700; color: #0091ea; margin: 0; "><?php echo $AirlineCode. ' ' .$FlightNumber; ?></p>
                            </div>
                        </div>
                        </th>
                    </td>
                    <td style="padding: 5px;">
                        <div style="font-size: 0; overflow: hidden;">
                            <div style="width:96%; display: inline-block; padding: 0 2%; vertical-align: middle;text-align:left;">
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;"><?php echo $DepartureAirportCode; ?> - <span style="font-size:12px; fornt-weight:700;"><?php echo $DepartureAirportTitle; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;"><?php echo $DepartureAirportTime; ?></span>
                                 <span style="display: block; font-size: 11px; font-weight: 600; color: #666; margin-top: 4px;"><?php echo $DepartureAirportDate; ?></span>
                                 <p style="font-size: 14px; color: #A5A5A5; margin-top: 2px;"></p>
                                
                                <?php
                                if(!empty($DifferentOperatingAirlineName)) {
                                    ?>
                                    <p><strong>Flight Operated By <?php echo $DifferentOperatingAirlineName; ?></strong></p>
                                    <?php
                                }
                                ?>
                            </div>
						</div>
					</td>
					<td style="padding: 5px;">
						<div style="font-size: 0; overflow: hidden;">
                            <div style="width:96%; display: inline-block; padding: 0 2%; vertical-align: middle;text-align:left;">
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;"><?php echo $ArrivalAirportCode; ?>- <span style="font-size:12px; fornt-weight:700;"><?php echo $ArrivalAirportTitle; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;"><?php echo $ArrivalAirportTime; ?></span> 
                                <span style="display: block; font-size: 11px; font-weight: 600; color: #666; margin-top: 4px;"><?php echo $ArrivalAirportDate; ?></span>
                                <p style="font-size: 14px; color: #A5A5A5; margin-top: 2px;"></p>
                            </div>
                        </div>
                    </td>
                </tr> 
                <tr style="">
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;text-align:center;">Aircraft type: <b><?php echo $EquipmentType; ?></b> </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;padding-left: 18px;    width: 250px;">
                        Flight class: <b><?php echo $CabinName; ?></b>

                    </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4;  border-top: 2px solid #D4D4D4;"> 
                       <?php if(!empty($layover_different))  { echo "Layover time <b>".$layover_different."</b>";  } ?>
                    </td>
                </tr>                   

                <?php
                $cf++;
            }
            ?>
            <?php
        }
        else {
            $FlightSegment = $OriginDestinationOption->FlightSegment;
            
            $FlightSegment = $OriginDestinationOption->FlightSegment;
            
            $EquipmentType = "";
            $EquipmentName = "";
            if ( isset( $FlightSegment->Equipment ) ) 
            {
                $Equipment = $FlightSegment->Equipment;
                if ( isset( $Equipment->_            ) ) { $EquipmentName = $Equipment->_;            }
                if ( isset( $Equipment->AirEquipType ) ) { $EquipmentType = $Equipment->AirEquipType; }
            
            }
            
            $CabinName = "";
            if ( isset( $FlightSegment->TPA_Extensions ) )
            {
                $TPA_Extensions = $FlightSegment->TPA_Extensions;
                if ( isset( $TPA_Extensions->CabinType ) )
                {
                    $CabinType = $TPA_Extensions->CabinType;
                    if ( isset( $CabinType->Cabin ) )
                    {
                        $CabinName = $CabinType->Cabin;
                    }
                }
            }

            ?>
             <tr>
                    <td>
                        <div>
                            <div class="image-thumb"  style="text-align:center;"><img src="<?php echo base_url('assets/airline_logo/' . $startAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $startAirlineCode; ?>" title="<?php echo $startAirlineName; ?>" style="background-color: #fff; padding: 10px 20px;  width:110px;">
                            </div>
                            <div class="text" style="margin-top: 8px;text-align:center;">
                                <span style="font-size: 12px; font-weight: 400; color: #A5A5A5;"><?php echo $startAirlineName; ?></span>
                                <p style="font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;"> <?php echo $startAirlineCode. ' ' .$FlightNumber; ?></p>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div  style="padding: 0; font-size: 0; overflow: hidden;">
                            <div style="width:96%; display: inline-block; padding: 0 2%;vertical-align: middle;text-align:left;">
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;"><?php echo $DepartureAirportCode; ?> - <span style="font-size:12px; fornt-weight:700;"><?php echo $DepartureAirportName; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;"><?php echo $DepartureAirportTime; ?></span>
                                 <span style="display: block; font-size: 11px; font-weight: 600; color: #666; margin-top: 4px;"><?php echo $DepartureAirportDate; ?></span>
                                
                                <?php
                                if(!empty($StartDifferentOperatingAirlineName)) {
                                    ?>
                                    <p><strong>Flight Operated By <?php echo $StartDifferentOperatingAirlineName; ?></strong></p>
                                    <?php
                                }
                                ?>
                            </div>
						</div>
					</td>
					<td style="padding: 5px;">
						<div style="font-size: 0; overflow: hidden;">
						
                            <div style="width:96%; display: inline-block; padding: 0 2%; vertical-align: middle;text-align:left;">
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;"><?php echo $ArrivalAirportCode; ?>- <span style="font-size:12px; fornt-weight:700;"><?php echo $ArrivalAirportName; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;"><?php echo $ArrivalAirportTime; ?></span> 
                                <span  style="display: block; font-size: 11px; font-weight: 600; color: #666; margin-top: 4px;"><?php echo $ArrivalAirportDate; ?></span>
                            </div>
                        </div>
                    </td>
                </tr> 
                <tr style="">
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;text-align:center;">Aircraft type: <b><?php echo $EquipmentType; ?></b> </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;padding-left: 18px;    width: 250px;">
                        Flight class: <b><?php echo $CabinName; ?></b>

                    </td>
                    <td align="left" style="padding: 5px; border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;"> 
                        <?php
                        if ( isset( $PricedItinerary->SequenceNumber ) ) 
                        {
                            
                            $params[ "SequenceNumber" ] = $PricedItinerary->SequenceNumber;
                            $params[ "Filename" ] = $Filename;
                            $this->load->view( 'fare/AirTerms', $params );
                        }else{
							echo " ";
						}
                        ?>
                    </td>
                </tr>   
           
        
           
            
            

            <?php
        }
    }
    ?>