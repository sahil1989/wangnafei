
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-edit"></i><?= $this->lang->line('booking_history'); ?> </div>
                    <div class="text-right"> <button class="btn btn-danger pull-right" style="margin-top:3px;" id="print" onclick="return printDiv();"><?php echo $this->lang->line('print'); ?></button> </div>
                </div>
                <div class="portlet-body printdiv">
                    <?php
                    if (is_array($result) && count($result) > 0) {
                        ?>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                          <tr>
                            <th><?= $this->lang->line('booking_ref_no'); ?> </th>
                            <th><?= $this->lang->line('total_cost'); ?></th>
                            <th><?= $this->lang->line('created_date'); ?> </th>
                            <th><?= $this->lang->line('payment_type'); ?> </th>
                            <th><?= $this->lang->line('four_digit'); ?> </th>
                          </tr>
                          <?php
                          $sno = 1;
                            foreach ($result['ticketResult'] as $ticketResult) {
                               ?>
                               <tr>
                                <td><?=$ticketResult->booking_ref_no; ?></td>
                                <td>$ <?=$ticketResult->total_cost; ?></td>
                                <td><?= date("m-d-y H:i:s", strtotime($ticketResult->created_dt)); ?></td>
                                <td><?=$ticketResult->payment_type; ?></td>
                                <td>
                                   <?php if (strtolower($ticketResult->payment_type) != 'cash') { ?>
                                    <?=$ticketResult->four_digit; ?>
                                   <?php } ?>
                                </td>
                              </tr>
                               <?php  
                               $sno++;
                            }
                          ?>
                          
                        </table>
                        
                        <div class="portlet-body">
							
                            <div class="caption">
  								<strong><?= $this->lang->line('air_itinereary'); ?> </strong>
  							</div><br>
                            
                        
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                  <tr>
                    <th><?= $this->lang->line('departure_airport'); ?> </th>
                    <th><?= $this->lang->line('departure_date_time'); ?> </th>
                    <th><?= $this->lang->line('arrival_airport'); ?> </th>
                    <th><?= $this->lang->line('arrival_date_time'); ?> </th>
                    <th><?= $this->lang->line('airline_code'); ?> </th>
                    <th><?= $this->lang->line('flight_no'); ?> </th>
                    <th><?= $this->lang->line('service_class'); ?> </th>
                    <th><?= $this->lang->line('confirm_no'); ?> </th>
                  </tr>
                  <?php
                  foreach ($result['flight'] as $flight) {
                     ?>
                     <tr>
                      <td><?=$flight->departure_airport; ?></td>
                      <td><?= date("m-d-Y H:i:s", strtotime($flight->departure_dt)); ?></td>
                      <td><?=$flight->arrival_airport; ?></td>
                      <td><?= date("m-d-Y H:i:s", strtotime($flight->arrival_dt)); ?></td>
                      <td><?=$flight->airline_code; ?></td>
                      <td><?=$flight->flight_no; ?></td>
                      <td><?=$flight->service_class; ?></td>
                      <td><?=$flight->confirm_no; ?></td>
                      
                    </tr>
                     <?php  
                  }
                  ?>
                  
                </table>
                    </div>
                        <?php
                    }
                    
                    ?>
                    
                    <div class="portlet-body">
							
                            <div class="caption">
								<strong><?= $this->lang->line('passenger_details'); ?> </strong>
							</div><br>
                            
                        
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                          <tr>
                            <th><?= $this->lang->line('no'); ?> </th>
                            <th><?= $this->lang->line('name'); ?> </th>
                            <th><?= $this->lang->line('gender'); ?> </th>
                            <th><?= $this->lang->line('type'); ?> </th>
                            <th><?= $this->lang->line('dob'); ?> </th>
                            <th><?= $this->lang->line('phone_no'); ?></th>
                            <th><?= $this->lang->line('e_ticket_no'); ?></th>
                          </tr>
                          <?php
                          $sno = 1;
                            foreach ($result['passenger'] as $passenger) {
                               ?>
                               <tr>
                                <td><?=$sno; ?></td>
                                <td><?=$passenger->name; ?></td>
                                <td><?=$passenger->gender; ?></td>
                                <td><?=$passenger->type; ?></td>
                                <td><?=date("m-d-Y", strtotime($passenger->dob)); ?></td>
                                <td><?=$passenger->phone; ?></td>
                                <td><?=$passenger->e_ticket ; ?></td>
                              </tr>
                               <?php
                               $sno++;  
                            }
                          ?>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



	