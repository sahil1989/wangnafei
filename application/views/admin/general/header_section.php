    <div class="page-header-inner col-sm-12">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url('Adminauth/showDashboard', get_protocol()); ?>">
			<img src="<?php echo base_url('assets/admin/layout/img/logo.png', get_protocol()); ?>" alt="logo" class="logo-default"/>
			</a>
		</div>
		<div class="hor-menu hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<li class="classic-menu-dropdown <?php echo active_link('Adminauth');?>">
					<a href="<?php echo base_url('Adminauth/showDashboard', get_protocol()); ?>">
					<?= $this->lang->line('dashboard'); ?> <span class="selected"></span>
					</a>
				</li>
				<li class="classic-menu-dropdown <?php echo active_link('Adminusers');?>">
					<a href="<?php echo base_url('Adminusers', get_protocol()); ?>" >
					<?= $this->lang->line('manage_admin'); ?> <span class="selected"></span>
					</a>
					
				</li>
				<li class="classic-menu-dropdown <?php echo active_link('Customers');?>">
					<a data-toggle="" href="<?php echo base_url('Customers', get_protocol()); ?>" class="dropdown-toggle" data-hover="megamenu-dropdown" data-close-others="true">
					<?= $this->lang->line('manage_customers'); ?> <span class="selected"></span>
					</a>
					
				</li>
				<li class="classic-menu-dropdown <?php echo active_link('Bookinghistory');?>">
					<a data-toggle="" href="<?php echo base_url('Bookinghistory', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
					<?= $this->lang->line('booking_history'); ?><span class="selected"></span>
					</a>
					
				</li>
				<li class="classic-menu-dropdown <?php if(($this->router->fetch_method()=="SiteSettings") || ($this->router->fetch_method() =="updateSiteSettings")) echo "active"; ?>">
					<a data-toggle="" href="<?php echo base_url('Adminprofile/SiteSettings', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
					<?= $this->lang->line('site_settings'); ?> <span class="selected"></span>
					</a>
					
				</li>
				<li class="classic-menu-dropdown <?php if($this->router->fetch_method()=="airlines") echo "active"; ?>">
					<a data-toggle="" href="<?php echo base_url('Adminprofile/airlines', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
					<?= $this->lang->line('airlines'); ?> <span class="selected"></span>
					</a>
					
				</li>
			</ul>
		</div>
		
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		
		<div class="top-menu">
			<ul class="nav navbar-nav">
				
				<li class="dropdown dropdown-user  <?php if(($this->router->fetch_method()!="SiteSettings")   && ($this->router->fetch_method() !="updateSiteSettings") && ($this->router->fetch_method() !="airlines")) { echo active_link('Adminprofile'); }?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username username-hide-on-mobile">
					<?= $this->lang->line('welcome_admin'); ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo base_url('Adminprofile', get_protocol()); ?>" style="color:#000 !important">
							<i class="icon-user"></i> <?= $this->lang->line('view_profile'); ?> </a>
						</li>
						<li>
							<a href="<?php echo base_url('Adminprofile/editProfile', get_protocol()); ?>" style="color:#000 !important">
							<i class="icon-user"></i> <?= $this->lang->line('edit_profile'); ?> </a>
						</li>
						<li>
							<a href="<?php echo base_url('Adminprofile/changePassword', get_protocol()); ?>" style="color:#000 !important">
							<i class="icon-user"></i> <?= $this->lang->line('change_password'); ?> </a>
						</li>
						<li>					
							<a href="<?php echo base_url('Adminauth/logout', get_protocol()); ?>" style="color:#000 !important">
							<i class="icon-key"></i> <?= $this->lang->line('logout'); ?> </a>
						</li>
					</ul>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
		<div class="row">		
			<ul class="col-sm-12 responsivemenu">
					<li class="<?php echo active_link('Adminauth');?>">
						<a href="<?php echo base_url('Adminauth/showDashboard', get_protocol()); ?>">
						<?= $this->lang->line('dashboard'); ?> <span class="selected"></span>
						</a>
					</li>
					<li class="<?php echo active_link('Adminusers');?>">
						<a href="<?php echo base_url('Adminusers', get_protocol()); ?>" >
						<?= $this->lang->line('manage_admin'); ?> <span class="selected"></span>
						</a>
						
					</li>
					<li class="<?php echo active_link('Customers');?>">
						<a  href="<?php echo base_url('Customers', get_protocol()); ?>" class="dropdown-toggle" data-hover="megamenu-dropdown" data-close-others="true">
						<?= $this->lang->line('manage_customer'); ?> <span class="selected"></span>
						</a>
						
					</li>
					<li class="<?php echo active_link('Bookinghistory');?>">
						<a  href="<?php echo base_url('Bookinghistory', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
						<?= $this->lang->line('booking_history'); ?><span class="selected"></span>
						</a>
						
					</li>
					<li class="<?php if(($this->router->fetch_method()=="SiteSettings") || ($this->router->fetch_method() =="updateSiteSettings")) echo "active"; ?>">
						<a  href="<?php echo base_url('Adminprofile/SiteSettings', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
						<?= $this->lang->line('site_settings'); ?> <span class="selected"></span>
						</a>
						
					</li>
					<li class="<?php if(($this->router->fetch_method()=="airlines") || ($this->router->fetch_method() =="updateSiteSettings")) echo "active"; ?>">
						<a  href="<?php echo base_url('Adminprofile/airlines', get_protocol()); ?>" data-hover="megamenu-dropdown" data-close-others="true">
						<?= $this->lang->line('airlines'); ?><span class="selected"></span>
						</a>
						
					</li>
			</ul>
		</div>
			
			
	</div>
	
	
	
			