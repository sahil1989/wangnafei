<?php
    $totalBase     = "";
    $totalTax      = "";
    $totalService  = "";
    $totalDiscount = "";
    $totalFare     = "";
    
    $DecimalPlaces = 2;
    $CurrencyCode  = "$";

    if ( isset( $AirItineraryPricingInfo->ItinTotalFare ) ) 
    {
        $ItinTotalFare = $AirItineraryPricingInfo->ItinTotalFare;
        
        if ( isset( $ItinTotalFare->BaseFare ) ) 
        {   
            $BaseFare   = $ItinTotalFare->BaseFare;
            $DecimalPlaces  = $BaseFare->DecimalPlaces;
            
            $BaseFareAmount = $BaseFare->Amount / pow ( 10, $DecimalPlaces );
            
            $totalBase  = $CurrencyCode . " " . number_format( $BaseFareAmount  , $DecimalPlaces );
            $totalService   = $CurrencyCode . " " . number_format( 0.00     , $DecimalPlaces );
            $totalDiscount  = $CurrencyCode . " " . number_format( 0.00     , $DecimalPlaces );

        }
        if ( isset( $ItinTotalFare->Taxes ) ) 
        {
            $Taxes = $ItinTotalFare->Taxes;

            if ( isset( $Taxes->Tax ) ) 
            {

                $TaxesAmount = $Taxes->Tax->Amount / pow ( 10, $DecimalPlaces );

                $totalTax = $CurrencyCode . " " . number_format( $TaxesAmount, $DecimalPlaces );
            }
        }
        if ( isset( $ItinTotalFare->TotalFare ) ) 
        {
            $TotalFare  = $ItinTotalFare->TotalFare;

            $TotalFareAmount = $TotalFare->Amount / pow ( 10, $DecimalPlaces );

            $totalFare = $CurrencyCode . " " . number_format( $TotalFareAmount, $DecimalPlaces );
        }
    }

?>
    <div class="initiative-top">
        <div class="title">
            <div class="from-to"><?php echo $this->lang->line('total_price'); ?></div>
            <div class="time"><?php echo $this->lang->line('incl_taxes'); ?></div>
        </div>
            <div class="price">
                <a style="text-decoration:none">
                    <span class="amount booking-item-price"><?php echo $totalFare; ?></span>
                </a>
            </div>
    </div>
    
 
    <table class="table table-bordered hd det" style="display:inline-table;">
        <tbody>
            <tr>
                <th><?php echo $this->lang->line('passenger'); ?></th>
                <th><?php echo $this->lang->line('base_fare'); ?></th>
                <th><?php echo $this->lang->line('tax'); ?></th>
                <th><?php echo $this->lang->line('total_price'); ?></th>
            </tr>

            <?php

            if ( isset( $AirItineraryPricingInfo->PTC_FareBreakdowns ) ) 
            {
                $PTC_FareBreakdowns = $AirItineraryPricingInfo->PTC_FareBreakdowns;

                if ( isset( $PTC_FareBreakdowns->PTC_FareBreakdown ) ) 
                {
                    $PTC_FareBreakdownArray = $PTC_FareBreakdowns->PTC_FareBreakdown;
                    $params = array();
                    $params[ "CurrencyCode" ] = $CurrencyCode;
                    $params[ "DecimalPlaces" ] = $DecimalPlaces;

                    if ( is_array( $PTC_FareBreakdownArray ) ) 
                    {
                        foreach( $PTC_FareBreakdownArray as $PTC_FareBreakdownIndex => $PTC_FareBreakdown )
                        {
                            $params[ "PTC_FareBreakdown" ] = $PTC_FareBreakdown;
                            $this->load->view( 'fare/AirItineraryPricingDetails', $params );
                        }

                    }
                    else {
                        $params[ "PTC_FareBreakdown" ] = $PTC_FareBreakdownArray;
                        $this->load->view( 'fare/AirItineraryPricingDetails', $params );
                    }
                }

            }

            ?>
            
            <tr style="padding:8px !important">
                <td><?php echo $this->lang->line('total'); ?></td>
                <td><?php echo $totalBase; ?></td>
                <td><?php echo $totalTax; ?></td>
                <td><?php echo $totalFare; ?></td>
            </tr>
        </tbody>
    </table>
    
