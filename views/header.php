<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo isset($this->title) ? $this->title : 'Dedicated to delicious British Food @ Gordon&#39;s Crown';?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>media/css/screen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>media/css/print.css" media="print" />

	<script type="text/javascript" src="<?php echo PATH;?>media/js/jquery.min.js"></script>
	<?php
		if(isset($this->js)){
			echo $this->js;
		}
	?>
</head>
<body class="<?php echo isset($this->class) ? $this->class : 'home';?>"><!-- class corresponds to current navigation menu -->
	
	<div id="canvas">
		<div id="header">
			<h1>
				<a href="<?php echo PATH; ?>" title="Gordon&#39;s Crown - Dedicated to delicious British Food">
					<img alt="Gordon&#39;s Crown - Dedicated to delicious British Food" src="<?php echo PATH;?>media/img/header.png" />
				</a>
			</h1>
		</div>
		<ul id="menu">
			<li class="home"><a href="<?php echo PATH;?>">Home</a></li>
			<li class="menu"><a href="<?php echo PATH.'menu';?>">Menu</a></li>

			<li class="contact"><a href="<?php echo PATH.'contact';?>">Contact</a></li>

			<!-- <li class="login"><a href="<?php //echo PATH.'auth/login';?>">Login</a></li> --><!-- show when logged-off -->
			<!-- <li class="logout"><a href="./auth/logout">Logout</a></li> show when logged-in -->			
		</ul>
		<div id="content">