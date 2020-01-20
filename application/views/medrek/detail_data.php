<?php $this->load->view('template/header');?>
<head>
	<title>DETAIL MEDREK <?php echo $no_medrek;?></title>
</head>
<div class="container" style="margin-top:120px;">
	<div class="col-lg-6">
		<div class="form-wrapper">
			<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="panel panel-skin">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Pasien</h3>
					</div>
					<div class="panel-body">
						<div class="row" style="padding: 0 20px">
							<table width="100%">
								<tr>
									<th>No Medrek</th>
									<td><?php echo $no_medrek;?></td>
								</tr>
								<tr>
									<th>ID Pasien</th>
									<td><?php echo $id_pasien?></td>
								</tr>
								<tr>
									<th>Nama Pasien</th>
									<td><?php echo $nama_pasien?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-wrapper">
			<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="panel panel-skin">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Dokter</h3>
					</div>
					<div class="panel-body">
						<div class="row" style="padding: 0 20px">
							<table width="100%">
								<tr>
									<th>ID Dokter</th>
									<td><?php echo $id_dokter?></td>
								</tr>
								<tr>
									<th>Nama Dokter</th>
									<td><?php echo $nama_dokter?></td>
								</tr>
								<tr>
									<th>Poli</th>
									<td><?php echo $poli?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-wrapper">
			<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="panel panel-skin">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Penyakit & Keluhan</h3>
					</div>
					<div class="panel-body">
						<div class="row" style="padding: 0 20px">
							<table width="100%">
								<tr>
									<th>Keluhan</th>
									<td><?php echo $keluhan?></td>
								</tr>
								<tr>
									<th>Penyakit</th>
									<td><?php if($penyakit){echo $penyakit;} else {echo "-";}?></td>
								</tr>
								<tr>
									<th>Status</th>
									<td><?php echo $status?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<a href="<?php echo(base_url('medrek/edit/'.$no_medrek)) ?>" class="btn btn-skin">Edit Data</a> <a href="<?php echo(base_url('medrek')) ?>" class="btn btn-skin">Back</a>
	</div>
</div>
<?php $this->load->view('template/footer');?>