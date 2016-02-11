<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?php echo date('Y'); ?> &copy; WangNaFei. All rights Reserved.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<script src="<?php echo base_url('assets/global/plugins/jquery.min.js', get_protocol()); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js', get_protocol()); ?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('assets/global/scripts/metronic.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/layout/scripts/layout.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/layout/scripts/quick-sidebar.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/layout/scripts/demo.js', get_protocol()); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/pages/scripts/components-pickers.js', get_protocol()); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<link rel="stylesheet" href="<?php echo base_url('assets/admin/pages/css/jquery.dataTables.min.css', get_protocol()); ?>">
<script src="<?php echo base_url('assets/admin/pages/scripts/jquery.dataTables.min.js', get_protocol()); ?>"></script>

		
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
           ComponentsPickers.init();
        });   
    </script>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/global/color/colorbox.css', get_protocol()); ?>" />
		<script src="<?php echo base_url('assets/global/color/jquery.colorbox.js', get_protocol()); ?>"></script>
		<script src="<?php echo base_url('assets/global/color/jquery.colorbox-min.js', get_protocol()); ?>"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".ajax").colorbox({width:"80%", height:"80%"});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
			

		$(".male").click(function(){ 
		alert("M");
			$("#rad2").attr('checked', '');
			$("#rad1").attr('checked', 'checked');
			 
		});
		$(".female").click(function(){
		alert("FM");
			$("#rad1").attr('checked', '');
			$("#rad2").attr('checked', 'checked');
		});
		
	
		$(".responsive-toggler").click(function(){ 
			$('.responsivemenu').toggle();
		});

		$( ".dobdatepicker" ).datepicker({
			dateFormat: 'mm-dd-yy',
			minDate : '-100y',
			maxDate : '-18y',
			yearRange:'-100y:-18y',
			changeYear: true,
			changeMonth: true
			
		});

		$( ".datepicker" ).datepicker({
			dateFormat: 'mm-dd-yy',
			minDate : '-100y',
			maxDate : new Date,
			yearRange:'-100y:'+ new Date,
			changeYear: true,
			changeMonth: true
			
		});
		

		 function printDiv() {
		    var printContents = $(".printdiv").html();
		    document.body.innerHTML = printContents;
		    window.print();
		    window.location.href="<?php echo base_url('Bookinghistory', get_protocol()); ?>";
		}


		
		$(document).ready(function(){
     $('#sample_editable_1').DataTable( {
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        "oLanguage": {
	      "sSearch": "<?php echo $this->lang->line('search'); ?>",
	      "oPaginate": {
	        "sPrevious": "<?php echo $this->lang->line('previous'); ?>",
	        "sNext": "<?php echo $this->lang->line('next'); ?>",
	      },
	      "sLengthMenu": "<?php echo  $this->lang->line('show'); ?> _MENU_ <?php echo  $this->lang->line('record'); ?> ",
	      "sInfo": "<?php echo  $this->lang->line('showing'); ?> _START_ <?php echo  $this->lang->line('to'); ?> _END_ <?php echo  $this->lang->line('of'); ?> _TOTAL_ <?php echo  $this->lang->line('entries'); ?>"
	    }
    } );
});

		</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.min.js"></script>

	