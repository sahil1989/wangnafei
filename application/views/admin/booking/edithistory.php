

<div class="page-content" style="min-height:294px">
    <h3 class="page-title">
        Manage Ticket
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo base_url(); ?>Adminauth/showDashboard">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Bookinghistory">Manage Ticket</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Edit Ticket</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Ticket Details
                    </div>
   
                </div>
                <div class="portlet-body">
                    <?php
                        if (is_array($result) && count($result) > 0) {
                            ?>
                    <form action="<?php echo base_url("Bookinghistory/updateBooking/".$result['t_id'], get_protocol()); ?>" class="form-horizontal form-bordered" method="post">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <tr>
                                <th>Booking Ref. No.</th>
                                <th>Total Cost.</th>
                                <th>Created Date.</th>
                            </tr>
                            <?php
                                $sno = 1;
                                  foreach ($result['ticketResult'] as $ticketResult) {
                                  	$t_id = $ticketResult->t_id;
                                     ?>
                            <tr>
                                <td><?=$ticketResult->booking_ref_no; ?><input type="hidden" name="booking_ref_no" value="<?=$ticketResult->booking_ref_no; ?>"></td>
                                <td>$ <?=$ticketResult->total_cost; ?></td>
                                <td><?=  date("m-d-Y h:i:s", strtotime($ticketResult->created_dt)); ?></td>
                            </tr>
                            <?php  
                                $sno++;
                                }
                                ?>
                        </table>
                        <div class="caption">
                            <strong>AIR INTINERARY</strong>
                        </div>
                        <br>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <tr>
                                <th>Departure Airport</th>
                                <th>Departure Date Time</th>
                                <th>Arrival Airport</th>
                                <th>Arrival Date Time</th>
                                <th>Airline Code</th>
                                <th>Flight No.</th>
                                <th>Service Class</th>
                            </tr>
                            <?php
                                foreach ($result['flight'] as $flight) {
                                   ?>
                            <tr>
                                <td><?=$flight->departure_airport; ?></td>
                                <td><?=  date("m-d-Y h:i:s", strtotime($flight->departure_dt)); ?></td>
                                <td><?=$flight->arrival_airport; ?></td>
                                <td><?=  date("m-d-Y h:i:s", strtotime($flight->arrival_dt)); ?></td>
                                <td><?=$flight->airline_code; ?></td>
                                <td><?=$flight->flight_no; ?></td>
                                <td><?=$flight->service_class; ?></td>
                            </tr>
                            <?php  
                                }
                                ?>
                        </table>
                        
                </div>
            </div>
            <div class="portlet box green-meadow">
            <div class="portlet-title">
            <div class="caption">
            <i class="fa fa-gift"></i>EDIT PASSENGER DETAILS
            </div>
           
            </div>
            <div class="portlet-body">			
            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                <tr>
                <th>No.</th>
                <th>Name <sup class="errormsg">*</sup></th>
                <th>Type <sup class="errormsg">*</sup></th>
                <th>Phone Number <sup class="errormsg">*</sup></th>
                <th>Email <sup class="errormsg">*</sup></th>
                <th>DOB <sup class="errormsg">*</sup></th>
                </tr>
                <?php
                    $sno = 1;
                    foreach ($result['passenger'] as $passenger) {
                        ?>
                <tr>
                <td><?=$sno; ?></td>
                <td><input type="text" name="name[]" value="<?=$passenger->name; ?>" class="form-control"  required /></td>
                <td><input type="text" name="type[]" value="<?=$passenger->type; ?>" class="form-control"  required/></td>
                <td><input type="text" name="phone[]" value="<?=$passenger->phone; ?>" class="form-control" required/></td>
                <td><input type="text" name="email_id[]" value="<?=$passenger->email_id; ?>" class="form-control"required /></td>
                <td><input type="text" name="dob[]" value="<?=date('m-d-Y', strtotime($passenger->dob)); ?>" class="form-control date-picker" required />
                <input type="hidden" name="rph[]" value="<?=$passenger->RPH; ?>" class="form-control" /></td>
                </tr>
                <?php
                $sno++;  
                }
                ?>
            </table>
            <div class="form-actions">
            <div class="row">
            <div class="col-md-12 text-right">
            <button type="submit" class="btn purple"><i class="fa fa-check"></i> Modify</button>
            <button type="reset" class="btn default">Reset</button>
            </div>
            </div>
            </div>	
            </div>
            </div>
        </div>
    </div>
    <!-- END PORTLET-->
</div>
</div>
<?php
                            }
                            
                            ?>
</form>
<!-- END PAGE CONTENT -->
</div>

