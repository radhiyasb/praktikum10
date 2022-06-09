<?php

	include('koneksi.php');
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'No');
	$sheet->setCellValue('B1', 'ID Pendaftaran');
	$sheet->setCellValue('C1', 'Tanggal Pendaftaran');
	$sheet->setCellValue('D1', 'Nama');
	$sheet->setCellValue('E1', 'Jenis Kelamin');
	$sheet->setCellValue('F1', 'NISN');
	$sheet->setCellValue('G1', 'NIK');
	$sheet->setCellValue('H1', 'Tempat Lahir');
	$sheet->setCellValue('I1', 'Tanggal Lahir');
	$sheet->setCellValue('J1', 'No Akta Lahir');
	$sheet->setCellValue('K1', 'Agama');
	$sheet->setCellValue('L1', 'Kewarganegaraan');
	$sheet->setCellValue('M1', 'Kebutuhan Khusus');
	$sheet->setCellValue('N1', 'Alamat');
	$sheet->setCellValue('O1', 'Kode Pos');
	$sheet->setCellValue('P1', 'Tempat Tinggal');
	$sheet->setCellValue('Q1', 'Transportasi');
	$sheet->setCellValue('R1', 'No KKS');
	$sheet->setCellValue('S1', 'Anak Keberapa');
	$sheet->setCellValue('T1', 'No KPS');

		$query = "  SELECT *
					FROM tbl_pesertadidik ";
		$result = mysqli_query($koneksi, $query);

		$baris = 2;
		$no = 1;

		if( mysqli_num_rows($result) > 0 ){

			while( $row = mysqli_fetch_assoc($result) ){

				$sheet->setCellValue('A'.$baris, $no);
				$sheet->setCellValue('B'.$baris, $row['id_pendaftaran'] );
				$sheet->setCellValue('C'.$baris, $row['tanggal_pendaftaran'] );
				$sheet->setCellValue('D'.$baris, $row['nama'] );
				$sheet->setCellValue('E'.$baris, $row['jenis_kelamin'] );
				$sheet->setCellValue('F'.$baris, $row['nisn'] );
				$sheet->setCellValue('G'.$baris, $row['nik'] );
				$sheet->setCellValue('H'.$baris, $row['tempat_lahir'] );
				$sheet->setCellValue('I'.$baris, $row['tanggal_lahir'] );
				$sheet->setCellValue('J'.$baris, $row['no_aktalahir'] );
				$sheet->setCellValue('K'.$baris, $row['agama'] );
				$sheet->setCellValue('L'.$baris, $row['kewarganegaraan'] );
				$sheet->setCellValue('M'.$baris, $row['kebutuhan_khusus'] );
				$sheet->setCellValue('N'.$baris, $row['alamat'] );
				$sheet->setCellValue('O'.$baris, $row['kode_pos'] );
				$sheet->setCellValue('P'.$baris, $row['tempat_tinggal'] );
				$sheet->setCellValue('Q'.$baris, $row['media_transportasi'] );
				$sheet->setCellValue('R'.$baris, $row['no_kks'] );
				$sheet->setCellValue('S'.$baris, $row['anak_keberapa'] );
				$sheet->setCellValue('T'.$baris, $row['no_kps'] );
				
				$baris++;
				$no++;

			}

		}

		//Start : Styling

		$headingborder	=	[
								'font' =>	array(
												'bold' => true
								),
							];

		$allborder = [
				'borders' => [
					'allBorders' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
			];

		$sheet->getStyle('A1:T1')->applyFromArray($headingborder);

		$baris = $baris - 1;
		$sheet->getStyle('A1:T'.$baris)->applyFromArray($allborder);
		//End : Styling

		$writer = new Xlsx($spreadsheet);
		$temp_tanggal = date("Y_m_d_H_i_s");

		$writer->save('../export/Export_'.$temp_tanggal.'.xlsx');

		echo "<script> alert('Ekspor BERHASIL') </script>";
		echo "<script> window.location = 'index.php'; </script>";

?>