<?php $this->load->view('template/header');?>
<head>
	<title>TAMBAH DATA DOKTER</title>
</head>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> <?php echo strtoupper($page);?> Dokter</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<form action="<?php echo $action?>" method="post">
							<input type="text" name="id_dokter" value="<?php echo $id_dokter?>" hidden />
							<label>Nama Dokter</label>
							<input type="text" name="nama_dokter" value="<?php echo $nama_dokter?>" class="form-control" placeholder="Nama Dokter" />
							<label>Spesialis</label>
							<select name="spesialis" class="form-control">
								<?php switch ($spesialis) {
									case 'Umum': ?>
									<option value="Umum" selected>Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;
									case 'Mata': ?>
									<option value="Umum">Umum</option>
									<option value="Mata" selected>Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;
									case 'THT': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT" selected>THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;
									case 'Bedah': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah" selected>Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;
									case 'Jantung': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung" selected>Jantung</option>
									<?php break;
									default: ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;
								} ?>
							</select>
							<label>Lokasi Praktek</label>
							<select name="lokasi_praktek" class="form-control">
								<?php switch ($lokasi_praktek) {
									case 'Rs. Al-Ihsan Lt. 1': ?>
									<option value="Rs. Al-Ihsan Lt. 1" selected>Rs. Al-Ihsan Lt. 1</option>
									<option value="Rs. Al-Ihsan Lt. 2">Rs. Al-Ihsan Lt. 2</option>
									<option value="Rs. Al-Ihsan Lt. 3">Rs. Al-Ihsan Lt. 3</option>
									<option value="Rs. Al-Ihsan Lt. 4">Rs. Al-Ihsan Lt. 4</option>
									<?php
									break;
									case 'Rs. Al-Ihsan Lt. 2': ?>
									<option value="Rs. Al-Ihsan Lt. 1">Rs. Al-Ihsan Lt. 1</option>
									<option value="Rs. Al-Ihsan Lt. 2" selected>Rs. Al-Ihsan Lt. 2</option>
									<option value="Rs. Al-Ihsan Lt. 3">Rs. Al-Ihsan Lt. 3</option>
									<option value="Rs. Al-Ihsan Lt. 4">Rs. Al-Ihsan Lt. 4</option>
									<?php
									break;
									case 'Rs. Al-Ihsan Lt. 3': ?>
									<option value="Rs. Al-Ihsan Lt. 1">Rs. Al-Ihsan Lt. 1</option>
									<option value="Rs. Al-Ihsan Lt. 2">Rs. Al-Ihsan Lt. 2</option>
									<option value="Rs. Al-Ihsan Lt. 3" selected>Rs. Al-Ihsan Lt. 3</option>
									<option value="Rs. Al-Ihsan Lt. 4">Rs. Al-Ihsan Lt. 4</option>
									<?php
									break;
									case 'Rs. Al-Ihsan Lt. 4': ?>
									<option value="Rs. Al-Ihsan Lt. 1">Rs. Al-Ihsan Lt. 1</option>
									<option value="Rs. Al-Ihsan Lt. 2">Rs. Al-Ihsan Lt. 2</option>
									<option value="Rs. Al-Ihsan Lt. 3">Rs. Al-Ihsan Lt. 3</option>
									<option value="Rs. Al-Ihsan Lt. 4" selected>Rs. Al-Ihsan Lt. 4</option>
									<?php
									break;		
									default: ?>
									<option value="Rs. Al-Ihsan Lt. 1">Rs. Al-Ihsan Lt. 1</option>
									<option value="Rs. Al-Ihsan Lt. 2">Rs. Al-Ihsan Lt. 2</option>
									<option value="Rs. Al-Ihsan Lt. 3">Rs. Al-Ihsan Lt. 3</option>
									<option value="Rs. Al-Ihsan Lt. 4">Rs. Al-Ihsan Lt. 4</option>
									<?php
									break;
								} ?>
							</select>
							<label>Jadwal Praktek</label><br/>
							<?php if ($page == "add"): ?>
								<input type="checkbox" name="jadwal_praktek[]" value="Senin" > Senin
								<input type="checkbox" name="jadwal_praktek[]" value="Selasa" > Selasa
								<input type="checkbox" name="jadwal_praktek[]" value="Rabu" > Rabu
								<input type="checkbox" name="jadwal_praktek[]" value="Kamis" > Kamis
								<input type="checkbox" name="jadwal_praktek[]" value="Jumat" > Jumat
								<input type="checkbox" name="jadwal_praktek[]" value="Sabtu" > Sabtu
								<input type="checkbox" name="jadwal_praktek[]" value="Minggu" > Minggu
								<?php elseif ($page == "edit"): ?>
									<input type="text" name="jadwal_praktek" class="form-control" value="<?php echo $jadwal_praktek?>">
									<?php endif ?><br/>
									<button type="submit" class="btn btn-skin" onclick="return confirm('Apakah data sudah sesuai?')"><?php echo strtoupper($page)?> DATA</button> <a href="<?php echo base_url()?>dokter" class="btn btn-skin">Cancel</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer');?>
