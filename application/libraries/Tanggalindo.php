<?php

class Tanggalindo
{
	public function tanggalJamIndonesia($tanggal, $tipe = 1)
	{
		// array hari dan bulan
		$Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Jumat", "Sabtu");
		$Bulan = array(
			"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juni", "Juli", "Agustus", "September",
			"Oktober", "November", "Desember"
		);
		// pemisahan tahun, bulan, hari, dan waktu
		$tahun = substr($tanggal, 0, 4);
		$bulan = substr($tanggal, 5, 2);
		$tgl = substr($tanggal, 8, 2);
		$waktu = substr($tanggal, 11, 5);
		$hari = date("w", strtotime($tanggal));
		$output = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;
		if ($tipe == 1) {
			$output = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
		} elseif ($tipe == 2) {
			$output = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
		} elseif ($tipe == 3) {
			$output = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;
		}
		return $output;
	}
}
