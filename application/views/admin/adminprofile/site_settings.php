		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('site_settings'); ?> 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?> </a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?= $this->lang->line('edit_site_settings'); ?> </a>
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
								<i class="fa fa-gift"></i><?= $this->lang->line('site_settings'); ?> 
							</div>
						
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo base_url('Adminprofile/updateSiteSettings', get_protocol()); ?>" class="form-horizontal form-bordered" method="post">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('office_id'); ?>  <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" value="<?php if(count($result) > 0)  echo $result[0]->office_id; ?>" name="office_id">
												<span class="errormsg"><?php echo form_error('office_id'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('queue_number'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" value="<?php if(count($result) > 0)  echo $result[0]->queue_category; ?>" name="queue_no">
												<span class="errormsg"><?php echo form_error('queue_no'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('queue_category'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" value="<?php if(count($result) > 0)  echo $result[0]->queue_number; ?>" name="queue_category">
												<span class="errormsg"><?php echo form_error('queue_category'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('confirm_cc'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" value="<?php if(count($result) > 0)  echo $result[0]->add_cc; ?>" name="add_cc">
												<span class="errormsg"><?php echo form_error('add_cc'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									
								</div>	
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<input type="hidden" class="form-control" value="<?php if(count($result) > 0)  echo $result[0]->s_id; ?>" name="s_id">
											<button type="submit" class="btn purple"><i class="fa fa-check"></i><?php if(count($result) > 0) { ?> <?= $this->lang->line('update'); ?>  <?php } else { echo $this->lang->line('add'); } ?></button>
											<button type="reset" class="btn default"><?= $this->lang->line('reset'); ?> </button>
										</div>
									</div>
								</div>
							</form>
							
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
		     
			
			<!-- END PAGE CONTENT -->
		</div>