<div class="page-content">
    <h3 class="page-title">
    <?= $this->lang->line('booking_history'); ?>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="#"><?= $this->lang->line('booking_history'); ?></a> </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-edit"></i><?= $this->lang->line('booking_history'); ?> </div>
                </div>
                
                



                <div class="portlet-body">

                    <form action="<?=base_url('Bookinghistory/searchBooking', get_protocol()); ?>" method="post">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <div class="col-md-4">
                                    <label id="linee"><?= $this->lang->line('passenger_first_name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <input type="text" class="form-control" name="passenger_first_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-md-4">
                                    <label id="linee"><?= $this->lang->line('passenger_last_name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <input type="text" class="form-control" name="passenger_last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-md-4">
                                    <label id="linee"><?= $this->lang->line('booking_ref_no'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <input type="text" class="form-control"  name="ref_no">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-md-4">
                                    <label id="linee"><?= $this->lang->line('date'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-icon right">
                                        <input type="text" class="form-control datepicker"  name="booking_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    <div id="ritt" class="input-icon right">
                                        <input type="submit" class="btn purple" value="<?= $this->lang->line('search'); ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable">
                        <thead>
                            <tr>
                                <th> <?= $this->lang->line('s_no'); ?> </th>
                                <th> <?= $this->lang->line('first_name'); ?> </th>
                                <th> <?= $this->lang->line('last_name'); ?> </th>
                                <th> <?= $this->lang->line('email'); ?> </th>
                                <th> <?= $this->lang->line('mobile_no'); ?> </th>
                                <th> <?= $this->lang->line('booking_no'); ?> </th>
                                <th> <?= $this->lang->line('total_cost'); ?> </th>
                                <th> <?= $this->lang->line('booked_on'); ?> </th>
                                <th> <?= $this->lang->line('status'); ?> </th>
                                <th> <?= $this->lang->line('action'); ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(is_array($results) && count($results) > 0) {
                                $sno=$new_count+1;
                                foreach ($results as $data) {
                                    ?>
                                    <tr>
                                        <td> <?=$sno; ?> </td>
                                        <td> <?=$data->firstname; ?> </td>
                                        <td> <?=$data->lastname; ?> </td>
                                        <td> <?=$data->email; ?> </td>
                                        <td class="center"> <?=$data->phone; ?> </td>
                                        <td class="center"> <?=$data->booking_ref_no; ?> </td>
                                        <td class="center">$ <?=$data->total_cost; ?> </td>
                                        <td class="center"> <?= date("m-d-Y h:i:s", strtotime($data->created_dt)); ?> </td>
                                        <td class="center"><?=$data->booking_status; ?> </td>

                                        <td>
                                            <?php if($data->booking_status != 'Cancelled') { ?>
                                            <a onClick="fncancel('<?php echo  $data->t_id;?>');"  class="btn default btn-xs black"> <i class="fa fa-trash-o"></i> <?= $this->lang->line('cancel'); ?></a>
                                             <a href="<?=base_url('Bookinghistory/sync/' . $data->booking_ref_no.'/'.$data->t_id, get_protocol());?>" class="btn default btn-xs purple"> <i class="fa fa-eye"></i> <?= $this->lang->line('sync'); ?> </a>
                                              <a href="<?=base_url('Bookinghistory/eticket_mail/' . $data->t_id, get_protocol()); ?>" class="btn default btn-xs purple"> <i class="fa fa-eye"></i> <?= $this->lang->line('email'); ?> </a>
                                            <?php } ?>
                                            <a href="<?=base_url('Bookinghistory/viewBooking/' . $data->t_id, get_protocol()); ?>" class="ajax btn default btn-xs purple"> <i class="fa fa-eye"></i> <?= $this->lang->line('view'); ?> </a>
                                            
                                            
                                        </td>
                                    </tr>
                                    <?php
                                    $sno++;
                                }
                                
                            }
                            else {
                                ?>
                                <td colspan="8">No results found..</td>


                                <?php
                            }
                            ?>

                            
                        </tbody>
                        <p><?php echo $links; ?></p>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function fncancel(id) {
  var deletopt=confirm('Are you sure, Do you want to cancel this ticket?...');
    if(deletopt)  {
      window.location ='<?php echo base_url('Bookinghistory/cancelBooking/'); ?>/'+id;             
    }  else  {
      return false;
    }
} 
</script>