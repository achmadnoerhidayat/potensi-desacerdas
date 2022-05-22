<?php
session_start();
	
	if($_SESSION['nip']==''){
		header("location:../index.php");
	} else {
		$kd_kel=$_SESSION['kodewil'];
		$nip=$_SESSION['nip'];
		$nm_user=$_SESSION['nm_user'];
		
	include "config/koneksi.php";
		$cari_kd=mysqli_query($koneksi,"SELECT file_photo, file_name FROM tbuser WHERE nip='$nip'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$file_photo=$tm_cari['file_photo'];
	$file_name=$tm_cari['file_name'];
	if($file_photo=='') {
		$file_photo="dist/images/logo.svg";
	}
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
	$tgl_skr=date('d/m/Y');
?>

<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title><?php include "titel.php"; ?></title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->

<style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #7CFC00;
	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style1{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: grey;
	}
	.btn_style1:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>

<style>
	.btn_style2{
		border: 1px solid #cecece;
		border-radius: 3px;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: #FFD700;
	}
	.btn_style2:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
	</style>
	
	
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_pengaduan01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="#" class="">Pengaduan</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="#" class="breadcrumb--active">Pengaduan Masuk</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->

                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="User Profil" src="<?php echo $file_photo; ?>">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?php echo $nm_user; ?></div>
                                    <div class="text-xs text-theme-41"><?php include "titel_status.php"; ?></div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="change_pwd.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="logout.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
				
				<div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <div class="intro-y box p-5">

                                        <table class="table">
                                            <tbody>
											<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
												<tr class="">
													<td width="30%" class="no-border">
														<input class="input pr-12 w-full border col-span-4" 
														id="txttgl" name="txttgl" placeholder="Tanggal" autocomplete="off">               
													</td>
													<td width="40%" class="no-border">
														<input class="input pr-12 w-full border col-span-4" 
														placeholder="NIK/Nama" id="txtcari" name="txtcari" autocomplete="off">               
													</td>
													<td width="30%" class="no-border">
														<select class="input pr-12 w-full border col-span-4" name="cbokat" id="cbokat">
														<option value="">Kategori Pengaduan</option>
														<?php
													$sql="select id, nm_kategori FROM tbkategori_pengaduan";
			       										$sql_row=mysqli_query($koneksi,$sql);
			       										while($sql_res=mysqli_fetch_assoc($sql_row))	
														{
												?>
													<option value="<?php echo $sql_res["id"]; ?>"><?php echo $sql_res["nm_kategori"]; ?></option>
			       									<?php
			       										}
			       									?>
														</select>               
													</td>
												</tr>
												<tr class="">
													<td colspan="3" class="no-border text-center">
														<button type="submit" name="tambah" class="button w-40 bg-theme-1 text-white">CARI</button>
													</td>
												</tr>
											</form>
                                                
                                            </tbody>
                                        </table>

						</div>
					</div>
				</div>
				
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">

                                                        <a href="pengaduan_input.php"><button class="button text-white bg-theme-1 shadow-md mr-2">
							Input Pengaduan
						</button></a><br>&nbsp;

										<table class="table table--sm" width="100%"> 
											<thead> 
												<tr> 
													<th class="border text-center whitespace-no-wrap">Tanggal</th>
													<th class="border text-center whitespace-no-wrap">NIK</th>
													<th class="border whitespace-no-wrap">Nama Lengkap</th>
													<th class="border text-center whitespace-no-wrap">Kategori Pengaduan</th>
													<th class="border text-center whitespace-no-wrap">Balas</th>
													
												</tr> 
											</thead>  

											<?php 
												$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

												if(isset($_POST['tambah'])){	
													$cbokat = $_POST['cbokat'];	
													$txtcari = $_POST['txtcari'];
													$txttgl = $_POST['txttgl'];

													if($txtcari<>'') {
														$result = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
(tbpengaduan.nama like '%$txtcari%' or tbpengaduan.nik='$txtcari')");
													}

if($cbokat<>'') {
														$result = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
tbpengaduan.kd_kategori='$cbokat'");
}

if($txttgl<>'') {
														$result = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y')='$txttgl'");
}

if ($txttgl=='' and $cbokat=='' and $txtcari=='') {
													$result = mysqli_query($koneksi,"SELECT * FROM tbpengaduan where kode='$kd_kel'");
}

												} else {
													$result = mysqli_query($koneksi,"SELECT * FROM tbpengaduan where kode='$kd_kel'");
												}

												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            

												if(isset($_POST['tambah'])){	

													$cbokat = $_POST['cbokat'];	
													$txtcari = $_POST['txtcari'];
													$txttgl = $_POST['txttgl'];

if($txtcari<>'') {
													$query = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
(tbpengaduan.nama like '%$txtcari%' or tbpengaduan.nik='$txtcari') LIMIT $mulai, $halaman")or die(mysql_error);
}
													
if($cbokat<>'') {
													$query = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
tbpengaduan.kd_kategori='$cbokat' LIMIT $mulai, $halaman")or die(mysql_error);
}

if($txttgl<>'') {
													$query = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' and 
DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y')='$txttgl' LIMIT $mulai, $halaman")or die(mysql_error);
}

if ($txttgl=='' and $cbokat=='' and $txtcari=='') {
													$query = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' LIMIT $mulai, $halaman")or die(mysql_error);
}

												} else {
													$query = mysqli_query($koneksi,"SELECT 
tbpengaduan.tanggal, DATE_FORMAT(tbpengaduan.tanggal,'%d/%m/%Y') AS tgl,
tbpengaduan.nik, tbpengaduan.nama, 
tbpengaduan.kd_kategori, tbkategori_pengaduan.nm_kategori, 
tbpengaduan.isi, tbpengaduan.id, tbpengaduan.balasan  
FROM tbpengaduan, tbkategori_pengaduan 
WHERE tbpengaduan.kd_kategori=tbkategori_pengaduan.id and tbpengaduan.kode='$kd_kel' LIMIT $mulai, $halaman")or die(mysql_error);
												}
												$no =$mulai+1;
												while ($data = mysqli_fetch_assoc($query)) {
													
											?>
												<tbody>
													<tr>
														<td class="border text-center"><?php echo $data['tgl']; ?></td>    
														<td class="border text-center"><?php echo $data['nik']; ?></td>    
														<td class="border"><?php echo $data['nama']; ?></td>    
														<td class="border text-center"><?php echo $data['nm_kategori']; ?></td>	
														<td class="border text-center">
															<center>
																<a class="" href="pengaduan_balasan.php?kd=<?php echo $data['id']?>"> <i data-feather="mail"></i></a>
															</center>
														</td>
																					  
													</tr>
												</tbody>
												<?php               
													} 
												?>
										</table>          
                                        <table class="table">
                                            <tbody>
                                                <tr class="">
                                                    <td width="20%" class="no-border"></td>
                                                    <td width="80%" class="no-border text-right">
														<?php for ($i=1; $i<=$pages ; $i++){ ?>
															<a href="?halaman=<?php echo $i; ?>"><font size="2"><?php echo $i; ?></font></a>&nbsp;
														<?php } ?> 
													</td>
                                                </tr>
											</tbody>
										</table>

                <!-- END: Datatable -->


                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>