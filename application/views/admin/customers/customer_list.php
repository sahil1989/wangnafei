		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('manage_customers'); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?= $this->lang->line('manage_customers'); ?></a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i><?= $this->lang->line('customers'); ?>
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="add-btn" >
								<a href="<?php echo base_url(); ?>Customers/addCustomer" class="btn green"><?= $this->lang->line('add'); ?></a>
							</div>
							<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 <?= $this->lang->line('s_no'); ?>
								</th>
								<th>
									<?= $this->lang->line('customer_name'); ?>
								</th>
								<th>
									 <?= $this->lang->line('email'); ?>
								</th>
								<th>
									<?= $this->lang->line('mobile_no'); ?>
								</th>
								<th>
									<?= $this->lang->line('registered_on'); ?>
								</th>
								<th>
									<?= $this->lang->line('action'); ?>
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php 
							$count=1;
							foreach ($customer as $row){ ?>
							<tr>
								<td>
									<?php echo $count; $count++; ?>
								</td>
								<td>
									<?php echo $row->firstname." ".$row->lastname; ?>
								</td>
								<td>
									 <?php echo $row->email; ?>
								</td>
								<td class="center">
									 <?php echo $row->phone; ?>
								</td>
								<td class="center">
									 <?php echo date("m-d-Y h:i:s", strtotime($row->created)); ?>
								</td>
								<td>
                                <a href="<?php echo base_url(); ?>Customers/viewCustomer/<?php echo $row->user_id; ?>" class="btn default btn-xs green">
										<i class="fa fa-eye"></i> <?= $this->lang->line('view'); ?> </a>
                                
									<a href="<?php echo base_url(); ?>Customers/editCustomer/<?php echo $row->user_id; ?>" class="btn default btn-xs yellow">
										<i class="fa fa-edit"></i> <?= $this->lang->line('edit'); ?> </a>
                                        
                                        <a onClick="fndelete('<?php echo  $row->user_id;?>');" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> <?= $this->lang->line('delete'); ?></a>
										 <a href="<?php echo base_url(); ?>Auth/resendRegistration/<?php echo $row->user_id; ?>/admin" class="btn default btn-xs green">
										<i class="fa fa-eye"></i> <?= $this->lang->line('resend_mail'); ?> </a>
								</td>
								
							</tr>
							<?php } ?>
												
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
		<script type="text/javascript">
        function fndelete(id) {
        	var deletopt=confirm('<?= $this->lang->line("are_you_delete"); ?>');
        	  if(deletopt)  {
        		  window.location ='<?php echo base_url('Customers/deleteCustomer/'); ?>/'+id;        		  
        	  }  else  {
        		  return false;
        	  }
        } 
        </script>