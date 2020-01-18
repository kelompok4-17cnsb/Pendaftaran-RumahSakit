<?php $this->load->view('template/header');?>
<head>
	<title>DATA DOKTER</title>
</head>
<?php $no=0;?>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Dokter</h3>
						<?php if ($this->session->userdata('username') == "admin"){ ?>

							<a href="<?php echo base_url()?>dokter/tambah" class="btn btn-skin" style="float: right;"><i class="fa fa-plus"></i></a>
						<?php } ?>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<?php echo $this->session->flashdata('msg'); ?>
						<table width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Dokter</th>
									<th>Spesialis</th>
									<th>Lokasi Praktek</th>
									<th>Jadwal Praktek</th>
									<?php if ($this->session->userdata('username') == "admin") {
										?>
									<th>Aksi</th>
									<?php }?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dokter as $data): ?>
									<tr>
										<td><?php echo ++$no?></td>
										<td><?php echo $data->nama_dokter;?></td>
										<td><?php echo $data->spesialis;?></td>
										<td><?php echo $data->lokasi_praktek;?></td>
										<td><?php echo $data->jadwal_praktek;?></td>
										<?php if ($this->session->userdata('username') == "admin") {
										?><td><a href="<?php echo base_url().'dokter/edit/'.$data->id_dokter?>"><i class="fa fa-pencil-square-o"></i></a> <a href="<?php echo base_url().'dokter/delete/'.$data->id_dokter?>"><i class="fa fa-remove"></i></a></td>
									<?php }?>
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