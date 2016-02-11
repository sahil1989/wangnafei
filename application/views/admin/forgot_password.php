<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Admin | WangNaFei</title>
<link
	href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css', get_protocol()); ?>"
	rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/admin/pages/css/login.css', get_protocol()); ?>"
	rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/global/css/components.css', get_protocol()); ?>"
	id="style_components" rel="stylesheet" type="text/css" />
</head>
<body class="login">
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler"></div>
	<!-- END SIDEBAR TOGGLER BUTTON -->
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="<?php echo base_url('Adminauth/login', get_protocol()); ?>"> <img
			src="<?php echo base_url('assets/admin/layout/img/logo-big.png', get_protocol()); ?>"
			alt="" />
		</a>
	</div>
	  <?php
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
        ?>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		
		<!-- END LOGIN FORM -->
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="login-form" action="<?= base_url('Adminauth/forgot_password', get_protocol()); ?>"
			method="post">
			<h3><?= $this->lang->line('forgot_password'); ?> ?</h3>
			<p style="color: #fff"><?= $this->lang->line('enter_email_reset'); ?></p>
			<div class="form-group">
				<input class="form-control placeholder-no-fix" type="text"
					autocomplete="off" placeholder="<?= $this->lang->line('email'); ?>" name="email"  value="<?= set_value('email'); ?>"/>
					<span style="color:red;"><?= form_error('email'); ?></span>
			</div>

			
			<div class="form-group">
				<?php echo $captcha['image']; ?>
			</div>
			<div class="form-group">
				<input class="form-control placeholder-no-fix" type="text"
					autocomplete="off" placeholder="<?= $this->lang->line('captcha'); ?>" name="captcha" />
										<span style="color:red;"><?= form_error('captcha'); ?></span>

			</div>
			
			  
                    
			<div class="form-actions">
				<a  href="<?= base_url('Adminauth/login') ; ?>"  id="back-btn" class="btn btn-default"><?= $this->lang->line('sign_in'); ?></a>
				<button type="submit" class="btn btn-success uppercase pull-right"><?= $this->lang->line('reset_password'); ?></button>
			</div>
		</form>
	</div>
	<div class="copyright"><?php echo date('Y'); ?> &copy; WangNaFei. All rights Reserved.</div>

	<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=onload&hl=en" async defer></script>

</body>
</html>admin