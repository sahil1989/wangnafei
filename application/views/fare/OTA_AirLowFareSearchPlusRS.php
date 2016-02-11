<?php
if (isset($OTA_AirLowFareSearchPlusRS->Errors)) {
    $this->load->view('fare/RequestError', ["errors" => $OTA_AirLowFareSearchPlusRS->Errors]);
} else {
    ?>
    <div class="filter-item-wrapper">
    <?php
    if (isset($OTA_AirLowFareSearchPlusRS->PricedItineraries)) {
        $PricedItineraries = $OTA_AirLowFareSearchPlusRS->PricedItineraries;

        if (isset($PricedItineraries->PricedItinerary)) {

            $this->load->view('fare/BookingTitle', ["PricedItineraries" => $PricedItineraries]);

            $PricedItineraryCount = count($PricedItineraries->PricedItinerary);

            $params = [];
            $params["PricedItineraryTotal"] = $PricedItineraryCount;

            $pages = ["PricedItineraryTotal" => $PricedItineraryCount];

            if (is_array($PricedItineraries->PricedItinerary)) {
                foreach ($PricedItineraries->PricedItinerary as $PricedItineraryIndex => $PricedItinerary) {
                    $params["PricedItineraryIndex"] = $PricedItineraryIndex;
                    $params["PricedItinerary"] = $PricedItinerary;
                    $params["Filename"] = $Filename;
                    $this->load->view('fare/PricedItinerary', $params);
                }
            } else {
                $params["PricedItineraryIndex"] = 0;
                $params["PricedItinerary"] = $PricedItineraries->PricedItinerary;
                $params["Filename"] = $Filename;
                $this->load->view('fare/PricedItinerary', $params);
            }
            ?>
            </div>
            <?php
            $this->load->view('fare/ItineraryPagination', $pages);
        }
    }
}
?>
