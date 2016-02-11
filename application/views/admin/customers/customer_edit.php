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
						<a href="#"><?= $this->lang->line('edit_customer'); ?></a>
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
							<div class="caption">
								<i class="fa fa-gift"></i><?= $this->lang->line('edit_customer'); ?>
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="<?php echo base_url('Customers/updateCustomer/' . $row->user_id, get_protocol()); ?>" class="form-horizontal form-bordered" method="post">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('title'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">											
												<input type="text" class="form-control" value="<?php echo $row->title; ?>" name="title">
												<span class="errormsg"><?php echo form_error('title'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('first_name'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">											
												<input type="text" class="form-control" value="<?php echo $row->firstname; ?>" name="firstname">
												<span class="errormsg"><?php echo form_error('firstname'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('middle_name'); ?></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->middlename; ?>" name="middlename">
												<span class="errormsg"><?php echo form_error('middlename'); ?></span>											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('last_name'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->lastname; ?>" name="lastname">
												<span class="errormsg"><?php echo form_error('lastname'); ?></span>											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('gender'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<div class="col-md-2"><input type="radio" value="Male" <?php if($row->gender=="Male") echo "checked"; ?> name="gender"  id="rad1"> <span for="rad1"> <?= $this->lang->line('male'); ?></span></div>
												<div class="col-md-2"><input type="radio" value="Female" <?php if($row->gender=="Female") echo "checked"; ?> name="gender"   id="rad2"> <span for="rad2"> <?= $this->lang->line('female'); ?></span></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('mobile_no'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->phone; ?>" name="phone">
												<span class="errormsg"><?php echo form_error('phone'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('email'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->email; ?>" name="email">
												<span class="errormsg"><?php echo form_error('email'); ?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('dob'); ?></label>
										<div class="col-md-6">
												<input type="text" readonly="" value="<?php echo date("m-d-Y", strtotime($row->dob)) ?>" class="form-control dobdatepicker" name="dob">
												<span class="errormsg"><?php echo form_error('dob'); ?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('street_address'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->address; ?>" name="street_address">
												<span class="errormsg"><?php echo form_error('street_address'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('city'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->city; ?>" name="city">
												<span class="errormsg"><?php echo form_error('city'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('state'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->state; ?>" name="state">
												<span class="errormsg"><?php echo form_error('state'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('zipcode'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->zipcode; ?>" name="zipcode">
												<span class="errormsg"><?php echo form_error('zipcode'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('country'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="text" class="form-control" value="<?php echo $row->country; ?>" name="country">
												<span class="errormsg"><?php echo form_error('country'); ?></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('cash_option'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<select class="form-control" name="cash_option">
													<option value="0" <?php if($row->cash_option=="0") echo "selected='selected'"; ?> >Disable</option>
													<option value="1" <?php if($row->cash_option=="1") echo "selected='selected'"; ?> >Enable</option>
												</select>
												<span class="errormsg"><?php echo form_error('cash_option'); ?></span>
										</div>
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
		<script>
		$(".male,.female").click(function(){
			alert(0);
		});
		</script>