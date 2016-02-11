<?php
if ( isset( $SequenceNumber ) ) {
	?>
    <td colspan="3">
        <form action="<?php echo base_url('Booking/getBookingDetails', 'https'); ?>" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="SequenceNumber" value="<?php echo $SequenceNumber; ?>">
        	<input type="hidden" name="Filename" value="<?php echo $Filename; ?>">
            <input type="submit" value="<?php echo $this->lang->line('book_this_flight'); ?>" class="awe-btn awe-btn-style3 pull-right">
        </form>
    </td>
    <?php
	
}