<?php
$AirItineraryPricingInfo = $flightDetails->AirItineraryPricingInfo;
$PTC_FareBreakdownArray = $AirItineraryPricingInfo->PTC_FareBreakdowns->PTC_FareBreakdown;
if ( is_array( $PTC_FareBreakdownArray ) ) 
{
    foreach( $PTC_FareBreakdownArray as $PTC_FareBreakdownIndex => $PTC_FareBreakdown )
    {
        if($PTC_FareBreakdown->PassengerTypeQuantity->Code == 'ADT') {
           $ADT =  $PTC_FareBreakdown->PassengerTypeQuantity->Quantity;
        }
        if($PTC_FareBreakdown->PassengerTypeQuantity->Code == 'CHD') {
            $CHD =  $PTC_FareBreakdown->PassengerTypeQuantity->Quantity;
        }
        if($PTC_FareBreakdown->PassengerTypeQuantity->Code == 'INF') {
            $INF =  $PTC_FareBreakdown->PassengerTypeQuantity->Quantity;
        }
    }
}
else {
    $ADT  =   $PTC_FareBreakdownArray->PassengerTypeQuantity->Quantity;
}
?>

<form action="<?php echo base_url('Booking/bookDetails', get_protocol()); ?>" method="post">
    <div class="row whitebg step1">
      <div class="col-lg-12">
          <h3><?php echo $this->lang->line('login'); ?></h3>
          <div>
              <div class="row logg" style="display:none;">
                <div class="col-md-4">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('email'); ?></label>
                    <input class="form-control" type="text" id="emailid" name="emailid"/>
                    <span class="error emailid"> </span>
                  </div>
                </div>
              </div>
              <div class="row logg1">           
                <div class="col-md-4">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('email'); ?></label>
                    <input class="form-control" type="text" id="emailid1" <?php if (auth()->is_logged()) { ?> value="<?= auth()->get('email') ?>" <?php } ?>/>
                    <span class="error emailid1"> </span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><?php echo $this->lang->line('password'); ?></label>
                    <input class="form-control" type="password" id="password"/>
                    <span class="error password"> </span>
                  </div>
                </div>
              </div>
              <div  class="row">
                <div class="col-md-12 clearfix">
                    <div class="pull-right">
                        <a class="btn btn-success" id="step1"><?php echo $this->lang->line('next'); ?>&nbsp;&nbsp;&nbsp; ></a>
                    </div>
                    <div class="pull-left">
                        <a href="<?php echo base_url('Auth/registration', get_protocol());?>" target="_blank">
                            <?php echo $this->lang->line('sign_in_account'); ?>
                        </a>
                    </div>
                    <br />
                    <br />
                </div>
              </div>
            </div> 
            <div class="gap gap-small"></div>
      </div>
	</div>

	<div class="row whitebg step2" style="display:none;">
      <div class="col-lg-12">
          <h3><?php echo $this->lang->line('passenger_information'); ?></h3>
          <?php
                $sno = 1;
                if(isset($ADT)) {
                    for($i=0; $i < $ADT; $i++) { ?>
                    <h4><?php echo $sno++; ?>.<?php echo $this->lang->line('adult'); ?></h4>
					<div class="formvalid formadult">
                    <div class="row col-lg-12">
                        <fieldset class="form-group col-lg-4">
                          <label for="exampleInputEmail1"><?php echo $this->lang->line('gender'); ?> <span class="red">*</span></label>
                            <div class="radio">
                              <label>
                                <input type="radio" type="radio" name="adt_sex[<?php echo $i; ?>]" id="adt_sex1" checked required value="Male" /><?php echo $this->lang->line('male'); ?>
                              </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="adt_sex[<?php echo $i; ?>]"  id="adt_sex2" required value="Female" /><?php echo $this->lang->line('female'); ?>
                            </label>
                          </div>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('first_name'); ?><span class="red">*</span></label>
                          <input class="form-control" type="text" name="adt_firstname[]" id="firstname" />
                          <span class="error firstname"> </span>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('last_name'); ?> <span class="red">*</span></label>
                          <input class="form-control" type="text" name="adt_lastname[]" id="lastname" />
                          <span class="error lastname"> </span>
                        </fieldset>
                    </div>
                     <div class="row col-lg-12">
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('email'); ?><span class="red">*</span></label>
                          <input class="form-control" type="text" name="adt_email[]" id="email" />
                          <span class="error email"> </span>
                        </fieldset>

                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('phone_no'); ?><span class="red">*</span></label>
                          <input class="form-control" type="text" name="adt_phoneno[]" id="phone" />
                          <span class="error phone"> </span>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('dob'); ?><span class="red">*</span></label>
                          <input class="form-control dob" type="text" name="adt_dob[]" readonly="readonly" id="adt-dob<?php echo $i; ?>" />						  
                          <span class="error dobn"> </span>
                        </fieldset>
                    </div>
                    </div>
					
                        <?php
                        if($i == 0) {
                          ?>
          
          
                          <div class="checkbox col-lg-12">
                            <label>
                              <input type="checkbox" value="savedata" name="savedata"> <?php echo $this->lang->line('save_customer'); ?></small>
                            </label>
                          </div>
                            <?php
                        }
                        ?>
                      
                      <?php
                    }                          
                }
                ?>
                <?php
                if(isset($CHD)) { 
                    for($j=0; $j < $CHD; $j++) { ?>
                    <h4><?php echo $sno++; ?>.Child</h4>
					<div class="formvalid formchild">
                    <div class="row col-lg-12">
                        <fieldset class="form-group col-lg-4">
                          <label for="exampleInputEmail1"><?php echo $this->lang->line('gender'); ?> <span class="red">*</span></label>
                            <div class="radio">
                              <label>
                                <input type="radio" type="radio" name="chd_sex[<?php echo $j; ?>]" id="chd_sex1" checked required value="Male" /><?php echo $this->lang->line('male'); ?>
                              </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="chd_sex[<?php echo $j; ?>]"  id="chd_sex2" required value="Female" /><?php echo $this->lang->line('female'); ?>
                            </label>
                          </div>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('first_name'); ?><span class="red">*</span></label>
                          <input class="form-control" type="text" name="chd_firstname[]" id="firstname" />
                          <span class="error firstname"> </span>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('last_name'); ?> <span class="red">*</span></label>
                          <input class="form-control" type="text" name="chd_lastname[]" id="lastname" />
                          <span class="error lastname"> </span>
                        </fieldset>
                    </div>
                     <div class="row col-lg-12">
                      
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('dob'); ?><span class="red">*</span></label>
                          <input class="form-control dob" type="text" name="chd_dob[]" readonly="readonly" id="chd-dob<?php echo $j; ?>" />
                          <span class="error dobn"> </span>
                        </fieldset>
                    </div>
                    </div>
					
                  <?php
                    }
                }
                ?>
                <?php 
                if(isset($INF)) {
                    for($k=0; $k < $INF; $k++) { ?>
                    <h4><?php echo $sno++; ?>.Infant</h4>
					<div class="formvalid forminfant">
                    <div class="row col-lg-12">
                        <fieldset class="form-group col-lg-4">
                          <label for="exampleInputEmail1"><?php echo $this->lang->line('gender'); ?> <span class="red">*</span></label>
                            <div class="radio">
                              <label>
                                <input type="radio" type="radio" name="inf_sex[<?php echo $k; ?>]" id="inf_sex1" checked required value="Male" /><?php echo $this->lang->line('male'); ?>
                              </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="inf_sex[<?php echo $k; ?>]"  id="inf_sex2" required value="Female" /><?php echo $this->lang->line('female'); ?>
                            </label>
                          </div>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('first_name'); ?><span class="red">*</span></label>
                          <input class="form-control" type="text" name="inf_firstname[]" id="firstname" />
                          <span class="error firstname"> </span>
                        </fieldset>
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('last_name'); ?> <span class="red">*</span></label>
                          <input class="form-control" type="text" name="inf_lastname[]" id="lastname" />
                          <span class="error lastname"> </span>
                        </fieldset>
                    </div>
                     <div class="row col-lg-12">
                        
                        <fieldset class="form-group col-lg-4">
                          <label><?php echo $this->lang->line('dob'); ?><span class="red">*</span></label>
                          <input class="form-control dob" type="text" name="inf_dob[]" readonly="readonly" id="inf-dob<?php echo $k; ?>" />
						  
                          <span class="error dobn"> </span>
                        </fieldset>
                    </div>
                    </div>
					
                     <?php
                    }
                }
                ?>
            <div class="col-lg-12">
				<a id="step2" class="btn btn-primary pull-right"><?php echo $this->lang->line('next'); ?></a>
			</div>
  </div>
