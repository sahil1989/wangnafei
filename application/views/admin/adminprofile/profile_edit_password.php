		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('change_password'); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#"><?= $this->lang->line('change_password'); ?></a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<?php foreach ($user as $row){ ?>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box green-meadow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i><?= $this->lang->line('change_password'); ?>
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo base_url('Adminprofile/updatePassword', get_protocol()); ?>" class="form-horizontal form-bordered" method="post">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('current_password'); ?><sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="password" class="form-control" name="current_password" value="<?php echo set_value('current_password')?>">
												<span class="errormsg"><?php echo form_error('current_password'); if(isset($message)) echo $message; ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('new_password'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="password" class="form-control" name="new_password" value="<?php echo set_value('new_password')?>">
												<span class="errormsg"><?php echo form_error('new_password'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('confirm_new_password'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="password" class="form-control" name="new_confirm_password" value="<?php echo set_value('new_confirm_password')?>">
												<span class="errormsg"><?php echo form_error('new_confirm_password'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn purple"><i class="fa fa-check"></i> <?= $this->lang->line('update'); ?></button>
											<button type="reset" class="btn default"><?= $this->lang->line('reset'); ?></button>
										</div>
									</div>
								</div>
							</form>
							
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
		     
		     <?php } ?>	
			
			<!-- END PAGE CONTENT -->
		</div>