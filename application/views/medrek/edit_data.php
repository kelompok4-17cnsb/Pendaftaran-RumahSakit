<?php $this->load->view('template/header');?>
<head>
	<title>Edit Data Medrek</title>
</head>
<?php $hari = date("D");
        switch($hari){
          case 'Sun':
          $getHari = "Minggu";
          break;
          case 'Mon': 
          $getHari = "Senin";
          break;
          case 'Tue':
          $getHari = "Selasa";
          break;
          case 'Wed':
          $getHari = "Rabu";
          break;
          case 'Thu':
          $getHari = "Kamis";
          break;
          case 'Fri':
          $getHari = "Jumat";
          break;
          case 'Sat':
          $getHari = "Sabtu";
          break;
          default:
          $getHari = "Salah"; 
          break;
          return $getHari;
      	}?>
<div class="container" style="margin-top:120px;">
	<div class="form-wrapper">
		<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
			<div class="panel panel-skin">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> <?php echo $page;?> Medrek</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="padding: 0 20px">
						<form action="<?php echo $action ?>" method="post">
							<div class="col-md-6">
								<input type="text" name="no_medrek" value="<?php echo $no_medrek ?>" hidden />
								<label>ID Pasien ( Terisi Otomatis )</label>
							<input type="text" name="id_pasien" value="<?php echo $id_pasien;?>" class="form-control" readonly />
								<label>Nama Pasien</label>
							<input type="text" name="nama_pasien" value="<?php echo $nama_pasien ?>" class="form-control" placeholder="Nama Pasien" />
								<label>Jenis Kelamin</label>
							<select name="j_kelamin" class="form-control">
								<?php switch ($j_kelamin) {
									case 'L': ?>
									<option value="L" selected>Laki - Laki</option>
									<option value="P">Perempuan</option>
									<?php break;

									case 'P': ?>
									<option value="L">Laki - Laki</option>
									<option value="P" selected>Perempuan</option>
									<?php break;

									default: ?>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
									<?php break;
								} ?>
							</select>
								<label>Tanggal Lahir</label>
							<input type="date" name="ttl_pasien" id="ttl_pasien" value="<?php echo $ttl_pasien ?>" class="form-control" placeholder="(dd/mm/Y)" />
								<label>Usia</label>
							<input type="text" name="usia" id="usia" value="<?php echo $usia ?>" class="form-control" placeholder="Usia Pasien" />
								<label>Alamat</label>
							<textarea name="alamat_pasien" class="form-control" placeholder="Alamat Pasien"><?php echo $alamat_pasien?></textarea>
								<label>Kota / Kabupaten</label>
							<input type="text" name="kota_pasien" value="<?php echo $kota_pasien?>" class="form-control" placeholder="Kota Pasien">
							</div>
							<div class="col-md-6">
								<label>Keluhan</label>
							<textarea name="keluhan" rows="5" class="form-control" placeholder="Keluhan Yang Dirasakan"><?php echo $keluhan ?></textarea>
								<label>Poli</label>
							<select name="poli" class="form-control">
								<?php switch ($poli) {
									case 'Umum': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;

									case 'Mata': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;

									case 'THT': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;

									case 'Bedah': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
									<?php break;

									case 'Jantung': ?>
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="Bedah">Bedah</option>
									<option value="Jantung">Jantung</option>
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
								<label>Dokter</label>
							<select name="id_dokter" class="form-control">
								<option value="<?php echo $id_dokter;?>" selected><?php echo 'Dokter '.$nama_dokter.' ( '.$spesialis.' )';?></option>
								<?php foreach ($dokter as $data): ?>
									<?php if ($data->harijadwal == $getHari) {?>
										<option value="<?php echo $data->id_dokter;?>"><?php echo 'Dokter '.$data->nama_dokter.' ( '.$data->spesialis.' )';?></option>
									<?php }?>
								<?php endforeach ?>
							</select>
								<label>Penyakit ( Boleh Kosong )</label>
							<input type="text" name="penyakit" value="<?php echo $penyakit ?>" class="form-control" placeholder="Penyakit" />
								<label>Status</label>
							<select name="status" class="form-control">
								<?php switch ($status) {
									case 'Rawat Jalan': ?>
									<option value="Rawat Jalan" selected>Rawat Jalan</option>
									<option value="Rawat Inap">Rawat Inap</option>
									<?php break;

									case 'Rawat Inap': ?>
									<option value="Rawat Jalan">Rawat Jalan</option>
									<option value="Rawat Inap" selected>Rawat Inap</option>
									<?php break;

									default: ?>
									<option value="Rawat Jalan">Rawat Jalan</option>
									<option value="Rawat Inap">Rawat Inap</option>
									<?php break;
								} ?>
							</select><br/>
							<button type="submit" class="btn btn-skin">EDIT DATA</button> <a href="<?php echo base_url('medrek')?>" class="btn btn-skin">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('template/footer');?>
<script>
        $(function() {
            $( "#ttl_pasien" ).datepicker();
        });
 
        window.onload=function(){
            $('#ttl_pasien').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#usia').val(age);
            });
        }
 
    </script>