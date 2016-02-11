<!DOCTYPE html>
<html lang="en">
   <head>
       <?php $this->load->view('general/header_attachements.php'); ?>
      
   </head>
<body>
    <!--<![endif]-->
      <div id="page-wrap">
        <div class="preloader"></div>
        <?php $this->load->view('general/header_section'); ?>
                  
        
        <section class="filter-page">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-9 col-md-push-3 gridstyle">
                        <?php $this->load->view('flightresults/search_results'); ?>
                    </div>
                    
                    <div class="col-md-3 col-md-pull-9">
                        <div class="page-sidebar">
                            <?php $this->load->view('flightresults/search_form'); ?>
                            <?php $this->load->view('flightresults/search_filter.php'); ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <?php $this->load->view('general/footer_section'); ?>
        
    </div>

    <?php $this->load->view('general/footer_attachements'); ?>
    <?php $this->load->view('home/form_validations.php'); ?>
    <?php $this->load->view('flightresults/form_validations.php'); ?>
	<?php $this->load->view('general/preloader.php'); ?>
    
</body>

</html>