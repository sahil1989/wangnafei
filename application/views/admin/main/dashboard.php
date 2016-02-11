        <div class="page-content">
						
			<h3 class="page-title">
			<?= $this->lang->line('dashboard'); ?> 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#"><?= $this->lang->line('dashboard'); ?> </a>						
					</li>
				</ul>				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								<?= $this->lang->line('manage_admin'); ?> 
							</div>
							
						</div>
						<a class="more" href="<?php echo base_url(); ?>Adminusers">
						<?= $this->lang->line('go_page'); ?>  <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?= $this->lang->line('manage_customers'); ?>
							</div>
							
						</div>
						<a class="more" href="<?php echo base_url(); ?>Customers">
						<?= $this->lang->line('go_page'); ?>  <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-history"></i>
						</div>
						<div class="details">
							<div class="number">
								<?= $this->lang->line('booking_history'); ?>
							</div>
							
						</div>
						<a class="more" href="<?php echo base_url(); ?>Bookinghistory">
						<?= $this->lang->line('go_page'); ?> <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			
		</div>