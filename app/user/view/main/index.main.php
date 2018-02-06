<?php
ob_start();
?>
	<style>
		html {
			font-family: sans-serif;
		}
		table.table-laporan {
			margin-top:10px;
			margin-left:auto; 
			margin-right:auto;
			border-collapse: collapse;
			font-family: sans-serif;
			color: #444;
			border: 1px solid #f2f5f7;
		}
		h3 {
			font-weight: bold;
			text-align:center;
		}

		table tr th {
			font-size: 14px;
			background: #35A9DB;
			color: #fff;
			font-weight: normal;
			width:40px;
		}
		
		.table-laporan tr td {
			text-align:center;
		} 
		
		.lampiran tr td {
			font-size: 12px;
		}

		hr {
			margin-top: 5px;
		}
	</style>

<div class="main-laporan">
	<h3>
		RENCANA RPJ M DESA<br>
		TAHUN 2014 S.D 2020
	</h3>
	<hr>
	<table class="lampiran">
		<tr>
			<td>DESA</td>
			<td>:</td>
			<td>PEMERINTAH DESA SIMBANG DESA</td>
		</tr>
		<tr>
			<td>KECAMATAN</td>
			<td>:</td>
			<td>KECAMATAN TULIS</td>
		</tr>
		<tr>
			<td>KABUPATEN/KOTA</td>
			<td>:</td>
			<td>KABUPATEN BATANG</td>
		</tr>
		<tr>
			<td>PROVINSI</td>
			<td>:</td>
			<td>PROVINSI JAWA TENGAH</td>
		</tr>
	</table>

	<table width="100%" class="table-laporan" border="1">
		<thead>
			<tr>
				<th rowspan="2">NO</th>
				<th colspan="2">BIDANG / JENIS BIDANG</th>
				<th rowspan="2">
					LOKASI RT/RW DUSUN
				</th>
				<th rowspan="2">
					PERKIRAAN VOLUME
				</th>
				<th rowspan="2">
					SASARAN MANFAAT
				</th>
				<th colspan="6">
					WAKTU PELAKSANAAN
				</th>
				<th colspan="2">
					PERKIRAAN BIAYA & SUMBERDANA
				</th>
				<th colspan="3">
					POLA PELAKSANAAN
				</th>
			</tr>
			<tr>
				<th>BIDANG/SUB BIDANG</th>
				<th>JENIS KEGIATAN</th>
				<th>TH 1</th>
				<th>TH 2</th>
				<th>TH 3</th>
				<th>TH 4</th>
				<th>TH 5</th>
				<th>TH 6</th>
				<th>JUMLAH (RUPIAH)</th>
				<th>SUMBER</th>
				<th>SEWA KELOLA</th>
				<th>KERJASAMA</th>
				<th>PIHAK KETIGA</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<!-- Dummy Sample Laporan -->
				<!-- Rowspan di isi sesuai jumlah count data +1  jika data ada 6 maka rowspan akan otomatis jadi 6+1-->
				<td rowspan="3">01</td>
				<td rowspan="3">Bidang Penyelenggaran Pemerintahan Desa</td>
			</tr>
			<tr>
				<td>Pembayaran Penghasilan Tetap</td>
				<td>Desa Simbang Desa</td>
				<td>12</td>
				<td>Terpenuhinya Kesejahteraan Aparatur Desa</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>315.496.200,00</td>
				<td>ADD, PAD</td>
				<td>v</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Kegiatan Organisasi Kantor Desa</td>
				<td>Desa Simbang Desa</td>
				<td>1 ls</td>
				<td>Terpenuhinya Kantor Desa yang nyaman</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>v</td>
				<td>27.372.800,00</td>
				<td>ADD</td>
				<td>v</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center" colspan="12">JUMLAH PER BIDANG</td>
				<td>342.899.000,00</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
			<tr>
				<td align="center" colspan="12">JUMLAH PER BIDANG</td>
				<td>342.899.000,00</td>
				<td></td>
				<td colspan="3"></td>
			</tr>	
			<!-- End Dummy -->
		</tbody>
	</table>

<?php //echo "<p align='right'>Batang, ".date('d-m-Y')."<br>KEPALA DESA KEPUH<br><br><br>( Ahmad Mubarok )</p>"; ?>
</div>
<?php

require_once ('comp/mPDF610/vendor/autoload.php');
$html = ob_get_contents();
$filename = 'laporan.pdf';
ob_end_clean();

// PORTRAIT
//$pdf = new mPDF('UTF8', 'A4-P');
// LANDSCAPE
$pdf = new mPDF('UTF8', 'F4-L');

$pdf->SetDisplayMode('fullpage');
$pdf->setFooter('text footer');
$pdf->WriteHTML(utf8_encode($html));
$pdf->Output();

// unkomentar untuk force download
//$pdf->Output($filename, 'D');
?>
