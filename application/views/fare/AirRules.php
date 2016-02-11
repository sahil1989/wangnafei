
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                
                <div class="portlet-body">
                <?php
                if(isset($result->OTA_AirRulesRS)) {
	                if(isset($result->OTA_AirRulesRS->Success)) {
	                  $FareRuleResponseInfos = $result->OTA_AirRulesRS->FareRuleResponseInfo;
	                  if(is_array($FareRuleResponseInfos)) {
	                    foreach($FareRuleResponseInfos as $FareRuleResponseInfo) {
	                      $FareRuleInfo = $FareRuleResponseInfo->FareRuleInfo;
	                      ?>
	                      <div class="caption"> <h4 class="text-success">Fare rules <?=$FareRuleInfo->FareReference;?> for Flight from <?=$FareRuleInfo->DepartureAirport->_.', '.$FareRuleInfo->DepartureAirport->LocationCode;?>  to <?=$FareRuleInfo->ArrivalAirport->_.', '.$FareRuleInfo->ArrivalAirport->LocationCode;?>  by <?=$FareRuleInfo->FilingAirline->Code;?> </h4> </div>
	<hr>
	
	                      <?php
	                      $FareRules = $FareRuleResponseInfo->FareRules;
	                      $SubSections = $FareRules->SubSection;
	                      if(is_array($SubSections)) {
	                        foreach($SubSections as $SubSection) {
	                          $SubTitle = $SubSection->SubTitle;
	                          ?>
	                          <h5><u><?=$SubTitle; ?></u></h5>
	                          <?php
	                          $Paragraphs = $SubSection->Paragraph;
	                          if(is_array($Paragraphs)) {
	                            foreach($Paragraphs as $Paragraph) {
	                              ?>
	                              <p class="text-muted"><?=$Paragraph->Text->_;?></p>
	                              <?php
	                            }
	                          }
	                          else {
	                            ?>
	                            <p><?=$Paragraphs->Text->_;?></p>
	                            <?php
	                          }
	                        }
	                      }
	                    }
	
	                  }
	                  else {
	                     $FareRuleInfo = $FareRuleResponseInfos->FareRuleInfo;
	                      ?>
	                      <div class="caption"> <h4 class="text-success">Fare rules <?=$FareRuleInfo->FareReference;?> for Flight from <?=$FareRuleInfo->DepartureAirport->_.', '.$FareRuleInfo->DepartureAirport->LocationCode;?>  to <?=$FareRuleInfo->ArrivalAirport->_.', '.$FareRuleInfo->ArrivalAirport->LocationCode;?>  by <?=$FareRuleInfo->FilingAirline->Code;?> </h4> </div>
	<hr>
	
	                      <?php
	                      $FareRules = $FareRuleResponseInfos->FareRules;
	                      $SubSections = $FareRules->SubSection;
	                      if(is_array($SubSections)) {
	                        foreach($SubSections as $SubSection) {
	                          $SubTitle = $SubSection->SubTitle;
	                          ?>
	                          <h5><u><?=$SubTitle; ?></u></h5>
	                          <?php
	                          $Paragraphs = $SubSection->Paragraph;
	                          if(is_array($Paragraphs)) {
	                            foreach($Paragraphs as $Paragraph) {
	                              ?>
	                              <p class="text-muted"><?=$Paragraph->Text->_;?></p>
	                              <?php
	                            }
	                          }
	                          else {
	                            ?>
	                            <p><?=$Paragraphs->Text->_;?></p>
	                            <?php
	                          }
	                        }
	                      }
	
	                  }
	
	                }
	                else {
	                  print_r($result->OTA_AirRulesRS);
	                }
                }
                else {
                	echo "<p style='margin:20px; '>No results found.</p>";
                	
                }

                ?>
                </div>

            </div>
        </div>
    </div>
</div>
	