</div> 
  
	<div class="row whitebg step3"  style="display:none;">
      <div class="col-lg-12">
          <h3><?php echo $this->lang->line('payment_method'); ?></h3>
            <div class="radio">
              <label>
                <input class="i-radio pay_card" type="radio" name="ratioOption" value="card" checked />
                <?php echo $this->lang->line('debit_credit'); ?>
              </label>
            </div>
			
            <div class="radio cashoption" <?php if(auth()->get('cash_option')!=1){ echo "style='display:none;'";}?>>
              <label>
                <input class="i-radio pay_cash" type="radio" name="ratioOption" value="cash" id="ratioOption"/><?php echo $this->lang->line('cash_option'); ?>
              </label>			
            </div>

			<div class="cc-form">
         <p>Note: Please use latin letters to enter address</p>

            <fieldset class="form-group col-lg-8">
              <label><?php echo $this->lang->line('card_number'); ?></label>
                <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" id="card" type="text" name="cardNumber" />
                <span class="error card"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-4">
              <label><?php echo $this->lang->line('cvv'); ?></label>
              <input class="form-control" placeholder="xxxx" id="cvv" type="text" name="cvv" />
              <span class="error cvv"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-8">
              <label><?php echo $this->lang->line('name_on_card'); ?></label>
              <input class="form-control" type="text" id="name_card" placeholder="<?php echo $this->lang->line('please_enter_name'); ?>" name="name_card" />
              <span class="error name_card"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-4">
              <label><?php echo $this->lang->line('expiration_date'); ?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('mmyyyy'); ?>" type="text" id="edate" name="expiryDate" />
              <input class="form-control" type="hidden" id="totalFareamt" name="totalFare" />
              <span class="error edate"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-12">
              <label><?php echo $this->lang->line('billing_address'); ?></label>
            </fieldset>
            <fieldset class="form-group col-lg-6">
              <label><?php echo $this->lang->line('street_address'); ?></label>
                <input class="form-control" placeholder="<?php echo $this->lang->line('street_address'); ?>" id="street_address" type="text" name="street_address" />
                <span class="error street_address"> </span>
            </fieldset>
             <fieldset class="form-group col-lg-3">
              <label><?php echo $this->lang->line('city'); ?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('city'); ?>" id="city" type="text" name="city" />
              <span class="error city"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-3">
              <label><?php echo $this->lang->line('state'); ?></label>
                <input class="form-control" placeholder="<?php echo $this->lang->line('state'); ?>" id="state" type="text" name="state" />
                <span class="error state"> </span>
            </fieldset>
            <fieldset class="form-group col-lg-6">
              <label><?php echo $this->lang->line('zipcode'); ?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('zipcode'); ?>" id="zipcode" type="text" name="zipcode" />
              <span class="error zipcode"> </span>
            </fieldset>
             <fieldset class="form-group col-lg-6">
              <label><?php echo $this->lang->line('country'); ?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('country'); ?>" id="country" type="text" name="country" />
              <span class="error country"> </span>
            </fieldset>

          </div>
          <a  class="btn btn-primary pull-left" id="cancel3"><?php echo $this->lang->line('back'); ?></a>
          <button type="submit" class="btn btn-primary pull-right" id="payment_button"><?php echo $this->lang->line('submit'); ?></button>
      </div>
  </div>

</form>


