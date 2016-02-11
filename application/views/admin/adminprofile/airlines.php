		<div class="page-content" style="min-height:294px">
			<h3 class="page-title">
			<?= $this->lang->line('airline_logos'); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url(); ?>Adminauth/showDashboard"><?= $this->lang->line('dashboard'); ?></a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?= $this->lang->line('airline_logos'); ?></a>
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
								<i class="fa fa-edit"></i><?= $this->lang->line('upload_airline_logos'); ?>
							</div>							
						</div>
						<div class="portlet-body">
							
							<form action="<?php echo base_url('Adminprofile/airlinesadd', get_protocol()); ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
								<div class="form-body">
									
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('airline_code'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">											
												<input type="text" class="form-control" value="<?php echo set_value('airlinecode'); ?>" name="airlinecode">
												<span class="errormsg"><?php echo form_error('airlinecode'); ?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3"><?= $this->lang->line('airline_logo'); ?><span class="errormsg">*</span></label>
										<div class="col-md-6">
												<input type="file" class="form-control"  name="airline">
												<span class="errormsg"><?php echo form_error('airline'); ?></span>											
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
				</div>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i><?= $this->lang->line('airline_logos'); ?>
							</div>
							
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 <?= $this->lang->line('s_no'); ?>
								</th>
								<th>
									<?= $this->lang->line('airline_code'); ?>
								</th>
								<th>
									<?= $this->lang->line('airline_logo'); ?>
								</th>
								<th>
									<?= $this->lang->line('action'); ?>
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php 
							$count=1;
							foreach ($result as $row){ ?>
							<tr>
								<td>
									<?php echo $count; $count++; ?>
								</td>
								<td>
									<?php echo $row->airline_code; ?>
								</td>
								<td>
									 <img src="<?php echo base_url("assets/airline_logo/".$row->airline_image, get_protocol()); ?>" width="100px" />
								</td>
				
								<td>
                 
                                        <a onClick="fndelete('<?php echo  $row->a_id;?>');" class="btn default btn-xs red">
										<i class="fa fa-trash-o"></i> <?= $this->lang->line('delete'); ?></a>
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
        		  window.location ='<?php echo base_url('Adminprofile/deleteAirline/'); ?>/'+id;        		  
        	  }  else  {
        		  return false;
        	  }
        } 
        </script>