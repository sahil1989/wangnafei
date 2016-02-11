<div class="row">
    <div class="col-md-12">
        <div class="product-detail__info">
            <div class="product-title">
                <h4>
                	<?php
                	$totalflights = 0;
					/*if ( isset( $PricedItineraries->PricedItinerary ) ) {
						$totalflights = count( $PricedItineraries->PricedItinerary );
					}
					$from 	  = $_GET['section1_Departure_Location'];
					$from_pos = strpos($from, ',');
					if($from_pos > 0) {
						$fromArr  = explode( ",", $from );
						$section1_Departure_Location = element( 1, $fromArr, "" );
					}
					else {
						$section1_Departure_Location = strtoupper($from);
					}

					$to 	  = $_GET['section1_Arrival_Location'];
					$to_pos = strpos($to, ',');
					if($to_pos > 0) {
						$toArr  = explode( ",", $to );
						$section1_Arrival_Location = element( 1, $toArr, "" );
					}
					else {
						$section1_Arrival_Location = strtoupper($to);
					}
					echo $section1_Departure_Location;
					echo " - ";
					echo $section1_Arrival_Location; 
					echo "<br>";
					if($_GET['journey_type']=="Round"){
						echo $section1_Arrival_Location;
						echo " - ";
						echo $section1_Departure_Location; 
						echo "<br>";
					}
					if(isset($_GET['section3_Arrival_Location'][0])){
						$from 	  = $_GET['section3_Departure_Location'][0];
						$from_pos = strpos($from, ',');
						if($from_pos > 0) {
							$fromArr  = explode( ",", $from );
							$section3_Departure_Location = element( 1, $fromArr, "" );
						}
						else {
							$section3_Departure_Location = strtoupper($from);
						}
						echo $section3_Departure_Location." - ";
											}
					if(isset($_GET['section3_Arrival_Location'][0])){
						$to 	  = $_GET['section3_Arrival_Location'][0];
						$to_pos = strpos($to, ',');
						if($to_pos > 0) {
							$toArr  = explode( ",", $to );
							$section3_Arrival_Location = element( 1, $toArr, "" );
						}
						else {
							$section3_Arrival_Location = strtoupper($to);
						}
						echo $section3_Arrival_Location."<br>";
					}

					if(isset($_GET['section3_Arrival_Location'][1])){
						$from 	  = $_GET['section3_Departure_Location'][1];
						$from_pos = strpos($from, ',');
						if($from_pos > 0) {
							$fromArr  = explode( ",", $from );
							$section3_Departure_Location = element( 1, $fromArr, "" );
						}
						else {
							$section3_Departure_Location = strtoupper($from);
						}
						echo $section3_Departure_Location." - ";
											}
					if(isset($_GET['section3_Arrival_Location'][1])){
						$to 	  = $_GET['section3_Arrival_Location'][1];
						$to_pos = strpos($to, ',');
						if($to_pos > 0) {
							$toArr  = explode( ",", $to );
							$section3_Arrival_Location = element( 1, $toArr, "" );
						}
						else {
							$section3_Arrival_Location = strtoupper($to);
						}
						echo $section3_Arrival_Location."<br>";
					}*/

					if ( isset( $PricedItineraries->PricedItinerary ) ) {
						$totalflights = count( $PricedItineraries->PricedItinerary );
					}
					$from 	  = $_GET['section1_Departure_Location'];
					$from_pos = strpos($from, ',');
					if($from_pos > 0) {
						$section1_Departure_Location = $from;
					}
					else {
						$section1_Departure_Location = strtoupper($from);
					}

					$to 	  = $_GET['section1_Arrival_Location'];
					$to_pos = strpos($to, ',');
					if($to_pos > 0) {
						$section1_Arrival_Location = $to;
					}
					else {
						$section1_Arrival_Location = strtoupper($to);
					}
					echo $section1_Departure_Location;
					echo " - ";
					echo $section1_Arrival_Location; 
					echo "<br>";
					if($_GET['journey_type']=="Round"){
						echo $section1_Arrival_Location;
						echo " - ";
						echo $section1_Departure_Location; 
						echo "<br>";
					}
					if($_GET['journey_type'] == 'MultiDestination'){
						for( $j=0; $j< ($_GET['citycount'] - 1); $j++) {
							$from 	  = $_GET['section3_Departure_Location'][$j];
							$from_pos = strpos($from, ',');
							if($from_pos > 0) {
								
								$section3_Departure_Location = $from;
							}
							else {
								$section3_Departure_Location = strtoupper($from);
							}
							echo $section3_Departure_Location." - ";
							$to 	  = $_GET['section3_Arrival_Location'][$j];
							$to_pos = strpos($to, ',');
							if($to_pos > 0) {
								$section3_Arrival_Location = $to;
							}
							else {
								$section3_Arrival_Location = strtoupper($to);
							}
							echo $section3_Arrival_Location."<br>";
						}

					}
						
					
					echo "<span class='totalcount'><strong>{$totalflights}</strong> (flights available)</span>";
					?>
				</h4>
            </div>
        </div>
    </div>
</div>

<hr>