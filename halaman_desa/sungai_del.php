<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];

	$cari_kd=mysqli_query($koneksi,"SELECT file_name FROM tbsungai WHERE id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_name=$tm_cari['file_name'];
	
	$modal=mysqli_query($koneksi,"Delete FROM tbsungai WHERE id='$id'");
    unlink('../file_upload/'.$file_name);
	header('location:sungai.php');
?>