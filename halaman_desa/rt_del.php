<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbrt WHERE id_rt='$id'");
	header('location:rt.php');
?>