<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MINISIMRS</title>
	<!-- css -->
	<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>css/nivo-lightbox.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>css/owl.carousel.css" rel="stylesheet" media="screen" />
	<link href="<?php echo base_url()?>css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="<?php echo base_url()?>css/animate.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
	<link id="t-colors" href="<?php echo base_url()?>color/green.css" rel="stylesheet">
	<style type="text/css">
		.fixed-foot{
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
		}
		footer{
			color: #000;
			padding: 20px;
		}
		.col-md-6{
			margin: 10px 0;
		}
		header{
			background-color: #fff;
			color: #000;
			padding: 15px 35px;
		}
	</style>
</head>
<body>
	<header>
		<span>WELCOME : <?php echo strtoupper($this->session->userdata('username'));?></span>
		<span style="float: right;"><a href="<?php echo base_url('login/logout')?>">LOG OUT</a></span>
	</header>
	<div id="container">
		<section style="padding: 30px 15px 110px 15px;">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="callaction bg-gray">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
								<div class="cta-text" style="text-align: center;">
									<h3><i class="fa fa-plus-square" style="font-size: 85px;"></i></h3>
									<a href="<?php echo base_url('medrek/tambah')?>" class="btn btn-skin btn-lg">Tambah RekMed</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="callaction bg-gray">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
								<div class="cta-text" style="text-align: center;">
									<h3><i class="fa fa-stethoscope" style="font-size: 85px;"></i></h3>
									<a href="<?php echo base_url('medrek')?>" class="btn btn-skin btn-lg">Data Rekmed</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="callaction bg-gray">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
								<div class="cta-text" style="text-align: center;">
									<h3><i class="fa fa-users" style="font-size: 85px;"></i></h3>
									<a href="<?php echo base_url('pasien')?>" class="btn btn-skin btn-lg">Data Pasien</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="callaction bg-gray">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
								<div class="cta-text" style="text-align: center;">
									<h3><i class="fa fa-user-md" style="font-size: 85px;"></i></h3>
									<a href="<?php echo base_url('dokter')?>" class="btn btn-skin btn-lg">Data Dokter</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<footer class="fixed-foot">Page rendered in <strong>{elapsed_time}</strong> seconds. <span style="float: right;">Developed by Kelompok 4</span></footer>
</body>
<!-- Core JavaScript Files -->
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>js/wow.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.scrollTo.js"></script>
<script src="<?php echo base_url()?>js/jquery.appear.js"></script>
<script src="<?php echo base_url()?>js/stellar.js"></script>
<script src="<?php echo base_url()?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>js/nivo-lightbox.min.js"></script>
<script src="<?php echo base_url()?>js/custom.js"></script>
</html>