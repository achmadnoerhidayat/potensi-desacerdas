<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');

	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	$txttgl = ubahformatTgl($_POST['txttgl']);
	$txtkdkel = $_POST['txtkdkel'];
	$txtinfo = $_POST['txtinfo'];
	$txtlok = $_POST['txtlok'];
	$txtestimasi = $_POST['txtestimasi'];
	$txtnm = $_POST['txtnm'];
	
	mysqli_query($koneksi,"INSERT INTO tbtracking (kode, tgl, lokasi, estimasi, info, nama) VALUES 
							('$txtkdkel','$txttgl','$txtlok','$txtestimasi','$txtinfo','$txtnm')");
							
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('covid_tracking.php');</script>";
?>