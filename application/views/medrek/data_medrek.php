<?php $this->load->view('template/header');?>
<head>
	<title>List Rekam Medis</title>
</head>
<?php $start=0;?>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Medrek</h3>
					<a href="<?php echo base_url()?>medrek/tambah" class="btn btn-skin" style="float: right;"><i class="fa fa-plus"></i></a>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<table width="100%" style="margin-top: 20px;">
							<thead>
								<tr">
									<th>No</th>
									<th>No Medrek</th>
									<th>Nama Pasien</th>
									<th>Poli</th>
									<th>Nama Dokter</th>
									<th>Penyakit</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($medrek as $data): ?>
									<tr>
										<td><?php echo ++$start;?></td>
										<td><?php echo $data->no_medrek; ?></td>
										<td><?php echo $data->nama_pasien; ?></td>
										<td><?php echo $data->poli; ?></td>
										<td><?php echo $data->nama_dokter; ?></td>
										<td><?php if($data->penyakit){echo $data->penyakit;} else {echo "-";}?></td>
										<td><?php echo $data->status; ?></td>
										<td><a href="<?php echo base_url().'medrek/detail/'.$data->no_medrek?>"><i class="fa fa-book"></i></a> <a href="<?php echo base_url().'medrek/edit/'.$data->no_medrek?>"><i class="fa fa-pencil-square-o"></i></a> <a href="<?php echo base_url().'medrek/delete/'.$data->no_medrek?>" onclick="return confirm('Apakah data ini akan dihapus?')"><i class="fa fa-remove"></i></a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('template/footer');?>