<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php $this->load->view('admin/general/header_attachements'); ?>
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-full-width">
<div class="page-header navbar navbar-fixed-top">
	<?php $this->load->view('admin/general/header_section'); ?>
</div>
<div class="clearfix">
</div>
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	
	<div class="page-content-wrapper">
		<?php $this->load->view($body); ?>
	</div>

</div>
<?php $this->load->view('admin/general/footer_attachements'); ?>	
</body>
</html>
