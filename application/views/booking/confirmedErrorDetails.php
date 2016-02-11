<?php
/*if(is_array($Errors->Error)) {
	foreach($Errors->Error as $Error) {
		echo '<p class="text-danger fontlg">'. $Error->_.'</p>';
	}
}
else {
	$Error = $Errors->Error;
	echo '<p class="text-danger fontlg">'. $Error->_.'</p>';
}*/
?>
<br>
<div style="text-align:center;"><br></div>
<div class="woocommerce-info row" style="border-left-color: #EA0020;min-height: 82px;">
<div class="col-sm-1" >
<img src="<?php echo base_url('assets/images/warning.png'); ?>" style="    width: 100%; "/>
</div>
<div class="col-sm-11" >
There was a problem completing your reservation, please try a new search or contact our Customer Number for help
<br>
Try Again? <a href="<?php echo base_url(); ?>" class="showlogin">Click here to search again</a>
</div>
</div>