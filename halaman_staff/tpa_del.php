<?php
	include "config/koneksi.php";
	$id=$_GET['kd'];
	$modal=mysqli_query($koneksi,"Delete FROM tbtpa WHERE id='$id'");
	header('location:tpa.php');
?>