<div class="col-md-12" style="margin:0;padding:0;">
<?php
$result = json_decode($result);
if ( isset( $result ) ) {
    if ( isset( $result->OTA_AirLowFareSearchPlusRS ) ) 
    {
                $this->load->view( 'fare/SameItineraryResults', array( "OTA_AirLowFareSearchPlusRS" => $result->OTA_AirLowFareSearchPlusRS,  "Filename" => $Filename ) );
    }
}
?>
</div>
    