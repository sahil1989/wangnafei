<div class="content">
    <div class="content-container">
        <div class="row">
            <div style="padding-bottom: 10px;padding-left: 0;" class="col-sm-12 col-xs-12">
                <div class="col-sm-7 col-xs-7" style="padding-left: 0;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td><b style="font-size: 41px;line-height: 54px;color:#FF7800" class="mainhead">Flight Reservation</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3 col-xs-3">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td><span style="font-size: 19px;font-weight: bold;"></span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td><b style="font-size:24px;"><img src="<?php echo base_url('assets/img/logo-invert.png', get_protocol()); ?>" alt="Image Alternative text" title="Image Title" class="img-responsive" /></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="padding: 0;padding-top: 10px;border-top: 3px solid #0067AB;" class="col-sm-12 col-xs-12">
                <div class="col-sm-12 col-xs-12" style="padding:0;">
                    <div class="booking-item-payment" style="border:none;box-shadow:none;-webkit-box-shadow:none;">
                        <h5 style="font-weight: 400;border-bottom: 2px solid #0067AB;padding-bottom: 8px;">Flight Details</h5>
                        <ul class="order-payment-list list mb30">
                            <?php
                if(isset($ItineraryInfo->ReservationItems)) {
                    $ReservationItems = $ItineraryInfo->ReservationItems;
                    $Items = $ReservationItems->Item;
                    //print_r($Items);
                    if(is_array($Items)) {
                        foreach ($Items as $Item) {
                            $param['Item'] = $Item; 
                            $this->load->view('booking/ConfirmedOriginDestinationDetails', $param);
                            
                        }
                    }
                    else {

                         $param['Item'] = $Items; 
                        $this->load->view('booking/ConfirmedOriginDestinationDetails', $param);
                        
                    }
                            echo "<br>";

                }
                ?>
                        </ul>
                        <div class="nav-drop booking-sort active-drop" style="width:100%;padding-right: 0px !important;">
                        </div>

                    </div>


                </div>

            </div>
        </div>