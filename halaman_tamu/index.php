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
	
	$kd_prop=substr($kd_kel,0,2);
	$kd_kab=substr($kd_kel,0,5);
	$kd_kec=substr($kd_kel,0,8);
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kec'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kec=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_prop'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_prop=$tm_cari['nama'];

	$cari_kd=mysqli_query($koneksi,"SELECT nama FROM wilayah_2020 WHERE kode='$kd_kab'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nm_kab=$tm_cari['nama'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT * FROM tbprofil where kode='$kd_kel'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$kd_pos=$tm_cari['kd_pos'];
	$luas=$tm_cari['luas'];
	$file_peta=$tm_cari['file_peta'];
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

		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script>
		var chart; 
		$(document).ready(function() {
			  chart = new Highcharts.Chart(
			  {
				  
				 chart: {
					renderTo: 'mygraph',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				 },   
				 title: {
					text: 'Grafik Jumlah Penduduk Laki-Laki dan Perempuan '
				 },
				 tooltip: {
					formatter: function() {
						return '<b>'+
						this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
					}
				 },
				 
				
				 plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: 'green',
							formatter: function() 
							{
								return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
							}
						}
					}
				 },
       
					series: [{
					type: 'pie',
					name: 'Browser share',
					data: [
					<?php
					    include "connection.php";
						$query = mysqli_query($con,"SELECT jk from view_penduduk1 where kode='$id'");
					 
						while ($row = mysqli_fetch_array($query)) {
							$browsername = $row['jk'];
						 
							$data = mysqli_fetch_array(mysqli_query($con,"SELECT total from view_penduduk1 where jk='$browsername' and kode='$id'"));
							$jumlah = $data['total'];
							?>
							[ 
								'<?php echo $browsername ?>', <?php echo $jumlah; ?>
							],
							<?php
						}
						?>
			 
					]
				}]
			  });
		});	
	</script>
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->

        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_dashboard.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.php" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="index.php" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                            <i data-feather="search" class="search__icon"></i> 
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
                  
                    </div>
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
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->

                        <!-- END: General Report -->
                        <!-- BEGIN: Sales Report -->

                        <!-- END: Sales Report -->
                        <!-- BEGIN: Weekly Top Seller -->

                        <!-- END: Weekly Top Seller -->
                        <!-- BEGIN: Sales Report -->
                        <!-- END: Sales Report -->

                        <!-- BEGIN: Official Store -->
                        <div class="col-span-12 xl:col-span-7 mt-6">
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
								<center>
									<img id="avatar" src="<?php echo $file_peta; ?>" width="550px" />
								</center>
                            </div>
                        </div>
                        <!-- END: Official Store -->
                        <!-- BEGIN: Weekly Best Sellers -->
                        <div class="col-span-12 xl:col-span-5 mt-6">
                            <div class="mt-5">
                                    <div class="box p-5 mt-5">
                                        <div class="flex items-center border-b pb-5">
                                            <div class="">
                                                <div class="text-gray-600">Propinsi</div>
                                                <div><?php echo $nm_prop; ?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b py-5">
                                            <div class="">
                                                <div class="text-gray-600">Kabupaten/Kota</div>
                                                <div><?php echo $nm_kab; ?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b py-5">
                                            <div class="">
                                                <div class="text-gray-600">Kecamatan</div>
                                                <div><?php echo $nm_kec; ?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b py-5">
                                            <div class="">
                                                <div class="text-gray-600">Kelurahan/Desa</div>
                                                <div><?php echo $nm_kel; ?></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b py-5">
                                            <div class="">
                                                <div class="text-gray-600">Luas Wilayah</div>
                                                <div><?php echo number_format($luas,2) ?> ha</div>
                                            </div>
                                        </div>
									</div>
                            </div>
                        </div>
                        <!-- END: Weekly Best Sellers -->



                        <!-- BEGIN: General Report -->

                        <!-- END: General Report -->
                        <!-- BEGIN: Weekly Top Seller -->

                        <!-- END: Weekly Top Seller -->
                    </div>
                    <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                        <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                            <!-- BEGIN: Transactions -->
                            
                            <!-- END: Transactions -->
                            <!-- BEGIN: Recent Activities -->

                            <!-- END: Recent Activities -->
                            <!-- BEGIN: Important Notes -->



                            <!-- END: Important Notes -->
                            <!-- BEGIN: Schedules -->

                            <!-- END: Schedules -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
		<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>

<?php
	}
?>