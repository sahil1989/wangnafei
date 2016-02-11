
<!DOCTYPE html>
<html lang="en">
   <head>
       <?php $this->load->view('general/header_attachements.php'); ?>
      
   </head>
<body>
    <!--<![endif]-->
      <div id="page-wrap">
<!--         <div class="preloader"></div>
         -->        <?php $this->load->view('general/header_section'); ?>
                  
        
        <?php $this->load->view($body); ?>
        
        
        <?php $this->load->view('general/footer_section'); ?>
        
    </div>

    <?php $this->load->view('general/footer_attachements'); ?>
  <?php $this->load->view('booking/bookingValidations'); ?>
    
</body>

</html>
