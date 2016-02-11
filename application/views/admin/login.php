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
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="login-form"
			action="<?php echo base_url('Adminauth/login', get_protocol()); ?>" method="post">
			<h3 class="form-title"><?= $this->lang->line('sign_in'); ?></h3>
			<?php if(isset($message)){ ?>
			<div class="alert alert-danger">
				<button class="close" data-close="alert"></button>
				<span> <?=$message; ?> </span>
			</div>
			<?php } ?>
			<div class="form-group">
				<input class="form-control form-control-solid placeholder-no-fix"
					type="text" autocomplete="off" placeholder="<?= $this->lang->line('email'); ?>" name="email" value="<?=set_value('email'); ?>" />
				<div class="errors-list" style="color:red;"><?=form_error('email'); ?></div>
			</div>
			<div class="form-group">
				<input class="form-control form-control-solid placeholder-no-fix"
					type="password" autocomplete="off" placeholder="<?= $this->lang->line('password'); ?>"
					name="password" value="<?=set_value('password'); ?>"/>
				<div class="errors-list" style="color:red;"><?=form_error('password'); ?></div>
			</div>

			<div class="login-options"></div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success uppercase"><?= $this->lang->line('login'); ?></button>
				<a href="<?php echo base_url(); ?>Adminauth/forgot_password" id="forget-password" class="forget-password"><?= $this->lang->line('forgot_password'); ?>?</a>
			</div>

		</form>
		<!-- END LOGIN FORM -->
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="forget-form" action="<?php echo base_url('', get_protocol()); ?>"
			method="post">
			<h3>Forget Password ?</h3>
			<p style="color: #fff">Enter your e-mail address below to reset your
				password.</p>
			<div class="form-group">
				<input class="form-control placeholder-no-fix" type="text"
					autocomplete="off" placeholder="Email" name="email" />
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn btn-default">Back</button>
				<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
			</div>
		</form>
	</div>
	<div class="copyright"><?php echo date('Y'); ?> &copy; WangNaFei. All rights Reserved .</div>

</body>
</html>