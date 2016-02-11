<?php

     if ( isset( $OTA_AirLowFareSearchMatrixRS->Errors ) ) 
	{
                $this->load->view( 'fare/RequestError', array( "errors" => $OTA_AirLowFareSearchMatrixRS->Errors ) );
	} 
	else 
	{
		if ( isset( $OTA_AirLowFareSearchMatrixRS->PricedItineraries ) ) 
		{
			$PricedItineraries = $OTA_AirLowFareSearchMatrixRS->PricedItineraries;
			
			if ( isset( $PricedItineraries->PricedItinerary ) ) 
			{
				$this->load->view( 'fare/BookingTitle', array( "PricedItineraries" => $PricedItineraries ) );
				
				$count=0;
			?>

                <div class="tabs">
                            <ul>
							
                        <li class="ui-tabs-active ui-state-active"><a href="#tab2" ><?php echo $this->lang->line('best_date'); ?></a>
                        </li>
                     <li><a href="#tab1" ><?php echo $this->lang->line('best_price'); ?></a>
                        </li>
                       
                       
                    </ul>
    				<div class="tab-content">
					
					
					<?php
                    
                    print( " <div id='tab1'>" );
                    $PricedItineraryCount = count( $PricedItineraries->PricedItinerary );
    
                    $params = array();
                    $params[ "PricedItineraryTotal" ] = $PricedItineraryCount;
                                    
                    $pages = array( "PricedItineraryTotal" => $PricedItineraryCount );
                            
                    print( "<ul class='booking-list'>" );
                    $totalAmtVal = 0;
					$count = 1;
                    foreach ( $PricedItineraries->PricedItinerary as $PricedItineraryIndex => $PricedItinerary ) 
                    {
                    	$totalAmtVal = $PricedItinerary->AirItineraryPricingInfo->ItinTotalFare->TotalFare->Amount;
                        $params[ "PricedItineraryIndex" ] = $PricedItineraryIndex;
                        $params[ "PricedItinerary" ] = $PricedItinerary;
                        $params[ "Filename" ] = $Filename;
                        $params[ "journey_type" ] = $_GET['journey_type'];

						$params[ "Count" ] = $count;
						$params[ "totalAmtVal" ] = $totalAmtVal;
                        $this->load->view( 'fare/PricedItinerary', $params );
                    }
                    print ( "</ul>" );
					$this->load->view( 'fare/ItineraryPagination', $pages );
                    print ( "</div>" );
                    ?>
					
					
					<div class="active" id="tab2">
                	<?php 
					if( $_GET['journey_type'] == 'Oneway' || ($_GET['journey_type'] == 'MultiDestination' && $_GET['section3_Departure_Date[0]'] == '')) {
					echo '<table class="table table-bordered table-striped table-booking-history" id="tab-3" style="max-width:100% !important;">';
					$getDeparture_Date = new DateTime($_GET['section1_Departure_Date']);
					$Departure_DateIntervals = $getDeparture_Date->sub(new DateInterval('P3D'));
					$Departure_Periods = new DatePeriod($Departure_DateIntervals, new DateInterval('P1D'), 6);
					foreach ($Departure_Periods as $DepartureDate) {
						?>
						 <th id="keyonewayth"><a class="awe-btn awe-btn-style3" href="#"><?php echo $this->lang->line('departure'); ?><br> <?php echo $DepartureDate->format('m/d/Y'); ?><br><?php echo $DepartureDate->format('l'); ?></a></th>
						<?php
					}
					?>
                    <tr>
                    <?php
                    $getDeparture_Date = new DateTime($_GET['section1_Departure_Date']);
                    $Departure_DateIntervals = $getDeparture_Date->sub(new DateInterval('P3D'));
                    $Departure_Periods = new DatePeriod($Departure_DateIntervals, new DateInterval('P1D'), 6);
                    foreach ($Departure_Periods as $DepartureDate) {
						$params[ "PricedItineraries" ] = $PricedItineraries->PricedItinerary;
						$params[ "departureDatefun" ] = $DepartureDate->format('m/d/Y');
						$count++;
						$params[ "count" ] = $count;
						$this->load->view( 'fare/MatrixCalculationOneway', $params );
                    }
                    ?>
                    </tr>
			</table>
       		<?php
			}
					else {
						echo '<table class="table table-bordered table-striped table-booking-history" id="tab-3" style="max-width:100% !important;">';
						$getDeparture_Date = new DateTime($_GET['section1_Departure_Date']);
						$Departure_DateIntervals = $getDeparture_Date->sub(new DateInterval('P3D'));
						$Departure_Periods = new DatePeriod($Departure_DateIntervals, new DateInterval('P1D'), 6);
						echo "<th></th>";
						foreach ($Departure_Periods as $DepartureDate) {
							?>
							 <th><a class="awe-btn awe-btn-style3" href="#"><?php echo $this->lang->line('departure'); ?><br> <?php echo $DepartureDate->format('m/d/Y'); ?><br><?php echo $DepartureDate->format('l'); ?></a></th>
							
							<?php
						}
						if($_GET['journey_type'] == 'Round') {
							$getReturn_Date = new DateTime($_GET['section2_Departure_Date']);
						}
						else {
							$getReturn_Date = new DateTime($_GET['section3_Departure_Date[0]']);
						}
				
							
						$Return_DateIntervals = $getReturn_Date->sub(new DateInterval('P3D'));
						$Return_Periods = new DatePeriod($Return_DateIntervals, new DateInterval('P1D'), 6);
						
						$Departure_Date_new = $Departure_DateIntervals->format('m/d/Y');
				
						foreach ($Return_Periods as $ReturnDate) {
							echo "<tr>";
							$Departure_Date_new = $Departure_DateIntervals->format('m/d/Y');
							$ReturnDate_new = $ReturnDate->format('m/d/Y');
							$ReturnDate_Dnew = $ReturnDate->format('m/d/Y');
							if($_GET['journey_type'] == 'Round') {
								echo '<th><a class="awe-btn awe-btn-style3" style="min-width:100px" href="#">'.$this->lang->line("return").'<br> '.$ReturnDate_Dnew.'<br>'.$ReturnDate->format('l').'</th>';
							}
							else {
								echo '<th><a class="awe-btn awe-btn-style3" style="min-width:100px" href="#">'.$this->lang->line("return").'<br> '.$ReturnDate_Dnew.'<br>'.$ReturnDate->format('l').'</th>';
							}
							for($i = 0; $i < 7; $i++) {
								$params[ "PricedItineraries" ] = $PricedItineraries->PricedItinerary;
								$params[ "departureDatefun" ] = $Departure_Date_new;
								$params[ "returnDatefun" ] = $ReturnDate_new;
								$count++;
								$params[ "count" ] = $count;
								$this->load->view( 'fare/MatrixCalculation', $params);
								$DepartureDate_old = new DateTime($Departure_Date_new);
								$newDepartureDate = $DepartureDate_old->add(new DateInterval('P1D'));
								$Departure_Date_new = $newDepartureDate->format('m/d/Y');
							}
							echo "</tr>";
						}
						?>
						</table>
						
						<?php
					}
					?>
					
                    </div>
                	
                 </div>
              </div>
                                            
        <?php

			}
		}
	}
?>
                       
                    
                      
     	