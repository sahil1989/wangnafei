<?php
if(isset($Item->Air)) {
   $Air = $Item->Air; 
}
else {
    $Air = $Item;
}
$AirEquipType = $Air->Equipment->AirEquipType;


$DepartureAirport = $Air->DepartureAirport;
$DepartureAirportCode = $DepartureAirport->LocationCode;
$DepartureAirportTitle = str_replace(', United States', '', $DepartureAirport->_);

$DepartureDateTime = $Air->DepartureDateTime;
$departureDateObject = new DateTime( $DepartureDateTime );
$DepartureAirportTime = $departureDateObject->format( "H:i" );
$DepartureAirportDate = $departureDateObject->format( "l, d M" );

$ArrivalAirport = $Air->ArrivalAirport;
$ArrivalAirportCode = $ArrivalAirport->LocationCode;
$ArrivalAirportTitle = str_replace(', United States', '', $ArrivalAirport->_);

$ArrivalDateTime = $Air->ArrivalDateTime;
$arrivalDateObject = new DateTime( $ArrivalDateTime);
$ArrivalAirportTime = $arrivalDateObject->format( "H:i" );
$ArrivalAirportDate = $arrivalDateObject->format( "l, d M" );

$FlightNumber = $Air->FlightNumber;

$ArrivalDateTime = $Air->ArrivalDateTime;

$MarketingAirline = $Air->MarketingAirline;
$AirlineName = $MarketingAirline->_;
$AirlineCode = $MarketingAirline->Code;

if(isset($Air->OperatingAirline)) {
    $OperatingAirline = $Air->OperatingAirline;
    $OperatingAirlineName = $OperatingAirline->_;
    if($OperatingAirlineName != $AirlineName) {
        $DifferentOperatingAirlineName = $OperatingAirlineName;
    } 
}

if(isset($Air->TPA_Extensions->CabinType)) {
    $CabinType = $Air->TPA_Extensions->CabinType;
    $Cabin = $CabinType->Cabin;
    $_SESSION['CabinArray'][]=$Cabin;
    $_SESSION['Layover'][]=$Layover;
}
else {
    $Cabin =  $_SESSION['CabinArray'][$i];
    $Layover =  $_SESSION['Layover'][$i];
}

if(isset($Air->TPA_Extensions->ConfirmationNumber)) {
    $ConfirmationNumber = $Air->TPA_Extensions->ConfirmationNumber;
}
?>          
                <tr id="connection_flight">
                    <td>
                        <div style="text-align:center;">
                            <div ><img src="<?php echo base_url('assets/airline_logo/' . $AirlineCode . '.gif', 'https'); ?>"
                                       alt="<?php echo $AirlineCode; ?>" title="<?php echo $AirlineName; ?>" style="background-color: #fff; padding: 10px 20px; width:110px;">
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
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; color: #0091ea; margin: 0;">
                                    <?php echo $DepartureAirportCode; ?>
                                    - <span style="font-size:12px; fornt-weight:700;"><?php echo $DepartureAirportTitle; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;">
                                    <?php echo $DepartureAirportTime; ?>
                                </span>
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
                                <h3 style="color: #0091EA; font-size: 18px; font-weight: 700; margin: 0;">
                                    <?php echo $ArrivalAirportCode; ?>
                                    - <span style="font-size:12px; fornt-weight:700;"><?php echo $ArrivalAirportTitle; ?></span></h3>
                                <span style="display: block; font-size: 18px; font-weight: 700; color: #A5A5A5;">
                                    <?php echo $ArrivalAirportTime; ?></span>
                                <span style="display: block; font-size: 11px; font-weight: 600; color: #666; margin-top: 4px;">
                                    <?php echo $ArrivalAirportDate; ?></span>
                                <p style="font-size: 14px; color: #A5A5A5; margin-top: 2px;"></p>
                            </div>
                        </div>
                    </td>
                </tr> 
                <tr style="">
                    <td align="left"
                        style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;text-align:center;">
                        Aircraft type: <b><?php echo $AirEquipType; ?></b> </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4; border-top: 2px solid #D4D4D4;padding-left: 18px;">
                        <?php if(!empty($Cabin))  { echo "<span style='text-align:left; float:left;'>Flight class :<b>".$Cabin."</b></span>";  } ?>
                        <?php if(!empty($Layover))  { echo "<span style='text-align:right;  float:right;'>Layover time <b>".$Layover."</b></span>";  } ?>
                    </td>
                    <td align="left" style="padding: 5px;border-bottom: 2px solid #D4D4D4;  border-top: 2px solid #D4D4D4;"> 
                       <?php if(!empty($ConfirmationNumber))  { echo "Confirmation Number :<b>".$ConfirmationNumber."</b>";  } ?>
                       
                    </td>
                </tr>                   

               