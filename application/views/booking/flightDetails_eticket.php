<?php
$AirlineCode = $flightDetails->airline_code;
$AirlineName = $flightDetails->airlines_name;
$FlightNumber = $flightDetails->flight_no;
$departure_airport = $flightDetails->arrival_airport;
$arrival_airport = $flightDetails->departure_airport;
$departure_dt = $flightDetails->departure_dt;
$arrival_dt = $flightDetails->arrival_dt;
$DepartureAirportCode = substr($departure_airport, strrpos($departure_airport, '-') + 1);
$ArrivalAirportCode = substr($arrival_airport, strrpos($arrival_airport, '-') + 1);
$DepartureAirportTitle = substr($departure_airport, 0, strrpos($departure_airport, '-'));
$ArrivalAirportTitle = substr($arrival_airport, 0, strrpos($arrival_airport, '-'));
$DepartureAirportTime = date('H:i', strtotime($departure_dt));
$ArrivalAirportTime = date('H:i', strtotime($arrival_dt));
$DepartureAirportDate = date('l, d m', strtotime($departure_dt));
$ArrivalAirportDate = date('l, d m', strtotime($arrival_dt));
$AirEquipType = $flightDetails->equipment_type;
$ConfirmationNumber = $flightDetails->confirm_no;
?>         
                <tr id="connection_flight">
                    <td>
                        <div style="text-align:center;">
                            <div ><img src="<?php echo base_url('assets/airline_logo/' . $AirlineCode . '.gif', 'https'); ?>" alt="<?php echo $AirlineCode; ?>" title="<?php echo $AirlineName; ?>" style="background-color: #fff; padding: 10px 20px; width:110px;">
                            </div>
                            <div  style="margin-top: 8px;text-align:center;">
                                <span style="font-size: 12px; font-weight: 400; color: #A5A5A5;"><?php echo $AirlineName; ?></span>
                                <p style="font-size: 18px; font-weight: 700; color: #0091ea; margin: 0; "><?php echo $AirlineCode. ' ' .$FlightNumber; ?></p>
                            </div>
                        </div>
                        </th>
                    </td>
                    <td style="padding: 5px; width: 365px;">
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
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;text-align:center;">Aircraft type: <b><?php echo $AirEquipType; ?></b> </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;padding-left: 18px;">
                        &nbsp;
                    </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4;  border-top: 2px solid #D4D4D4;"> 
                       <?php if(!empty($ConfirmationNumber))  { echo "Confirmation Number :<b>".$ConfirmationNumber."</b>";  } ?>
                    </td>
                </tr>                   

               