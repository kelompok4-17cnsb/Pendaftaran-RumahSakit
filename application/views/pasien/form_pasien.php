<?php $this->load->view('template/header');?>
<head>
	<title>EDIT DATA <?php echo strtoupper($nama_pasien);?></title>
</head>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> <?php echo $page;?> Pasien</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<form action="<?php echo $action ?>" method="post">
							<label>ID Pasien</label>
							<input type="text" name="id_pasien" readonly value="<?php echo $id_pasien ?>" class="form-control"/>
							<label>Nama Pasien</label>
							<input type="text" name="nama_pasien" value="<?php echo $nama_pasien ?>" class="form-control" />
							<label>Jenis Kelamin</label>
							<select name="j_kelamin" class="form-control">
								<?php if ($j_kelamin == "L"){ ?>
									<option value="L" selected>Laki - Laki</option>
									<option value="P">Perempuan</option>
								<?php } elseif ($j_kelamin == "P") { ?>
									<option value="L">Laki - Laki</option>
									<option value="P" selected>Perempuan</option>
								<?php } else {
									?>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
									<?php
								} ?>
							</select>
							<label>Tanggal Lahir</label>
							<input type="date" name="ttl_pasien" value="<?php echo $ttl_pasien ?>" placeholder="<?php echo date('d/m/Y')?>" class="form-control" />
							<label>Usia</label>
							<input type="text" name="usia" value="<?php echo $usia ?>" class="form-control" placeholder="Usia Pasien" />
							<label>Alamat</label>
							<textarea name="alamat_pasien" placeholder="Alamat Lengkap" class="form-control"><?php echo $alamat_pasien ?></textarea>
							<label>Kota / Kabupaten</label>
							<input type="text" name="kota_pasien" value="<?php echo $kota_pasien ?>" class="form-control" placeholder="Kota Pasien" /><br/>
							<button type="submit" class="btn btn-skin" onclick="return confirm('Apakah data sudah sesuai?')"><?php echo $page;?> Data</button> <a href="<?php echo base_url('pasien')?>" class="btn btn-skin">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12" style="margin: 30px 0"></div>
<?php $this->load->view('template/footer');?>