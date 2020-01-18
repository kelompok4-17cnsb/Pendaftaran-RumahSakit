<?php $this->load->view('template/header');?>
<head>
	<title>List Pasien</title>
</head>
<?php $start=0;?>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Pasien</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<table width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>TTL</th>
									<th>Usia</th>
									<th>Alamat</th>
									<th>Kota</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pasien as $data): ?>
									<tr>
										<td><?php echo ++$start;?></td>
										<td><?php echo $data->nama_pasien; ?></td>
										<td><?php echo $data->j_kelamin; ?></td>
										<td><?php echo $data->ttl_pasien; ?></td>
										<td><?php echo $data->usia; ?></td>
										<td><?php echo $data->alamat_pasien; ?></td>
										<td><?php echo $data->kota_pasien; ?></td>
										<td><a href="<?php echo base_url().'pasien/edit/'.$data->id_pasien?>"><i class="fa fa-pencil-square-o"></i></a> <a href="<?php echo base_url().'pasien/delete/'.$data->id_pasien?>"><i class="fa fa-remove"></i></a></td>
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