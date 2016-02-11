		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('manage_customer'); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>Customers"><?= $this->lang->line('manage_customer'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?= $this->lang->line('view_customer'); ?></a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<?php foreach ($customer as $row){ ?>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box green-meadow">
						<div class="portlet-title">
							<div class="caption"><?= $this->lang->line('view_customer'); ?>
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div  class="form-horizontal form-bordered">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('title'); ?></label>
										<div class="col-md-6"><?php echo $row->title; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('first_name'); ?></label>
										<div class="col-md-6"><?php echo $row->firstname; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('middle_name'); ?></label>
										<div class="col-md-6"><?php echo $row->middlename; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('last_name'); ?></label>
										<div class="col-md-6"><?php echo $row->lastname; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('gender'); ?></label>
										<div class="col-md-6"><?php echo $row->gender; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('mobile_no'); ?></label>
										<div class="col-md-6"><?php echo $row->phone; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('email'); ?></label>
										<div class="col-md-6"><?php echo $row->email; ?></div>
									</div>									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('dob'); ?></label>
										<div class="col-md-6"><?php echo date("m-d-Y", strtotime($row->dob)) ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('street_address'); ?></label>
										<div class="col-md-6"><?php echo $row->address; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('city'); ?></label>
										<div class="col-md-6"><?php echo $row->city; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('state'); ?></label>
										<div class="col-md-6"><?php echo $row->state; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('country'); ?></label>
										<div class="col-md-6"><?php echo $row->country; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('zipcode'); ?></label>
										<div class="col-md-6"><?php echo $row->zipcode; ?></div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('cash_option'); ?></label>
										<div class="col-md-6"><?php if($row->cash_option=="0") echo "Disable"; else echo "Enable"; ?></div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('registered_on'); ?></label>
										<div class="col-md-6"><?php echo date("m-d-Y h:i:s", strtotime($row->created)); ?></div>
									</div>
								</div>	
							</div>
							
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
		<?php } ?>	
			
			<!-- END PAGE CONTENT -->
		</div>