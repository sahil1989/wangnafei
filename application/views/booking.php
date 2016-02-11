<script>
    $.cookie('is_back', true, {expires: 1, path: '/'});
</script>
<section class="checkout-section-demo" style="min-height: 490px;">
    <div class="container">
        <div class="row">
                       
            <div class="col-lg-3">
                <div class="checkout-page__sidebar">
                    <ul>
                        <li class="current"><a href="#"><?php echo $this->lang->line('book_flight_details'); ?></a>
                        </li>
                        <li><a href="#"><?php echo $this->lang->line('customer_information'); ?></a>
                        </li>
                        <li><a href="#"><?php echo $this->lang->line('complete_order'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9" id="booking-details">
                <div class="row step1">
                    <?php $this->load->view('booking/bookFlightDetails'); ?>
                </div>
                
                <?php
                    $this->load->view('booking/bookingCheckout'); 
                ?>
                </div>
                     
                </div>
                
              
                 
            </div>
           
        </div>
    </div>
</section>
 <?php
	$this->load->view('booking/preloader'); 

?>
