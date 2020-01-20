<?php $this->load->view('template/header');?>
<head>
	<title>Tambah Data Medrek</title>
	<script type="text/javascript" src="<?php base_url('js/jquery-1.10.2.js') ?>"></script>
</head>
<?php foreach ($dpas as $pas): ?>
	<?php $id = $pas->id_pasien?>
<?php endforeach ?>
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
								<label>ID Pasien</label>
								<input type="text" name="id_pasien" value="<?php echo ++$id;?>" class="form-control" readonly />
								<label>Nama Pasien</label>
								<input type="text" name="nama_pasien" value="<?php echo $nama_pasien ?>" class="form-control" placeholder="Nama Pasien" class="form-control" />
								<label>Jenis Kelamin</label>
								<select name="j_kelamin" class="form-control">
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
								<label>Tanggal Lahir</label>
								<input type="date" name="ttl_pasien" id="ttl_pasien" value="<?php echo $ttl_pasien ?>" class="form-control" placeholder="(dd/mm/Y)" />
								<label>Usia</label>
								<input type="text" name="usia" id="usia" class="form-control" placeholder="Usia Pasien" readonly />
								<label>Alamat</label>
								<textarea name="alamat_pasien" class="form-control" placeholder="Alamat Pasien"><?php echo $alamat_pasien?></textarea>
								<label>Kota</label>
								<input type="text" name="kota_pasien" value="<?php echo $kota_pasien?>" class="form-control" placeholder="Kota Pasien">
							</div>
							<div class="col-md-6">
								<label>Keluhan</label>
								<textarea name="keluhan" rows="5" class="form-control" placeholder="Keluhan Yang Dirasakan"><?php echo $keluhan ?></textarea>
								<label>Poli</label>
								<select name="poli" class="form-control">
									<option value="Umum">Umum</option>
									<option value="Mata">Mata</option>
									<option value="THT">THT</option>
									<option value="THT">Bedah</option>
									<option value="THT">Jantung</option>
								</select>
								<label>Dokter</label>
								<select name="id_dokter" class="form-control">
									<?php foreach ($ddok as $dok): ?>
										<?php if ($dok->harijadwal == $getHari) {?>
										<option value="<?php echo $dok->id_dokter;?>"><?php echo 'Dokter '.$dok->nama_dokter.' ( '.$dok->spesialis.' )';?></option>
										<?php }?>
									<?php endforeach ?>
								</select>
								<label>Penyakit</label>
								<input type="text" name="penyakit" value="<?php echo $penyakit ?>" class="form-control" placeholder="Penyakit" />
								<label>Keluhan</label>
								<select name="status" class="form-control">
									<option value="Rawat Jalan">Rawat Jalan</option>
									<option value="Rawat Inap">Rawat Inap</option>
								</select><br/>
								<button type="submit" class="btn btn-skin" onclick="return confirm('Apakah data sudah sesuai?')">TAMBAH DATA</button> <a href="<?php echo base_url('medrek')?>" class="btn btn-skin">Cancel</a>
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