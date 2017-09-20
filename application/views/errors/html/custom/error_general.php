<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OneRoof - Error</title>
	<link href="<?=$this->config->item("public_css");?>bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=$this->config->item("public_css");?>style-error-pages.css">
	<link href="<?=$this->config->item("public_css");?>animate.css" rel="stylesheet">
</head>
<body class="repeat">
<section>
	<div class="container">
		<div class="col-sm-12"  style="padding-top: 15px;">
			<div class="" align="middle">
				<img src="<?=$this->config->item("public_images");?>oneroof_logo.png" class="img-responsive bounceIn animated">
			</div>
		</div>
		<div class="col-sm-12" style="padding-top: 30px;">
			<div class="" align="middle">
				<img src="<?=$this->config->item("public_images");?>oopss.png" class="img-responsive bounceIn animated">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="text-center bounceIn animated" style="padding-top: 30px;">
				<img src="<?=$this->config->item("public_images");?>sorry.png">
				<h4 class="text_not_found text-uppercase">
				<?php if(isset($message) and trim($message)!=""){echo $message;} else{?>
                    Something went wrong. Please try again
                <?php } ?>
                </h4>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="text-center bounceIn animated" style="padding-top: 10px;">
				<a href="<?=site_url('Dashboard');?>" type="button" class="btn btn-primary" style="margin-right: 5px; width: 112px;">HOME</a>
				<a href="mailto:<?=$this->config->item("support_email");?>" type="button" class="btn btn-primary" style="margin-left: 5px;">REPORT ISSUE</a>
			</div>
		</div>
	</div>
</section>
</body>
</html>