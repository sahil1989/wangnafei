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

    $flightTitle = $this->lang->line('departure');
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
            $flightTitle = $this->lang->line('return');
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

        ?>
        <tr class="flightmain">
            <th>
                <div class="item-thumb">
                    <div class="image-thumb"><img src="<?php echo base_url('assets/airline_logo/' . $startAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $startAirlineCode; ?>" title="<?php echo $startAirlineName; ?>">
                    </div>
                    <div class="text">
                    <span class="airlinename"><?php echo $startAirlineName; ?></span>
                        <p><?php echo $startAirlineCode. ' '. $FlightNumber; ?></p>
                    </div>
                </div>
            </th>
            <td>
                <div class="item-body">
                    <div class="item-from">
                        <h3><?php echo $DepartureAirportCode; ?></h3>
                        <span class="time deptime"><?php echo $DepartureAirportTime; ?></span>
                        <span class="date"><?php echo $DepartureAirportDate; ?></span>
                        <?php
                        if(!empty($StartDifferentOperatingAirlineName)) {
                            
                            ?>
                            <p><strong>Flight Operated By <?php echo $StartDifferentOperatingAirlineName; ?></strong></p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="item-time">
                    <i class="fa fa-clock-o"></i> 
                    <span><?php echo $flightTime; ?></span>
                    <span class="stopscount"><?php echo $stopNumber; ?></span>
                    <?php if($DepartureAirportDate != $ArrivalAirportDate) { 
                      
                        ?>
                        <span style="font-size: 12px; color:#0091EA; border:none; width:100%; margin-top:-20px;">
                            <br>
                            <?php
                            $datetime1 = new DateTime($DepartureAirportDate);
                            $datetime2 = new DateTime($ArrivalAirportDate);
                            $interval = $datetime1->diff($datetime2);
                            $layover_diff_date =  $interval->format('%R%a');
                            if($layover_diff_date == '+1') {
                                echo 'Next Day';
                            }
                            elseif( $layover_diff_date == '-1') {
                                echo 'Previous Day';
                            } 
                            else {
                               echo $layover_diff_date. ' days';
                            }
                            //echo $DepartureAirportDate.$ArrivalAirportDate.'kaja';?>
                        </span>
                    <?php } ?>
                    </div>
                    <div class="item-to">
                        <h3><?php echo $ArrivalAirportCode; ?></h3>
                        <span class="time arrtime"><?php echo $ArrivalAirportTime; ?></span> 
                        <span class="date"><?php echo $ArrivalAirportDate; ?></span>
                    </div>
                </div>
            </td>
            <td>
                <a class="awe-btn displaymore"><?php echo $this->lang->line('more'); ?></a>
            </td>
        </tr>
         
        <?php
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
                    $layover_different = $layover_diff->format( "%H:%I" );                 
                }
                
                ?>           
                <tr class="hd1 drop" style="margin-top:-1%;display:none" id="connection_flight<?= $cf; ?>">
                    <th>
                        <div class="item-thumb">
                            <div class="image-thumb"><img src="<?php echo base_url('assets/airline_logo/' . $AirlineCode . '.gif', 'https'); ?>" alt="<?php echo $AirlineCode; ?>" title="<?php echo $AirlineName; ?>">
                            </div>
                            <div class="text">
                                <span><?php echo $AirlineName; ?></span>
                                <p><?php echo $AirlineCode. ' ' .$FlightNumber; ?></p>
                            </div>
                        </div>
                        </th>
                    </th>
                    <td colspan="2">
                        <div class="item-body">
                            <div class="item-from">
                                <h3><?php echo $DepartureAirportCode; ?> - <span style="font-size:12px; fornt-weight:700;"><?php echo $DepartureAirportTitle; ?></span></h3>
                                <span class="time"><?php echo $DepartureAirportTime; ?></span>
                                 <span class="date"><?php echo $DepartureAirportDate; ?></span>
                                 <p class="desc"></p>
                                
                                <?php
                                if(!empty($DifferentOperatingAirlineName)) {
                                    ?>
                                    <p><strong>Flight Operated By <?php echo $DifferentOperatingAirlineName; ?></strong></p>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="item-to">
                                <h3><?php echo $ArrivalAirportCode; ?>- <span style="font-size:12px; fornt-weight:700;"><?php echo $ArrivalAirportTitle; ?></span></h3>
                                <span class="time"><?php echo $ArrivalAirportTime; ?></span> 
                                <span class="date"><?php echo $ArrivalAirportDate; ?></span>
                                <p class="desc"></p>
                            </div>
                        </div>
                    </td>
                </tr> 
                <tr class="hd1" style="display:none;">
                    <td align="left">Aircraft type: <b><?php echo $EquipmentType; ?></b> </td>
                    <td align="left">
                        Flight class: <b><?php echo $CabinName; ?></b>
                        <span style="padding-left: 60px;">
                            <?php if(!empty($layover_different))  { echo "Layover time <b>".$layover_different."</b>";  } ?>
                        </span>

                    </td>
                    <td align="left"> 
                        <?php
                        if ( isset( $PricedItinerary->SequenceNumber ) ) 
                        {
                            
                            $params[ "SequenceNumber" ] = $PricedItinerary->SequenceNumber;
                            $params[ "Filename" ] = $Filename;
                            $this->load->view( 'fare/AirTerms', $params );
                        }
                        ?>
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
             <tr class="hd1 drop" style="margin-top:-1%;display:none">
                    <th>
                        <div class="item-thumb">
                            <div class="image-thumb"><img src="<?php echo base_url('assets/airline_logo/' . $startAirlineCode . '.gif', get_protocol()); ?>" alt="<?php echo $startAirlineCode; ?>" title="<?php echo $startAirlineName; ?>">
                            </div>
                            <div class="text">
                                <span><?php echo $startAirlineName; ?></span>
                                <p><?php echo $startAirlineCode. ' ' .$FlightNumber; ?></p>
                            </div>
                        </div>
                    </th>
                    <td colspan="2">
                        <div class="item-body">
                            <div class="item-from">
                                <h3><?php echo $DepartureAirportCode; ?> - <span style="font-size:12px; fornt-weight:700;"><?php echo $DepartureAirportName; ?></span></h3>
                                <span class="time"><?php echo $DepartureAirportTime; ?></span>
                                 <span class="date"><?php echo $DepartureAirportDate; ?></span>
                                
                                <?php
                                if(!empty($StartDifferentOperatingAirlineName)) {
                                    ?>
                                    <p><strong>Flight Operated By <?php echo $StartDifferentOperatingAirlineName; ?></strong></p>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="item-to">
                                <h3><?php echo $ArrivalAirportCode; ?>- <span style="font-size:12px; fornt-weight:700;"><?php echo $ArrivalAirportName; ?></span></h3>
                                <span class="time"><?php echo $ArrivalAirportTime; ?></span> 
                                <span class="date"><?php echo $ArrivalAirportDate; ?></span>
                            </div>
                        </div>
                    </td>
                </tr> 
                <tr class="hd1" style="display:none;">
                    <td align="left"><?php echo $this->lang->line('air_craft_type'); ?>: <b><?php echo $EquipmentType; ?></b> </td>
                    <td align="left">
                       <?php echo $this->lang->line('flight_class'); ?>: <b><?php echo $CabinName; ?></b>

                    </td>
                    <td align="left"> 
                        <?php
                        if ( isset( $PricedItinerary->SequenceNumber ) ) 
                        {
                            
                            $params[ "SequenceNumber" ] = $PricedItinerary->SequenceNumber;
                            $params[ "Filename" ] = $Filename;
                            $this->load->view( 'fare/AirTerms', $params );
                        }
                        ?>
                    </td>
                </tr>   
           
        
           
            </div> 
            
            

            <?php
        }
    }
    ?>