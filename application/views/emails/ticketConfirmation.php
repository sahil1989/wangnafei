<div style="font-family:Arial, Helvetica, sans-serif;font-weight:100px;">
    <div style="width:800px;margin:auto" class="container">
        <div style="text-align:center;">
            <img style="width:180px;" src="<?php echo base_url('/assets/images/logo-invert.png'); ?>">
        </div>
        <h1 style="color:#F60;padding-top:16px;width:100%;min-height:80px;background-color: #F7F7F7;">
        <span
          style="float:left;font-size:30px;line-height: 65px;margin-left: 14px;"><?php echo $this->lang->line('reservation_confirm_no'); ?>
          : <b style="color: #000;"><?= $OTA_TravelItineraryRS->TravelItinerary->ItineraryRef->ID ?></b></span>
            <span style="clear:both;"></span>
        </h1>
        <br>

        <p id="para"
           style="border-top:3px solid #0067ab;border-bottom:3px solid #0067ab;padding:6px;font-size:20px;background-color: #0065AF;color: #fff;"><?php echo $this->lang->line('flight_details'); ?></p>

        <table style="background-color: #FFF; width: 100%; margin-top: 16px; margin-bottom: 10px; border-radius: 6px;"
               border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <?php
            $ItineraryInfo = $OTA_TravelItineraryRS->TravelItinerary->ItineraryInfo;
            $CustomerInfo = $OTA_TravelItineraryRS->TravelItinerary->CustomerInfos->CustomerInfo;
            ?>

            <?php
            if (isset($result->OTA_TravelItineraryRS->TravelItinerary->ItineraryInfo)) {
                $ItineraryInfo = $result->OTA_TravelItineraryRS->TravelItinerary->ItineraryInfo;
                $i = 0;


                if (isset($ItineraryInfo->ReservationItems->Item)) {
                    $Items = $ItineraryInfo->ReservationItems->Item;

                    if (is_array($Items)) {
                        foreach ($Items as $Item) {
                            $params['Layover'] = '';
                            $params['i'] = $i;
                            $params['Item'] = $Item;
                            $this->load->view('booking/flightDetails', $params);
                            $i++;
                        }

                    } else {
                        $params['Layover'] = '';
                        $params['i'] = $i;
                        $params['Item'] = $Items;
                        $this->load->view('booking/flightDetails', $params);
                    }
                }

            }
            ?>
            </tbody>
        </table>
        <h5 class="text-center mb30" style="margin-left: 90px;">
            <?php
            echo $this->lang->line('payment_method') . " : " . ucwords($_POST['ratioOption']);
            if ($_POST['ratioOption'] == "card") {

                $cardNumber = str_replace(" ", "", $_POST['cardNumber']);
                $masked = str_pad(substr($cardNumber, -4, 4), strlen($cardNumber), '*', STR_PAD_LEFT);
                echo ", Last 4 digit of your card: " . $masked;

            }

            ?>

        </h5>
        <p id="para"
           style="border-top:3px solid #0067ab;border-bottom:3px solid #0067ab;padding:6px;font-size:20px;background-color: #0065AF;color: #fff;"><?php echo $this->lang->line('passenger_details'); ?></p>
        <table style="width:100%" class="table table-striped extra-height">
            <thead>
            <tr style="background:#CCC;font-size:12px">
                <th><?php echo $this->lang->line('s_no'); ?></th>
                <th><?php echo $this->lang->line('name'); ?></th>
                <th><?php echo $this->lang->line('phone_no'); ?></th>
                <th><?php echo $this->lang->line('dob'); ?></th>
            </tr>
            </thead>
            <tbody style="font-size: 12px; ">


            <?php
            $sno = 1;
            if (is_array($CustomerInfo)) {
                foreach ($CustomerInfo as $CustomerDetails) {
                    $Customer = $CustomerDetails->Customer;
                    $GivenName = $Customer->PersonName->GivenName;
                    $Surname = $Customer->PersonName->Surname;
                    $NameType = $Customer->PersonName->NameType;

                    if (isset($Customer->Telephone) && $NameType == 'ADT') {
                        $Telephone = $Customer->Telephone->PhoneNumber;
                    } else {
                        $Telephone = '-';
                    }
                    if (isset($Customer->BirthDate)) {
                        $BirthDate = date("m-d-Y", strtotime($Customer->BirthDate));
                    } else {
                        //$BirthDate = date('m-d-Y', strtotime($_POST['adt_dob'][0]));
                        //$BirthDate     = new DateTime( $BirthDate );
                        //$BirthDate = $BirthDate->format( "Y-m-d" );
                        $BirthDate = date("m-d-Y", strtotime(str_replace("-", "/", $_POST['adt_dob'][0])));
                    }
                    ?>
                    <tr>

                        <td style="text-align:center;"><?php echo $sno; ?>  </td>
                        <td style="text-align:center;"><?php echo $GivenName . ' ' . $Surname; ?>  </td>
                        <td style="text-align:center;"><?php echo $Telephone; ?></td>
                        <td style="text-align:center;"><?php echo $BirthDate; ?></td>

                    </tr>
                    <?php
                    $sno++;
                }
            } else {
                $Customer = $CustomerInfo->Customer;
                $GivenName = $Customer->PersonName->GivenName;
                $Surname = $Customer->PersonName->Surname;
                $NameType = $Customer->PersonName->NameType;

                if (isset($Customer->Telephone) && $NameType == 'ADT') {
                    $Telephone = $Customer->Telephone->PhoneNumber;
                } else {
                    $Telephone = '-';
                }        //$BirthDate = date('m-d-Y', strtotime(trim($_POST['adt_dob'][0])));
                //$BirthDate     = new DateTime( $BirthDate );
                //$BirthDate = $BirthDate->format( "Y-m-d" );
                //$BirthDate = date('m-d-Y', strtotime($_POST['adt_dob'][0]));
                $BirthDate = date("m-d-Y", strtotime(str_replace("-", "/", $_POST['adt_dob'][0])));
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo $sno; ?>  </td>
                    <td style="text-align:center;"><?php echo $GivenName . ' ' . $Surname; ?>  </td>
                    <td style="text-align:center;"><?php echo $Telephone; ?></td>
                    <td style="text-align:center;"><?php echo $BirthDate; ?></td>

                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>

        <p style="font-size:12px"><?php echo $this->lang->line('computer_generated_invoice'); ?>
    </div>

</div>