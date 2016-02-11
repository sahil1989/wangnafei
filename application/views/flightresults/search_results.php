<div class="filter-page__content">
    <?php
    $result = json_decode($result);
    if (!is_null($result)) {
        if (isset($result->OTA_AirLowFareSearchPlusRS)) {
            $this->load->view('fare/OTA_AirLowFareSearchPlusRS', ["OTA_AirLowFareSearchPlusRS" => $result->OTA_AirLowFareSearchPlusRS, "Filename" => $Filename]);
        }
        if (isset($result->OTA_AirLowFareSearchMatrixRS)) {
            $this->load->view('fare/OTA_AirLowFareSearchMatrixRS', ["OTA_AirLowFareSearchMatrixRS" => $result->OTA_AirLowFareSearchMatrixRS, "Filename" => $Filename]);
        }
    }
    ?>
</div>
<script>

        function checkIsBack() {
            if ($.cookie('is_back')) {
                $.removeCookie('is_back', { path: '/' });
                console.log('Returned back.');
                document.location.reload();
            }
        }

    checkIsBack();
</script>