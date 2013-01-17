<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title_for_layout; ?></title>
		<!-- Bootstrap -->
		<link type="text/css" href="/assess/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link type="text/css" href="/assess/css/error.css" rel="stylesheet" media="screen">
		<?php echo $this->fetch('css');?>

	</head>
 
	<body>


		<?php echo $this->fetch('content'); ?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="/assess/js/bootstrap.min.js"></script>
		<?php echo $this->Html->script('icons'); ?> 
		<?php echo $this->fetch('script'); ?>
	</body>
</html>