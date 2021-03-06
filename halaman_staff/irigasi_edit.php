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
	
	$id=$_GET['kd'];
	
	$cari_kd=mysqli_query($koneksi,"SELECT nama_irigasi, tipe, pengelola, luas_prencana, luas_potensial, 
tipe_bgn, jml_bgn_utama, jln_inspeksi, rencana_produksi, 
rencana_intensitas_tanam, 
panjang_1, panjang_2, panjang_3, panjang_4, panjang_5, 
jml_1, jml_2, jml_3, jml_4, jml_5, jml_6, jml_7, jml_8, 
jml_9, jml_10, jml_11, jml_12, jml_13, jml_14, jml_15, jml_16, 
bangun_mulai, bangun_selesai, bangun_biaya, bangun_konstruksi, 
bangun_konsultan, bangun_pengawas, bangun_kontraktor, bangun_sumber, 
p3a_1, p3a_2, p3a_3, p3a_4, p3a_5, p3a_6, p3a_7, p3a_8, p3a_9, 
					file_photo, 
DATE_FORMAT(bangun_mulai,'%d/%m/%Y') AS tgl, DATE_FORMAT(bangun_selesai,'%d/%m/%Y') AS tgl1 
					FROM tbirigasi where id='$id'");
	$tm_cari=mysqli_fetch_array($cari_kd);
	$nama_irigasi=$tm_cari['nama_irigasi'];
	$data1=$tm_cari['tipe'];
	$data2=$tm_cari['pengelola'];
	$data3=$tm_cari['luas_prencana'];
	$data4=$tm_cari['luas_potensial'];
	$data5=$tm_cari['tipe_bgn'];
	$data6=$tm_cari['jml_bgn_utama'];
	$data7=$tm_cari['jln_inspeksi'];
	$data8=$tm_cari['rencana_produksi'];
	$data9=$tm_cari['rencana_intensitas_tanam'];
	$data10=$tm_cari['panjang_1'];
	$data11=$tm_cari['panjang_2'];
	$data12=$tm_cari['panjang_3'];
	$data13=$tm_cari['panjang_4'];
	$data14=$tm_cari['panjang_5'];
	$data15=$tm_cari['jml_1'];
	$data16=$tm_cari['jml_2'];
	$data17=$tm_cari['jml_3'];
	$data18=$tm_cari['jml_4'];
	$data19=$tm_cari['jml_5'];
	$data20=$tm_cari['jml_6'];
	$data21=$tm_cari['jml_7'];
	$data22=$tm_cari['jml_8'];
	$data23=$tm_cari['jml_9'];
	$data24=$tm_cari['jml_10'];
	$data25=$tm_cari['jml_11'];
	$data26=$tm_cari['jml_12'];
	$data27=$tm_cari['jml_13'];
	$data28=$tm_cari['jml_14'];
	$data29=$tm_cari['jml_15'];
	$data30=$tm_cari['jml_16'];
	$data31=$tm_cari['tgl'];
	$data32=$tm_cari['tgl1'];
	$data33=$tm_cari['bangun_biaya'];
	$data34=$tm_cari['bangun_konstruksi'];
	$data35=$tm_cari['bangun_konsultan'];
	$data36=$tm_cari['bangun_pengawas'];
	$data37=$tm_cari['bangun_kontraktor'];
	$data38=$tm_cari['bangun_sumber'];
	$data39=$tm_cari['p3a_1'];
	$data40=$tm_cari['p3a_2'];
	$data41=$tm_cari['p3a_3'];
	$data42=$tm_cari['p3a_4'];
	$data43=$tm_cari['p3a_5'];
	$data44=$tm_cari['p3a_6'];
	$data45=$tm_cari['p3a_7'];
	$data46=$tm_cari['p3a_8'];
	$data47=$tm_cari['p3a_9'];
	$file_photo=$tm_cari['file_photo'];
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

		<script>
		function newPopup(url) {
			popupWindow = window.open(
				url,'popUpWindow','height=600,width=700,left=10,top=10,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
		}
		</script>

    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-dashboard.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-file-manager.html" class="menu">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-point-of-sale.html" class="menu">
                        <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                        <div class="menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-chat.html" class="menu">
                        <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-post.html" class="menu">
                        <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="menu__title"> Post </div>
                    </a>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-crud-data-list.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Data List </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Form </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="users"></i> </div>
                        <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-users-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-users-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-users-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Layout 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-wizard-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-wizard-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-wizard-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-blog-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-blog-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-blog-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-pricing-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-pricing-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-invoice-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-invoice-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-faq-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-faq-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-faq-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login-login.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Login </div>
                            </a>
                        </li>
                        <li>
                            <a href="login-register.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Register </div>
                            </a>
                        </li>
                        <li>
                            <a href="main-error-page.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Error Page </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-update-profile.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Update profile </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-change-password.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Change Password </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Grid <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-regular-table.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Regular Table</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-datatable.html" class="menu">
                                        <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="menu__title">Datatable</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-accordion.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Accordion </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-button.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Button </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-modal.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Modal </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-alert.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Alert </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-progress-bar.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Progress Bar </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-tooltip.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Tooltip </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-dropdown.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Dropdown </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-toast.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Toast </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-typography.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Typography </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-icon.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Icon </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-loading-icon.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Loading Icon </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                        <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="side-menu-regular-form.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Regular Form </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-datepicker.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Datepicker </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-select2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Select2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-file-upload.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> File Upload </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-wysiwyg-editor.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Wysiwyg Editor </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-validation.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Validation </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-chart.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Chart </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-slider.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-image-zoom.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Image Zoom </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->

<?php include "menu_irigasi.php"; ?>

            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Home</a> 
					<i data-feather="chevron-right" class="breadcrumb__icon"></i> 
					<a href="" class="">Potensi Desa</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="" class="">Sumber Daya Air</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="" class="">Irigasi</a>
					<i data-feather="chevron-right" class="breadcrumb__icon"></i>
					<a href="" class="breadcrumb--active">Edit Data</a> </div>
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
                
								<form class="form-horizontal" enctype="multipart/form-data" action="irigasi_edit_proses.php" method="post">
<input type="hidden" name="txtid" value="<?php echo $id; ?>"/>
		
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Profil</b></label>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Nama Irigasi" 
													id="txtnm" name="txtnm" autocomplete="off" value="<?php echo $nama_irigasi; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tipe Irigasi" 
													id="txttipe" name="txttipe" autocomplete="off" value="<?php echo $data1; ?>">
												</div>
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pengelola" 
												id="txtpengelola" name="txtpengelola" autocomplete="off" value="<?php echo $data2; ?>">
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Luas Prencana (Ha)" 
													id="txtluasp" name="txtluasp" autocomplete="off" value="<?php echo $data3; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Luas Potensial (Ha)" 
													id="txtluaspot" name="txtluaspot" autocomplete="off" value="<?php echo $data4; ?>">
												</div>
											</div>
											<div class="relative mt-2">
												<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tipe Bangunan Utama" 
												id="txttipebgn" name="txttipebgn" autocomplete="off" value="<?php echo $data5; ?>">
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah Bangunan" 
													id="txtjmlbgn" name="txtjmlbgn" autocomplete="off" value="<?php echo $data6; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jalan Inspeksi (km)" 
													id="txtjalan" name="txtjalan" autocomplete="off" value="<?php echo $data7; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Rencana Produksi (ton)" 
													id="txtrencanap" name="txtrencanap" autocomplete="off" value="<?php echo $data8; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Rencana Intensitas Tanam (Ha)" 
													id="txtrencanar" name="txtrencanar" autocomplete="off" value="<?php echo $data9; ?>">
												</div>
											</div>
											<div class="relative mt-2">
												<label><b>Upload Photo Irigasi</b>&nbsp;
													<a href="javascript:void(0);" onClick="newPopup('peta_detail.php?img=<?php echo $file_photo; ?>');"><?php echo $file_photo; ?></a>												
												</label>
												<input type="file" id="gambar" name="gambar" class="input w-full border mt-2" />
												<label>*Tipe File PNG,JPEG, Ukuran Maksimum 5Mb</label>
											</div>
                                    </div>							
								</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Panjang Saluran (m)</b></label>
											<div class="sm:grid grid-cols-5 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Induk" 
													id="txtpanjang1" name="txtpanjang1" autocomplete="off" value="<?php echo $data10; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Sekunder" 
													id="txtpanjang2" name="txtpanjang2" autocomplete="off" value="<?php echo $data11; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pembuang" 
													id="txtpanjang3" name="txtpanjang3" autocomplete="off" value="<?php echo $data12; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Suplesi" 
													id="txtpanjang4" name="txtpanjang4" autocomplete="off" value="<?php echo $data13; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Gendong" 
													id="txtpanjang5" name="txtpanjang5" autocomplete="off" value="<?php echo $data14; ?>">
												</div>
											</div>
                                    </div>							
								</div>
                            </div>
                        </div>

                    </div>
                </div>				


                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Jumlah Bangunan (buah)</b></label>
											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Bagi" 
													id="txtjml1" name="txtjml1" autocomplete="off" value="<?php echo $data15; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Bagi Sadap" 
													id="txtjml2" name="txtjml2" autocomplete="off" value="<?php echo $data16; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Sadap/oncoran" 
													id="txtjml3" name="txtjml3" autocomplete="off" value="<?php echo $data17; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Ulur" 
													id="txtjml4" name="txtjml4" autocomplete="off" value="<?php echo $data18; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Talang Jembatan/Talang" 
													id="txtjml5" name="txtjml5" autocomplete="off" value="<?php echo $data19; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Siphon" 
													id="txtjml6" name="txtjml6" autocomplete="off" value="<?php echo $data20; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Silang" 
													id="txtjml7" name="txtjml7" autocomplete="off" value="<?php echo $data21; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Gorong-gorong" 
													id="txtjml8" name="txtjml8" autocomplete="off" value="<?php echo $data22; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jembatan" 
													id="txtjml9" name="txtjml9" autocomplete="off" value="<?php echo $data23; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Tenun" 
													id="txtjml10" name="txtjml10" autocomplete="off" value="<?php echo $data24; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Got Milling" 
													id="txtjml11" name="txtjml11" autocomplete="off" value="<?php echo $data25; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Suplesi" 
													id="txtjml12" name="txtjml12" autocomplete="off" value="<?php echo $data26; ?>">
												</div>
											</div>

											<div class="sm:grid grid-cols-4 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pelimpah Sampling" 
													id="txtjml13" name="txtjml13" autocomplete="off" value="<?php echo $data27; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Kantong Lumpur" 
													id="txtjml14" name="txtjml14" autocomplete="off" value="<?php echo $data28; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pembilas" 
													id="txtjml15" name="txtjml15" autocomplete="off" value="<?php echo $data29; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Pelengkap" 
													id="txtjml16" name="txtjml16" autocomplete="off" value="<?php echo $data30; ?>">
												</div>
											</div>
                                    </div>							
								</div>
                            </div>
                        </div>

                    </div>
                </div> 

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Pembangunan Awal</b></label>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Mulai" 
													id="txtpemb1" name="txtpemb1" autocomplete="off" value="<?php echo $data31; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Selesai" 
													id="txtpemb2" name="txtpemb2" autocomplete="off" value="<?php echo $data32; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Biaya" 
													id="txtpemb3" name="txtpemb3" autocomplete="off" value="<?php echo $data33; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Konstruksi Agensi" 
													id="txtpemb4" name="txtpemb4" autocomplete="off" value="<?php echo $data34; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Konsultan Perencanaan" 
													id="txtpemb5" name="txtpemb5" autocomplete="off" value="<?php echo $data35; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Konsultan Pengawas" 
													id="txtpemb6" name="txtpemb6" autocomplete="off" value="<?php echo $data36; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-2 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Kontraktor" 
													id="txtpemb7" name="txtpemb7" autocomplete="off" value="<?php echo $data37; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Sumber Dana" 
													id="txtpemb8" name="txtpemb8" autocomplete="off" value="<?php echo $data38; ?>">
												</div>
											</div>
                                    </div>							
								</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">

                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
									<div class="mt-3">
										<label><b>Perkumpulan Petani Pemakai Air (P3A)</b></label>
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah P3A (buah)" 
													id="txtp3a-1" name="txtp3a-1" autocomplete="off" value="<?php echo $data39; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Luas Daerah Kerja P3A (Ha)" 
													id="txtp3a-2" name="txtp3a-2" autocomplete="off" value="<?php echo $data40; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah Anggota P3A (Petani)" 
													id="txtp3a-3" name="txtp3a-3" autocomplete="off" value="<?php echo $data41; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah P3A aktif (buah)" 
													id="txtp3a-4" name="txtp3a-4" autocomplete="off" value="<?php echo $data42; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Luas Daerah Kerja P3A aktif (Ha)" 
													id="txtp3a-5" name="txtp3a-5" autocomplete="off" value="<?php echo $data43; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah Gabungan P3A tingkat primer (buah)" 
													id="txtp3a-6" name="txtp3a-6" autocomplete="off" value="<?php echo $data44; ?>">
												</div>
											</div>
											<div class="sm:grid grid-cols-3 gap-2">
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Jumlah Gabungan P3A tingkat sekunder (buah)" 
													id="txtp3a-7" name="txtp3a-7" autocomplete="off" value="<?php echo $data45; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Luas Pengelolaan OP ke Petani (Ha)" 
													id="txtp3a-8" name="txtp3a-8" autocomplete="off" value="<?php echo $data46; ?>">
												</div>
												<div class="relative mt-2">
													<input type="text" class="input pr-12 w-full border col-span-4" placeholder="Realisasi Pengumpulan IPAIR (Rp.)" 
													id="txtp3a-9" name="txtp3a-9" autocomplete="off" value="<?php echo $data47; ?>">
												</div>
											</div>
                                    </div>	
								</div>
                            </div>
                        </div>

                    </div>
                </div>

									<div class="mt-3 center">
										<center>
										<button type="submit" class="button bg-theme-1 text-white mt-5">   &nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;   </button>
										</center>
                                    </div>																		
</form>
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