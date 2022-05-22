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
	
	$tgl_skr=date('Y/m/m');
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kel=$tm_cari['nama'];
	
$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];
	
	$id = $_POST['txtid'];
	$txtnik = $_POST['txtnik'];
	$txtnm = $_POST['txtnm'];
	$txttempatlhr = $_POST['txttempatlhr'];
	$cbojk = $_POST['cbojk'];
	$cbodukuh = $_POST['cbodukuh'];
	$cbort = $_POST['cbort'];
	$txtrw = $_POST['txtrw'];
	$txttgllahir = $_POST['txttgllahir'];
	
	$folder = "../file_upload/";
	
	$folder1 = $folder . basename( $_FILES['id-input-file-1']['name']) ;
	$temp1 = $_FILES['id-input-file-1']['tmp_name'];
	$name1 = basename( $_FILES['id-input-file-1']['name']) ;
	if(!empty($_FILES["id-input-file-1"]["tmp_name"])){
		move_uploaded_file($temp1, $folder1);
		$sql_insert="UPDATE tbumkm SET file_berkas1='$folder1', file_berkas1_name='$name1' where id='$id'";
		mysqli_query($koneksi,$sql_insert);		
	}
		
	$folder2 = $folder . basename( $_FILES['id-input-file-2']['name']) ;
	$temp2 = $_FILES['id-input-file-2']['tmp_name'];
	$name2 = basename( $_FILES['id-input-file-2']['name']) ;
	if(!empty($_FILES["id-input-file-2"]["tmp_name"])){
		move_uploaded_file($temp2, $folder2);
		$sql_insert="UPDATE tbumkm SET file_berkas2='$folder2', file_berkas2_name='$name2' where id='$id'";
		mysqli_query($koneksi,$sql_insert);		
	}

	$folder3 = $folder . basename( $_FILES['id-input-file-3']['name']) ;
	$temp3 = $_FILES['id-input-file-3']['tmp_name'];
	$name3 = basename( $_FILES['id-input-file-3']['name']) ;
	if(!empty($_FILES["id-input-file-3"]["tmp_name"])){
		move_uploaded_file($temp3, $folder3);
		$sql_insert="UPDATE tbumkm SET file_berkas3='$folder3', file_berkas3_name='$name3' where id='$id'";
		mysqli_query($koneksi,$sql_insert);		
	}	

 


	$cari_kd=mysqli_query($koneksi,"SELECT nik, nama, tempat_lhr, 
					tgl_lhr, DATE_FORMAT(tgl_lhr,'%d/%m/%Y') AS tgl, 
					id_jk, id_dukuh, id_rt, rw, 
					nama_umkm, no_tlp, id_dukuh1, id_rt1, rw1, deskripsi, file_cover, file_cover_name, 
					file_berkas1, file_berkas1_name, file_berkas2, file_berkas2_name, file_berkas3, file_berkas3_name 
					FROM tbumkm where id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_umkm=$tm_cari['nama_umkm'];
	$no_tlp=$tm_cari['no_tlp'];
	$id_dukuh1=$tm_cari['id_dukuh1'];
	$id_rt1=$tm_cari['id_rt1'];
	$rw1=$tm_cari['rw1'];
	$deskripsi=$tm_cari['deskripsi'];
	$file_cover=$tm_cari['file_cover'];
	$file_cover_name=$tm_cari['file_cover_name'];
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
		
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_umkm01.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
<div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="" class="">UMKM Desa</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="" class="breadcrumb--active">Edit Data UMKM</a> </div>
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
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
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
						<table class="table table--sm" width="100%"> 
							<tr> 
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="34%">
									<font color="white">Data Pemohon</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="blue" width="33%">
									<font color="white">Unggah Berkas</font>
								</td>
								<td class="border text-center whitespace-no-wrap" bgcolor="white" width="33%">
									<font color="black">Informasi UMKM</font>
								</td>
							</tr> 
						</table>
						
<form class="form-horizontal" enctype="multipart/form-data" action="umkm_edit_proses.php" method="post">
							<input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
							<input type="hidden" name="txtnik" value="<?php echo $txtnik; ?>"/>
							<input type="hidden" name="txtnm" value="<?php echo $txtnm; ?>"/>
							<input type="hidden" name="txttempatlhr" value="<?php echo $txttempatlhr; ?>"/>
							<input type="hidden" name="cbojk" value="<?php echo $cbojk; ?>"/>
							<input type="hidden" name="cbodukuh" value="<?php echo $cbodukuh; ?>"/>
							<input type="hidden" name="cbort" value="<?php echo $cbort; ?>"/>
							<input type="hidden" name="txtrw" value="<?php echo $txtrw; ?>"/>
							<input type="hidden" name="txttgllahir" value="<?php echo $txttgllahir; ?>"/>
							
							
                        <div class="intro-y box">
                            <div class="p-5" id="input">
							
                                <div class="preview">
										<div class="mt-3">
											<div>
												<label><b>Upload Cover Produk/UMKM</b>&nbsp;<?php echo $file_cover; ?></label>
												<input type="file" id="id-input-file-4" name="id-input-file-4" class="input w-full border mt-2" />
												<label>*Tipe File PNG,JPEG, Ukuran Maksimum 5Mb</label>
											</div>
										</div>
										<div class="mt-3">
											<div class="relative mt-2">
												<textarea class="input w-full border mt-2" id="txtdeskripsi" name="txtdeskripsi" rows="3" placeholder="Deskripsi UMKM" required><?php echo $deskripsi; ?></textarea>
											</div>

											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama UMKM" 
												id="txtumkm" name="txtumkm" autocomplete="off" value="<?php echo $nama_umkm; ?>">
											</div>

											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="No. Telepon" 
												id="txttlp" name="txttlp" autocomplete="off" value="<?php echo $no_tlp; ?>">
											</div>

											<div class="relative mt-2">
												<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kab; ?>" disabled>
											</div>

											<div class="relative mt-2">
												<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kec; ?>" disabled>
											</div>

											<div class="relative mt-2">
												<input class="input pr-12 w-full border col-span-4" value="<?php echo $nm_kel; ?>" disabled>
											</div>

											<div class="relative mt-2">
												<select class="input pr-12 w-full border col-span-4" name="cbodukuh1" id="cbodukuh1" required>
																	<option value="">Pilih Dukuh/Dusun</option>
																		<?php
																		$q = mysqli_query($koneksi,"select id_dukuh, nm_dukuh FROM tbdukuh where kode='$kd_kel'");
																		while ($row1 = mysqli_fetch_array($q)){
																			$k_id           = $row1['id_dukuh'];
																			$k_opis         = $row1['nm_dukuh'];
																		?>
																	<option value='<?php echo $k_id; ?>' <?php if ($k_id == $id_dukuh1){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
																		<?php
																			}
																		?>
																	</select>
											</div>

											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<select class="input pr-12 w-full border col-span-4" name="cbort1" id="cbort1" required>
																		<?php
																		$q = mysqli_query($koneksi,"select id_rt, rt FROM tbrt");
																		while ($row1 = mysqli_fetch_array($q)){
																			$k_id           = $row1['id_rt'];
																			$k_opis         = $row1['rt'];
																		?>
																	<option value='<?php echo $k_id; ?>' <?php if ($k_id == $id_rt1){ echo 'selected'; } ?>><?php echo $k_opis; ?></option>
																		<?php
																			}
																		?>																								
																								
													</select>
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="RW" 
													id="txtrw1" name="txtrw1" autocomplete="off" required value="<?php echo $rw1; ?>">
												</div>
											</div>
										</div>
										
								</div>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				
				<table class="table table--sm" width="100%"> 
					<tr> 
						<td class="border text-center whitespace-no-wrap">
							<button type="submit" class="button bg-theme-1 text-white mt-5">
							&nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;   
							</button>
						</td>
					</tr>
				</table>
				
				
				
				
				
				
				
				
				
            </div>
</form>
            <!-- END: Content -->
        </div>
		
		
		
		
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->

<script>
   
    $("#cbodukuh").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_kec = $("#cbodukuh").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_rt.php",
            data: "kec="+id_kec,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data RT');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#cbort").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>

<script>
   
    $("#cbodukuh1").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_kec = $("#cbodukuh1").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_rt.php",
            data: "kec="+id_kec,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data RT');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#cbort1").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });
</script>

    </body>
</html>

<?php
	}
?>