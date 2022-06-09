<?php

	//SET Input : Tanggal
	$temp_tanggal = date("Y-m-d");
		//echo "<script> alert('".$temp_tanggal."'); </script>";

	function cek_input($data){
		$data = trim($data); //Untuk Menghilangkan "\0", "\t", "\n", "\x0B", "\r", " " (Ordinary space)
		$data = stripslashes($data); //Menghilangkan backslash yang ditambahkan dengan addslashes() function
		$data = htmlspecialchars($data); //Mencegah browser agar tidak menggunakan tag HTML pada input oleh user.

		return $data;
	}

	function select_multiple($p_kebutuhankhusus, $p_pencarian){
		
		if (strpos($p_kebutuhankhusus, $p_pencarian) !== false) {
          
          return "selected";
      	}
    }


		//1.  PSTART : Inisialisasi
		$tanggal_pendaftaran = "";		$nama = "";						$jeniskelamin = "";
		$nisn = "";						$nik = "";						$tempatlahir = "";
		$tanggallahir = "";				$noaktalahir = "";				$agama = "";
		$kewarganegaraan = "";			$nonindonesia = "";				$radio_kewarganegaraan = "";
		$tempkebutuhankhusus = "";		$kebutuhankhusus = "";
		$alamatjalan = "";				$rt = "";						$rw = "";
		$dusun = "";					$kelurahan = "";				$kecamatan = "";
		$alamat = "";					$kodepos = "";					$tempattinggal = "";
		$transportasi = "";				$no_kks = "";					$anak_keberapa = "";
		$kpspkh = "";

		$error_nama = "";				$error_jeniskelamin = "";		$error_nisn = "";
		$error_nik = "";				$error_tempatlahir = "";		$error_tanggallahir = "";
		$error_noaktalahir = "";		$error_agama = "";				$error_kewarganegaraan = "";
		$error_kebutuhankhusus = "";	$error_alamatjalan = "";		$error_rt = "";
		$error_rw = "";					$error_dusun = "";				$error_kelurahan = "";
		$error_kecamatan = "";			$error_kodepos = "";			$error_tempattinggal = "";
		$error_transportasi = "";		$error_kks = "";				$error_anakkeberapa = "";
		$error_kpspkh = "";

		$v_nama = "";					$v_jeniskelamin = "";			$v_nisn = "";
		$v_nik = "";					$v_tempatlahir = "";			$v_tanggallahir = "";
		$v_noaktalahir = "";			$v_agama = "";					$v_kewarganegaraan = "";
		$v_kebutuhankhusus = "";		$v_alamatjalan = "";			$v_rt = "";
		$v_rw = "";						$v_dusun = "";					$v_kelurahan = "";
		$v_kecamatan = "";				$v_kodepos = "";				$v_tempattinggal = "";
		$v_transportasi = "";			$v_no_kks = "";					$v_anak_keberapa = "";
		$v_kpspkh = "";

		//1.  PEND : Inisialisasi

	if( $_SERVER['REQUEST_METHOD'] == "POST" ){
			//echo "<script> alert('POST'); </script>";


		//2.  PSTART : Validasi

			//Validasi Input : tanggal_pendaftaran 
			$tanggal_pendaftaran = date("Y-m-d H:i:s");

			//Validasi Input : nama
			if( empty($_POST['input_nama']) ){
				$error_nama = "Nama tidak boleh kosong";

			}else{
				$nama = cek_input( $_POST['input_nama'] );

				if( !preg_match("/^[a-zA-Z ]*$/", cek_input( $_POST['input_nama'] )) ){
					$error_nama = "Nama hanya boleh mengandung huruf dan spasi";
				}else{
					$v_nama = "TRUE";
				}
			}

			//Validasi Input : jeniskelamin
			if( empty($_POST['input_jeniskelamin']) ){
				$error_jeniskelamin = "Jenis Kelamin tidak boleh kosong";

			}else{

				if( $_POST['input_jeniskelamin'] == "L" || $_POST['input_jeniskelamin'] == "P" ){
					$jeniskelamin = cek_input($_POST['input_jeniskelamin']);
					$v_jeniskelamin = "TRUE";

				}else{
					$error_jeniskelamin = "Jenis kelamin Anda tidak sesuai pilihan";
				}

			}

			//Validasi Input : NISN
			if( !empty($_POST['input_nisn']) ){

				$nisn = cek_input( $_POST['input_nisn'] );

				if( !is_numeric($nisn) ){
					$error_nisn = "NISN hanya boleh mengandung nomor saja";
				}else{
					$v_nisn = "TRUE";
				}
			}

			//Validasi Input : NIK
			if( empty($_POST['input_nik']) ){
				$error_nik = "NIK tidak boleh kosong";

			}else{
				$nik = cek_input( $_POST['input_nik'] );

				if( !is_numeric($nik) ){
					$error_nik = "NIK hanya boleh mengandung nomor saja";
				}else{
					$v_nik = "TRUE";
				}
			}

			//Validasi Input : tempatlahir
			if( empty($_POST['input_tempatlahir']) ){
				$error_tempatlahir = "Tempat Lahir tidak boleh kosong";

			}else{
				$tempatlahir = cek_input( $_POST['input_tempatlahir'] );

				if( !preg_match("/^[a-zA-Z]*$/", $tempatlahir) ){
					$error_tempatlahir = "Tempat Lahir hanya boleh mengandung huruf saja";
				}else{
					$v_tempatlahir = "TRUE";
				}
			}

			//Validasi Input : tanggallahir
			if( empty($_POST['input_tanggallahir']) ){
				$error_tanggallahir = "Tanggal Lahir tidak boleh kosong";

			}else{
				$tanggallahir = cek_input( $_POST['input_tanggallahir'] );
				$v_tanggallahir = "TRUE";
			}

			//Validasi Input : noaktalahir
			if( empty($_POST['input_noaktalahir']) ){
				$error_noaktalahir = "Akta Lahir tidak boleh kosong";

			}else{
				$noaktalahir = cek_input( $_POST['input_noaktalahir'] );

				if( !preg_match("/^[a-zA-Z0-9]*$/", $noaktalahir) ){
					$error_noaktalahir = "Akta Lahir hanya boleh mengandung huruf dan angka saja";
				}else{
					$v_noaktalahir = "TRUE";
				}
			}

			//Validasi Input : agama
			if( empty($_POST['input_agama']) ){
				$error_agama = "Agama tidak boleh kosong";

			}else{
				$agama = cek_input( $_POST['input_agama'] );

				if( !in_array($agama, array("Islam", "Kristen", "Katolik", "Hindu", "Buddha", "Kong Hu Cu")) ){
					$error_agama = "Pilih agama anda dengan benar";
				}else{
					$v_agama = "TRUE";
				}
			}

			//Validasi Input : Kewarganegaraan
			if( empty($_POST['input_kewarganegaraan']) ){
				$error_kewarganegaraan = "Kewarganegaraan tidak boleh kosong";

			}else if( $_POST['input_kewarganegaraan'] == "Indonesia" ){
				$kewarganegaraan = cek_input( $_POST['input_kewarganegaraan'] );
				$v_kewarganegaraan = "TRUE";

			}else{

				$radio_kewarganegaraan = $_POST['input_kewarganegaraan']; //Menyimpan value="nonIndonesia" untuk checked 

				if( empty($_POST['input_nonindonesia']) ){
					$error_kewarganegaraan = "Silahkan isi nama Negara Asing Anda";

				}else{
					$kewarganegaraan = cek_input( $_POST['input_nonindonesia'] );
					$nonindonesia = cek_input( $_POST['input_nonindonesia'] );

					if( !preg_match("/^[a-zA-Z ]*$/", $kewarganegaraan) ){
						$error_kewarganegaraan = "Nama Negara hanya boleh mengandung huruf dan spasi";
					}else{
						$v_kewarganegaraan = "TRUE";
					}
				}

			}

			//Validasi Input : Kebutuhan Khusus
			$list_kebutuhankhusus = array("Tidak","Netra", "Rungu", "Grahita Ringan", "Grahita Sedang", "Daksa Ringan", "Daksa Sedang", "Laras", "Wicara", "Tuna Ganda", "Hiper Aktif", "Cerdas Istimewa", "Bakat Istimewa", "Kesulitan Belajar", "Narkoba", "Indigo", "Down Sindrome", "Autis");

			if( empty($_POST['input_kebutuhankhusus']) ){

				$error_kebutuhankhusus = "Silahkan pilih kebutuhan khusus atau tidak";

			}else{

				if( !empty($_POST['input_kebutuhankhusus']) ){
				
					$tempkebutuhankhusus = $_POST['input_kebutuhankhusus'];

					if( in_array("Tidak", $tempkebutuhankhusus) && count($tempkebutuhankhusus)>1 ){
						$error_kebutuhankhusus = "Anda tidak dapat menggabung pilihan Tidak dengan Lainnya";

					}else if( array_intersect( $tempkebutuhankhusus, $list_kebutuhankhusus) ){

						foreach ($tempkebutuhankhusus as $key) {
							
							$kebutuhankhusus = $kebutuhankhusus . $key . ", ";
						}
						
						$kebutuhankhusus = substr($kebutuhankhusus, 0, -2);
						$v_kebutuhankhusus = "TRUE";

					}else{
						$error_kebutuhankhusus = "Kebutuhan Khusus tidak terdaftar dalam lampiran";
					}

				}

			}

			//Validasi Input : alamat jalan
			if( empty($_POST['input_alamatjalan']) ){
				$error_alamatjalan = "Alamat Jalan tidak boleh kosong";

			}else{
				$alamatjalan = cek_input( $_POST['input_alamatjalan'] );

				if( !preg_match("/^[a-zA-Z0-9 ]*$/", $alamatjalan) ){
					$error_alamatjalan = "Alamat Jalan hanya boleh mengandung huruf dan spasi saja";
				}else{
					$v_alamatjalan = "TRUE";
				}
			}

			//Validasi Input : RT
			if( empty($_POST['input_rt']) ){
				$error_rt = "RT tidak boleh kosong";

			}else{
				$rt = cek_input( $_POST['input_rt'] );

				if( !is_numeric($rt) ){
					$error_rt = "RT hanya boleh mengandung nomor saja";
				}else{
					$v_rt = "TRUE";
				}
			}

			//Validasi Input : RW
			if( empty($_POST['input_rw']) ){
				$error_rw = "RW tidak boleh kosong";

			}else{
				$rw = cek_input( $_POST['input_rw'] );

				if( !is_numeric($rw) ){
					$error_rw = "RW hanya boleh mengandung nomor saja";
				}else{
					$v_rw = "TRUE";
				}
			}

			//Validasi Input : Dusun
			if( empty($_POST['input_dusun']) ){
				$error_dusun = "Dusun tidak boleh kosong";

			}else{
				$dusun = cek_input( $_POST['input_dusun'] );

				if( !preg_match("/^[a-zA-Z0-9]*$/", $dusun) ){
					$error_dusun = "Dusun tidak boleh menggunakan spasi dan simbol";
				}else{
					$v_dusun = "TRUE";
				}
			}

			//Validasi Input : Kelurahan
			if( empty($_POST['input_kelurahan']) ){
				$error_kelurahan = "Kelurahan tidak boleh kosong";

			}else{
				$kelurahan = cek_input( $_POST['input_kelurahan'] );

				if( !preg_match("/^[a-zA-Z]*$/", $kelurahan) ){
					$error_kelurahan = "Kelurahan hanya boleh mengandung huruf saja";
				}else{
					$v_kelurahan = "TRUE";
				}
			}

			//Validasi Input : Kecamatan
			if( empty($_POST['input_kecamatan']) ){
				$error_kecamatan = "Kecamatan tidak boleh kosong";

			}else{
				$kecamatan = cek_input( $_POST['input_kecamatan'] );

				if( !preg_match("/^[a-zA-Z]*$/", $kecamatan) ){
					$error_kecamatan = "Kecamatan hanya boleh mengandung huruf saja";
				}else{
					$v_kecamatan = "TRUE";
				}
			}

			//Penggabungan Variabel Alamat Jalan - Kecamatan
			$alamat = $alamatjalan ." RT/RW ". $rt ."/". $rw .", Dusun ". $dusun .", Kel.". $kelurahan .", Kec.". $kecamatan;

			//Validasi Input : Kode Pos
			if( empty($_POST['input_kodepos']) ){
				$error_kodepos = "Kode Pos tidak boleh kosong";

			}else{
				$kodepos = cek_input( $_POST['input_kodepos'] );

				if( !is_numeric($kodepos) ){
					$error_kodepos = "Kode Pos hanya boleh mengandung nomor saja";
				}else{
					$v_kodepos = "TRUE";
				}
			}

			//Validasi Input : Tempat Tinggal
			$list_tempattinggal = array("Bersama Orang Tua", "Wali", "Kos", "Asrama", "Panti Asuhan", "Pesantren", "Lainnya");

			if( empty($_POST['input_tempattinggal']) ){
				$error_tempattinggal = "Tempat Tinggal tidak boleh kosong";

			}else{
				$tempattinggal = cek_input( $_POST['input_tempattinggal'] );

				if( !in_array($tempattinggal, $list_tempattinggal) ){
					$error_tempattinggal = "Pilih Tempat Tinggal anda dengan benar";
				}else{
					$v_tempattinggal = "TRUE";
				}
			}

			//Validasi Input : Transportasi
			$list_transportasi = array("Jalan Kaki", "Kendaraan Pribadi", "Kendaraan Umum", "Jemputan Sekolah", "Kereta Api", "Dokar", "Perahu", "Lainnya");

			if( empty($_POST['input_transportasi']) ){
				$error_transportasi = "Transportasi tidak boleh kosong";

			}else{
				$transportasi = cek_input( $_POST['input_transportasi'] );

				if( !in_array($transportasi, $list_transportasi) ){
					$error_transportasi = "Pilih Transportasi anda dengan benar";
				}else{
					$v_transportasi = "TRUE";
				}
			}

			//Validasi Input : KKS
			if( !empty($_POST['input_kks']) ){

				$no_kks = cek_input( $_POST['input_kks'] );

				if( !is_numeric($no_kks) ){
					$error_kks = "KKS hanya boleh mengandung nomor saja";
				}else{
					$v_no_kks = "TRUE";
				}
			}

			//Validasi Input : Anak Keberapa
			if( empty($_POST['input_anakkeberapa']) ){
				$error_anakkeberapa = "Anak Keberapa tidak boleh kosong";

			}else{
				$anak_keberapa = cek_input( $_POST['input_anakkeberapa'] );

				if( !is_numeric($anak_keberapa) ){
					$error_anakkeberapa = "Anak Keberapa hanya boleh mengandung nomor saja";
				}else{
					$v_anak_keberapa = "TRUE";
				}
			}

			//Validasi Input : No KPS / PKH
			if( !empty($_POST['input_kpspkh']) ){

				$kpspkh = cek_input( $_POST['input_kpspkh'] );

				if( !is_numeric($kpspkh) ){
					$error_kpspkh = "KPS / PKH hanya boleh mengandung nomor saja";
				}else{
					$v_kpspkh = "TRUE";
				}
			}

			// ========================================================================================

			if( $_POST['btn_simpan']){

				// Validasi Apakah terdapat kesalahan pada Kolom

				$list_validasi = array( $v_nama, $v_jeniskelamin, $v_nisn, $v_nik, $v_tempatlahir, $v_tanggallahir, $v_noaktalahir, $v_agama, $v_kewarganegaraan, $v_kebutuhankhusus, $v_alamatjalan, $v_rt, $v_rw, $v_dusun, $v_kelurahan, $v_kecamatan, $v_kodepos, $v_tempattinggal, $v_transportasi, $v_no_kks, $v_anak_keberapa, $v_kpspkh);

				$validasi_insert = false;
				
				foreach($list_validasi as $field){
					
					if( $field == "" ){
						$validasi_insert = true;
					}

				}

				if($validasi_insert){ 
					echo "<script> alert('Masih terdapat Kolom yang SALAH atau KOSONG'); </script>"; 
				}else{
					include('koneksi.php');

					$query =	"	INSERT INTO tbl_pesertadidik 
									VALUES(
										'DEFAULT',
										'$tanggal_pendaftaran',
										'$nama',
										'$jeniskelamin',
										'$nisn',
										'$nik',
										'$tempatlahir',
										'$tanggallahir',
										'$noaktalahir',
										'$agama',
										'$kewarganegaraan',
										'$kebutuhankhusus',
										'$alamat',
										'$kodepos',
										'$tempattinggal',
										'$transportasi',
										'$no_kks',
										'$anak_keberapa',
										'$kpspkh'
									)
								";

					if($query){
						mysqli_query($koneksi, $query);
						
						echo "<script> alert('TAMBAH DATA BERHASIL'); </script>";
						echo "<script> window.location = 'formulirPesertaDidik.php'; </script>";
					}else{
						echo "<script> alert('ERROR : TAMBAH DATA GAGAL'); </script>";
					}
				}

			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Peserta Didik</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    .warning {color: #FF0000;}
</style>
</head>
<body>

<div class="row"> 
<div class="col-md-6"> 
<div class="card"> 
 
 </div>
 <div class="card-body"> 
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

			<div class="card">


				<div class="card-header bg-warning text-center text-white">
					<h5 class="card-title my-auto"> FORMULIR PESERTA DIDIK </h5>
				</div>

				<div class="card-block px-3">
						
						<!-- Input : Tanggal -->

						<div class="form-group row my-3">
							<label class="col-auto col-form-label"> Tanggal </label>
							<div class="col-auto">
								<input type="date" name="tanggal" class="form-control" readonly value="<?php echo $temp_tanggal; ?>">
							</div>
						</div>

				</div>

				<div class="card-header bg-primary text-left text-white">
					<h8 class="card-subtitle"> DATA PRIBADI </h8>
				</div>

				<div class="card-block px-3">
						
						<!-- Input : Nama Lengkap -->
						<div class="form-group row my-2">
							<label class="col-sm-2 col-form-label"> Nama Lengkap </label>
							<div class="col-sm-5 my-auto">
								<input type="text" name="input_nama" class="form-control  <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>"  value="<?php echo $nama; ?>" >
								<span class="warning"> <?php echo $error_nama; ?> </span>
							</div>
						</div>

						<!-- Input : Jenis Kelamin -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Jenis Kelamin </label>
							<div class="col-sm-5 my-auto">
								<div class="form-check form-check-inline">
									<input type="radio" name="input_jeniskelamin"  id="jk_lakilaki" value="L"  class="form-check-input <?php echo ($error_jeniskelamin !="" ? "is-invalid" : ""); ?>" <?php echo ($jeniskelamin=='L')?'checked':'' ?> >
									<label for="jk_lakilaki" class="form-check-label">Laki-Laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="input_jeniskelamin" id="jk_perempuan" value="P" class="form-check-input  <?php echo ($error_jeniskelamin !="" ? "is-invalid" : ""); ?>" <?php echo ($jeniskelamin=='P')?'checked':'' ?> >
									<label for="jk_perempuan" class="form-check-label">Perempuan</label>
								</div>
								<br>
								<span class="warning"> <?php echo $error_jeniskelamin; ?> </span>
							</div>
						</div>

						<!-- Input : NISN -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> NISN </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_nisn" size="10" maxlength="10" class="form-control  <?php echo ($error_nisn !="" ? "is-invalid" : ""); ?>"  value="<?php echo $nisn; ?>">
								<small class="form-text text-muted text-left">*Kosongkan jika tidak memiliki</small>
								<span class="warning"> <?php echo $error_nisn; ?> </span>
							</div>
						</div>

						<!-- Input : NIK / No. KITAS (Untuk WNA) -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> NIK / No. KITAS (Untuk WNA) </label>
							<div class="col-sm-3 my-auto">
								<input type="text" name="input_nik" maxlength="16" class="form-control  <?php echo ($error_nik !="" ? "is-invalid" : ""); ?>"  value="<?php echo $nik; ?>" >
								<span class="warning"> <?php echo $error_nik; ?> </span>
							</div>
						</div>

						<!-- Input : Tempat Lahir -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Tempat Lahir </label>
							<div class="col-sm-3 my-auto">
								<input type="text" name="input_tempatlahir" class="form-control  <?php echo ($error_tempatlahir !="" ? "is-invalid" : ""); ?>"  value="<?php echo $tempatlahir; ?>" >
								<span class="warning"> <?php echo $error_tempatlahir; ?> </span>
							</div>
						</div>

						<!-- Input : Tanggal Lahir -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Tanggal Lahir </label>
							<div class="col-sm-3 my-auto">
								<input type="date" name="input_tanggallahir" class="form-control  <?php echo ($error_tanggallahir !="" ? "is-invalid" : ""); ?>"  value="<?php echo $tanggallahir; ?>" >
								<span class="warning"> <?php echo $error_tanggallahir; ?> </span>
							</div>
						</div>

						<!-- Input : No Registrasi Akta Lahir -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> No Registrasi Akta Lahir </label>
							<div class="col-sm-5 my-auto">
								<input type="text" name="input_noaktalahir" size="18" maxlength="18" class="form-control <?php echo ($error_noaktalahir !="" ? "is-invalid" : ""); ?>"  value="<?php echo $noaktalahir; ?>" >
								<span class="warning"> <?php echo $error_noaktalahir; ?> </span>
							</div>
						</div>

						<!-- Input : Agama & Kepercayaan-->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Agama & Kepercayaan </label>
							<div class="col-auto my-auto">
								<select name="input_agama" class="form-control  <?php echo ($error_agama !="" ? "is-invalid" : ""); ?>">
									<option value="" disabled selected> == Pilih Agama == </option>
									<option value="Islam" <?php echo ($agama=='Islam')?'selected':'' ?> > Islam </option>
									<option value="Kristen" <?php echo ($agama=='Kristen')?'selected':'' ?> > Kristen </option>
									<option value="Katolik" <?php echo ($agama=='Katolik')?'selected':'' ?> > Katolik </option>
									<option value="Hindu" <?php echo ($agama=='Hindu')?'selected':'' ?> > Hindu </option>
									<option value="Buddha" <?php echo ($agama=='Buddha')?'selected':'' ?> > Buddha </option>
									<option value="Kong Hu Cu" <?php echo ($agama=='Kong Hu Cu')?'selected':'' ?> > Kong Hu Cu </option>
								</select>
								<span class="warning"> <?php echo $error_agama; ?> </span>
							</div>
						</div>

						<!-- Input : Kewarganegaraan -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Kewarganegaraan </label>
							<div class="col-sm-5 my-auto">
								
								<div class="form-check">
									<input type="radio" name="input_kewarganegaraan" id="kwrgngr_true" value="Indonesia" class="form-check-input  <?php echo ($error_kewarganegaraan !="" ? "is-invalid" : ""); ?>"  <?php echo ($kewarganegaraan=='Indonesia')?'checked':'' ?> >
									<label for="kwrgngr_true" class="form-check-label">Indonesia (WNI)</label>
								</div>
								<div class="form-check">
									<input type="radio" name="input_kewarganegaraan" id="kwrgngr_false" value="nonIndonesia" class="form-check-input  <?php echo ($error_kewarganegaraan !="" ? "is-invalid" : ""); ?>"  <?php echo ($radio_kewarganegaraan=="nonIndonesia")?'checked':'' ?> >
									<label for="kwrgngr_false" class="form-check-label">Asing (WNA)</label>
								</div>

								<input type="text" name="input_nonindonesia" placeholder="Masukkan nama negara " class="form-control  <?php echo ($error_kewarganegaraan !="" ? "is-invalid" : ""); ?>" value="<?php echo $nonindonesia; ?>" >
								<span class="warning"> <?php echo $error_kewarganegaraan; ?> </span>

							</div>
						</div>

						<!-- Input : Berkebutuhan Khusus -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Berkebutuhan Khusus </label>
							<div class="col-sm-auto my-auto">

								<select name="input_kebutuhankhusus[]" class="form-control   <?php echo ($error_kebutuhankhusus !="" ? "is-invalid" : ""); ?>" size="4" multiple>

									<option value="Tidak">	Tidak Berkebutuhan Khusus </option>
									<option value="Netra" <?php echo (select_multiple($kebutuhankhusus, "Netra")==true)?'selected':''; ?> > Netra </option>
									<option value="Rungu" <?php echo (select_multiple($kebutuhankhusus, "Rungu")==true)?'selected':''; ?> > Rungu </option>
									<option value="Grahita Ringan" <?php echo (select_multiple($kebutuhankhusus, "Grahita Ringan")==true)?'selected':''; ?> > Grahita Ringan </option>
									<option value="Grahita Sedang" <?php echo (select_multiple($kebutuhankhusus, "Grahita Sedang")==true)?'selected':''; ?> > Grahita Sedang </option>
									<option value="Daksa Ringan" <?php echo (select_multiple($kebutuhankhusus, "Daksa Ringan")==true)?'selected':''; ?> > Daksa Ringan	</option>
									<option value="Daksa Sedang" <?php echo (select_multiple($kebutuhankhusus, "Daksa Sedang")==true)?'selected':''; ?> > Daksa Sedang	</option>
									<option value="Laras" <?php echo (select_multiple($kebutuhankhusus, "Laras")==true)?'selected':''; ?> > Laras </option>
									<option value="Wicara" <?php echo (select_multiple($kebutuhankhusus, "Wicara")==true)?'selected':''; ?> > Wicara	</option>
									<option value="Tuna Ganda" <?php echo (select_multiple($kebutuhankhusus, "Tuna Ganda")==true)?'selected':''; ?> > Tuna Ganda	</option>
									<option value="Hiper Aktif" <?php echo (select_multiple($kebutuhankhusus, "Hiper Aktif")==true)?'selected':''; ?> > Hiper Aktif </option>
									<option value="Cerdas Istimewa" <?php echo (select_multiple($kebutuhankhusus, "Cerdas Istimewa")==true)?'selected':''; ?> > Cerdas Istimewa </option>
									<option value="Bakat Istimewa" <?php echo (select_multiple($kebutuhankhusus, "Bakat Istimewa")==true)?'selected':''; ?> > Bakat Istimewa	</option>
									<option value="Kesulitan Belajar" <?php echo (select_multiple($kebutuhankhusus, "Kesulitan Belajar")==true)?'selected':''; ?> > Kesulitan Belajar </option>
									<option value="Narkoba" <?php echo (select_multiple($kebutuhankhusus, "Narkoba")==true)?'selected':''; ?> > Narkoba </option>
									<option value="Indigo" <?php echo (select_multiple($kebutuhankhusus, "Indigo")==true)?'selected':''; ?> > Indigo	</option>
									<option value="Down Sindrome" <?php echo (select_multiple($kebutuhankhusus, "Down Sindrome")==true)?'selected':''; ?> > Down Sindrome </option>
									<option value="Autis" <?php echo (select_multiple($kebutuhankhusus, "Autis")==true)?'selected':''; ?> > Autis </option>

								</select>
								<small class="form-text text-muted text-left">*Tekan Ctrl untuk memilih lebih dari satu</small>	
								<span class="warning"> <?php echo $error_kebutuhankhusus; ?> </span>

							</div>
						</div>

						<!-- Input : Alamat Jalan -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Alamat Jalan </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="input_alamatjalan" class="form-control  <?php echo ($error_alamatjalan !="" ? "is-invalid" : ""); ?>" value="<?php echo $alamatjalan; ?>">
								<span class="warning"> <?php echo $error_alamatjalan; ?> </span>
							</div>
						</div>

						<!-- Input : RT -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> RT </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_rt" size="2" maxlength="2" class="form-control  <?php echo ($error_rt !="" ? "is-invalid" : ""); ?>" value="<?php echo $rt; ?>">
								<span class="warning"> <?php echo $error_rt; ?> </span>
							</div>
						</div>

						<!-- Input : RW -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> RW </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_rw" size="2" maxlength="2" class="form-control  <?php echo ($error_rw !="" ? "is-invalid" : ""); ?>" value="<?php echo $rw; ?>">
								<span class="warning"> <?php echo $error_rw; ?> </span>
							</div>
						</div>

						<!-- Input : Nama Dusun -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Nama Dusun </label>
							<div class="col-sm-3 my-auto">
								<input type="text" name="input_dusun" class="form-control  <?php echo ($error_dusun !="" ? "is-invalid" : ""); ?>" value="<?php echo $dusun; ?>">
								<span class="warning"> <?php echo $error_dusun; ?> </span>
							</div>
						</div>

						<!-- Input : Nama Kelurahan/Desa -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Nama Kelurahan/Desa </label>
							<div class="col-sm-3 my-auto">
								<input type="text" name="input_kelurahan" class="form-control  <?php echo ($error_kelurahan !="" ? "is-invalid" : ""); ?>" value="<?php echo $kelurahan; ?>">
								<span class="warning"> <?php echo $error_kelurahan; ?> </span>
							</div>
						</div>

						<!-- Input : Kecamatan -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Kecamatan </label>
							<div class="col-sm-3 my-auto">
								<input type="text" name="input_kecamatan" class="form-control  <?php echo ($error_kecamatan !="" ? "is-invalid" : ""); ?>" value="<?php echo $kecamatan; ?>">
								<span class="warning"> <?php echo $error_kecamatan; ?> </span>
							</div>
						</div>

						<!-- Input : Kode Pos -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Kode Pos </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_kodepos" size="3" maxlength="5"  class="form-control  <?php echo ($error_kodepos !="" ? "is-invalid" : ""); ?>" value="<?php echo $kodepos; ?>">
								<span class="warning"> <?php echo $error_kodepos; ?> </span>
							</div>
						</div>

						<!-- Input : Tempat Tinggal -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Tempat Tinggal </label>
							<div class="col-sm-auto my-auto">

								<select name="input_tempattinggal" class="form-control   <?php echo ($error_tempattinggal !="" ? "is-invalid" : ""); ?>">

									<option value="" disabled selected>	== Pilih Tempat Tinggal ==	</option>
									<option value="Bersama Orang Tua" <?php echo ($tempattinggal=='Bersama Orang Tua')?'selected':'' ?> > Bersama Orang Tua </option>
									<option value="Wali" <?php echo ($tempattinggal=='Wali')?'selected':'' ?> >	Wali </option>
									<option value="Kos" <?php echo ($tempattinggal=='Kos')?'selected':'' ?> > Kos </option>
									<option value="Asrama" <?php echo ($tempattinggal=='Asrama')?'selected':'' ?> >	Asrama </option>
									<option value="Panti Asuhan" <?php echo ($tempattinggal=='Panti Asuhan')?'selected':'' ?> > Panti Asuhan </option>
									<option value="Pesantren" <?php echo ($tempattinggal=='Pesantren')?'selected':'' ?> > Pesantren </option>
									<option value="Lainnya" <?php echo ($tempattinggal=='Lainnya')?'selected':'' ?> > Lainnya </option>

								</select>
								<span class="warning"> <?php echo $error_tempattinggal; ?> </span>

							</div>
						</div>

						<!-- Input : Media Transportasi -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Media Transportasi </label>
							<div class="col-sm-auto my-auto">

								<select name="input_transportasi" class="form-control  <?php echo ($error_transportasi !="" ? "is-invalid" : ""); ?>">

									<option value="" disabled selected>	== Pilih Transportasi ==	</option>
									<option value="Jalan Kaki" <?php echo ($transportasi=='Jalan Kaki')?'selected':'' ?> > Jalan Kaki </option>
									<option value="Kendaraan Pribadi" <?php echo ($transportasi=='Kendaraan Pribadi')?'selected':'' ?> > Kendaraan Pribadi </option>
									<option value="Kendaraan Umum" <?php echo ($transportasi=='Kendaraan Umum')?'selected':'' ?> > Kendaraan Umum </option>
									<option value="Jemputan Sekolah" <?php echo ($transportasi=='Jemputan Sekolah')?'selected':'' ?> > Jemputan Sekolah	</option>
									<option value="Kereta Api" <?php echo ($transportasi=='Kereta Api')?'selected':'' ?> > Kereta Api </option>
									<option value="Dokar" <?php echo ($transportasi=='Dokar')?'selected':'' ?> > Dokar/Andong/Bendi/Beca </option>
									<option value="Perahu" <?php echo ($transportasi=='Perahu')?'selected':'' ?> > Perahu Penyebrangan </option>
									<option value="Lainnya" <?php echo ($transportasi=='Lainnya')?'selected':'' ?> > Lainnya </option>
								
								</select>
								<span class="warning"> <?php echo $error_transportasi; ?> </span>
								<?php //echo "<script> alert('".$error_transportasi."'); </script>"; ?>
							</div>
						</div>

						<!-- Input :  Nomor Kartu Keluarga Sejahtera (KKS) -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Nomor Kartu Keluarga Sejahtera (KKS) </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_kks" size="6" maxlength="6" class="form-control  <?php echo ($error_kks !="" ? "is-invalid" : ""); ?>" value="<?php echo $no_kks; ?>">
								<small class="form-text text-muted text-left">*Kosongkan jika tidak memiliki</small>	
								<span class="warning"> <?php echo $error_kks; ?> </span>
							</div>
						</div>

						<!-- Input :  Anak Keberapa -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> Anak Keberapa </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_anakkeberapa" size="1" maxlength="2" class="form-control  <?php echo ($error_anakkeberapa !="" ? "is-invalid" : ""); ?>" value="<?php echo $anak_keberapa; ?>">
								<span class="warning"> <?php echo $error_anakkeberapa; ?> </span>
							</div>
						</div>

						<!-- Input : No KPS/PKH -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label"> No KPS/PKH </label>
							<div class="col-sm-auto my-auto">
								<input type="text" name="input_kpspkh" size="7" maxlength="14" class="form-control  <?php echo ($error_kpspkh !="" ? "is-invalid" : ""); ?>" value="<?php echo $kpspkh; ?>">
								<small class="form-text text-muted text-left">
									KPS (Kartu Perlindungan Sosial)/PKH (Program Keluarga Harapan)
								</small>
								<small class="form-text text-muted text-left">*Kosongkan jika tidak memiliki</small>	
								<span class="warning"> <?php echo $error_kpspkh; ?> </span>
							</div>
						</div>

				</div>

				<div class="card-footer">
						
						<div class="form-group row my-2">
							
							<div class="col-sm-12 text-center">
								<input type="submit" name="btn_simpan" value="Simpan" class="btn btn-success">
								<input type="reset" name="btn_reset" value="Reset" class="btn btn-warning">
								<input type="submit" name="btn_batal" value="Batal" class="btn btn-danger">
							</div>

						</div>

				</div>


			</div>

		</form>

	</div>

</body>
</html>