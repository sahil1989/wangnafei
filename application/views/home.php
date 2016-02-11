<!DOCTYPE html>
<html lang="en">
   <head>
       <?php $this->load->view('general/header_attachements.php'); ?>
      
   </head>

            <body>
               <!--<![endif]-->
               <div id="page-wrap">
                  <div class="preloader"></div>
			   </div>
                  
                  <?php $this->load->view('general/header_section'); ?>
                 
                  <?php $this->load->view('home/flight_search'); ?>
                 
                  
                    
                <?php $this->load->view('home/recent_flight_details'); ?>

                  <?php $this->load->view('general/footer_section'); ?>
                  
               </div>
               
            <?php $this->load->view('general/footer_attachements'); ?>
            <?php $this->load->view('home/form_validations.php'); ?>
			<?php $this->load->view('general/preloader.php'); ?>
   </body>
</html>
<script>
$(document).ready(function(){
   $(".sho").click(function(){
      $(".hd").toggle();
   });
});
</script>

