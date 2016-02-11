		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('manage_admin'); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>Adminusers"><?= $this->lang->line('manage_admin'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?= $this->lang->line('add_admin'); ?></a>
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
								<i class="fa fa-gift"></i><?= $this->lang->line('add_admin'); ?>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo base_url('Adminusers/addUser', get_protocol()); ?>" class="form-horizontal form-bordered" method="post">
								<div class="form-body">

									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('email'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
												<span class="errormsg"><?php echo form_error('email'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('password'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="password" class="form-control" name="password" >
												<span class="errormsg"><?php echo form_error('password'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('retype_password'); ?><sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="password" class="form-control" name="repassword" >
												<span class="errormsg"><?php echo form_error('repassword'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>

									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('first_name'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group"> 
												<input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname'); ?>">
												<span class="errormsg"><?php echo form_error('firstname'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('last_name'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>">
												<span class="errormsg"><?php echo form_error('lastname'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('mobile_no'); ?><sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>">
												<span class="errormsg"><?php echo form_error('phone'); ?></span>											
											</div>
											<!-- /input-group -->
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('dob'); ?> <sup class="errormsg">*</sup></label>
										<div class="col-md-6">
											<div class="input-group">
												<input type="text" readonly=""  class="form-control dobdatepicker" name="dob" value="<?php echo set_value('dob'); ?>">
												<span class="errormsg"><?php echo form_error('dob'); ?></span>												
											</div>
											<!-- /input-group -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('street_address'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo set_value('street_address'); ?>" name="street_address">
												<span class="errormsg"><?php echo form_error('street_address'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('city'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo set_value('city'); ?>" name="city">
												<span class="errormsg"><?php echo form_error('city'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('state'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo set_value('state'); ?>" name="state">
												<span class="errormsg"><?php echo form_error('state'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('zipcode'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo set_value('zipcode'); ?>" name="zipcode">
												<span class="errormsg"><?php echo form_error('zipcode'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('country'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo set_value('country'); ?>" name="country">
												<span class="errormsg"><?php echo form_error('country'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('cash_option'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<select class="form-control" name="cash_option">
													<option value="0">Disable</option>
													<option value="1">Enable</option>
												</select>
												<span class="errormsg"><?php echo form_error('cash_option'); ?></span>
										</div>
									</div>
								</div>	
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn purple"><i class="fa fa-check"></i> <?= $this->lang->line('add'); ?></button>
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
		     
			
			<!-- END PAGE CONTENT -->
		</div>