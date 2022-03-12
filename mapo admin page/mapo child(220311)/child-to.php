<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_child();
$sql = "select * from partner_to
 where p_no = '{$_SESSION[p_no]}'";
$r = sqlresult($sql)[0];
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="pt_keywords" content="">
    <meta name="pt_description" content="">
    <meta name="pt_viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="pt_robots" content="index, follow" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?5616">
	<link rel="stylesheet" type="text/css" href="style.css?3361">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>order-register-1</title>


    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc l-bloc " id="bloc-0">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<h4 class="h4-bloc-2-style mg-clear float-lg-none">
					돌봄이음<br>시설예약 업체 시스템
				</h4>
			</div>
			<div class="col-sm-8 k-align-right align-self-center order-lg-1 offset-lg-0 col-lg-9">
                <a href="child-list" class="btn btn-lg btn-style float-lg-none btn-ash-grey">현황<br></a><a href="child-to" class="btn btn-lg btn-style float-lg-none  btn-cadmium-orange">운영관리</a><a href="child-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none">암호변경<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none">로그아웃<br></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<!-- bloc-23 -->
<div class="bloc l-bloc" id="bloc-23">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12">
				<h4 class="mg-md">
					운영관리
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-23 END -->
<form action="process/child" method="POST">
    <input type="hidden" name="method" value="to">
    <input type="hidden" name="p_no" value="<?=$_SESSION[p_no]?>">
    <input type="hidden" name="pt_d1_work" value="<?=$r[pt_d1_work]?>">
    <input type="hidden" name="pt_d2_work" value="<?=$r[pt_d2_work]?>">
    <input type="hidden" name="pt_d3_work" value="<?=$r[pt_d3_work]?>">
    <input type="hidden" name="pt_d4_work" value="<?=$r[pt_d4_work]?>">
    <input type="hidden" name="pt_d5_work" value="<?=$r[pt_d5_work]?>">
    <div class="bloc l-bloc" id="bloc-24">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12 col-lg-2">
				<div>
					<div class="container-div-style">
						<div class="container-div-bloc-24-style">
						</div>
						<h5 class="mg-md text-lg-end">
							날짜
						</h5>
						<h5 class="mg-md text-lg-end k-m-t-40">
							시간당 TO(명)
						</h5>
						<h5 class="mg-md text-lg-end k-m-t-40">
							운영 시작 시간
						</h5>
						<h5 class="mg-md text-lg-end k-m-t-40">
							운영 종료 시간
						</h5>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-2">
				<div class="form-group mb-3">
					<label class="form-label text-lg-center label-80-style">
						<strong>오늘</strong><br>
					</label>
					<input class="form-control text-center" name="pt_d1_date" value="<?=date("Y-m-d")?>"/>
					<div class="form-group mb-3">
						<input class="form-control k-m-t-25 text-center" name="pt_d1_to" value="<?=($r[pt_d1_to] == "")?"0":$r[pt_d1_to]?>"/>
					</div>
				</div>
                <select class="form-control k-m-t-25 text-center" name="pt_d1_start_time">
                    <option value="08:00" <?=$r[pt_d1_start_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d1_start_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d1_start_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d1_start_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d1_start_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d1_start_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d1_start_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d1_start_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d1_start_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d1_start_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d1_start_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d1_start_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d1_start_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
                <select class="form-control k-m-t-25 text-center" name="pt_d1_end_time">
                    <option value="08:00" <?=$r[pt_d1_end_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d1_end_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d1_end_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d1_end_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d1_end_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d1_end_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d1_end_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d1_end_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d1_end_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d1_end_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d1_end_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d1_end_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d1_end_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
                <button type="button" id="pt_d1_work" onclick="$('input[type=hidden][name=pt_d1_work]').val('1');$('#pt_d1_work').css('background-color','#F07B22');$('#pt_d1_no_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-lg btn-26-button-style font-size-1em btn-sq btn-cadmium-orange" value="ok">운영</button>
                <button type="button" id="pt_d1_no_work" onclick="$('input[type=hidden][name=pt_d1_work]').val('0');$('#pt_d1_no_work').css('background-color','#F07B22');$('#pt_d1_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-d btn-lg btn-26-button-style float-lg-end font-size-1em btn-sq">미운영</button>
                <?php
                if($r[pt_d1_work] == '0'){
                    echo "<script>$('input[type=hidden][name=pt_d1_work]').val('0');  $('#pt_d1_no_work').css('background-color','#F07B22');$('#pt_d1_work').css('background-color','rgba(0, 0, 0, 0.3)');</script>";
                }
                ?>
			</div>
			<div class="col-12 col-lg-2">
				<div class="form-group mb-3">
					<label class="form-label text-lg-center label-80-style">
						<strong>+1영업일</strong><br>
					</label>
					<input class="form-control text-center" name="pt_d2_date" value="<?=date("Y-m-d", strtotime("+1 day"))?>"/>
					<div class="form-group mb-3">
						<input class="form-control k-m-t-25 text-center"  name="pt_d2_to" value="<?=($r[pt_d2_to] == "")?"0":$r[pt_d2_to]?>"/>
                    </div>
				</div>
				<select class="form-control k-m-t-25 text-center" name="pt_d2_start_time">
                    <option value="08:00" <?=$r[pt_d2_start_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d2_start_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d2_start_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d2_start_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d2_start_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d2_start_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d2_start_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d2_start_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d2_start_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d2_start_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d2_start_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d2_start_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d2_start_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
                <select class="form-control k-m-t-25 text-center" name="pt_d2_end_time">
                    <option value="08:00" <?=$r[pt_d2_end_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d2_end_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d2_end_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d2_end_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d2_end_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d2_end_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d2_end_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d2_end_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d2_end_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d2_end_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d2_end_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d2_end_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d2_end_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
                <button type="button" id="pt_d2_work" onclick="$('input[type=hidden][name=pt_d2_work').val('1');$('#pt_d2_work').css('background-color','#F07B22');$('#pt_d2_no_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-lg btn-26-button-style font-size-1em btn-sq btn-cadmium-orange">운영</button>
                <button type="button" id="pt_d2_no_work" onclick="$('input[type=hidden][name=pt_d2_work').val('0');$('#pt_d2_no_work').css('background-color','#F07B22');$('#pt_d2_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-d btn-lg btn-26-button-style float-lg-end font-size-1em btn-sq">미운영</button>
                <?php
                if($r[pt_d2_work] == '0'){
                    echo "<script>$('input[type=hidden][name=pt_d2_work').val('0');$('#pt_d2_no_work').css('background-color','#F07B22');$('#pt_d2_work').css('background-color','rgba(0, 0, 0, 0.3)');</script>";
                }
                ?>
			</div>
			<div class="col-12 col-lg-2">
				<div class="form-group mb-3">
					<label class="form-label text-lg-center label-80-style">
						<strong>+2 영업일</strong><br>
					</label>
					<input class="form-control text-center" name="pt_d3_date" value="<?=date("Y-m-d", strtotime("+2 day"))?>"/>
					<div class="form-group mb-3">
                        <input class="form-control k-m-t-25 text-center"  name="pt_d3_to"  value="<?=($r[pt_d3_to] == "")?"0":$r[pt_d3_to]?>"/>
					</div>
				</div>
                <select class="form-control k-m-t-25 text-center" name="pt_d3_start_time">
                    <option value="08:00" <?=$r[pt_d3_start_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d3_start_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d3_start_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d3_start_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d3_start_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d3_start_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d3_start_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d3_start_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d3_start_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d3_start_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d3_start_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d3_start_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d3_start_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
                <select class="form-control k-m-t-25 text-center" name="pt_d3_end_time">
                    <option value="08:00" <?=$r[pt_d3_end_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d3_end_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d3_end_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d3_end_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d3_end_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d3_end_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d3_end_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d3_end_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d3_end_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d3_end_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d3_end_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d3_end_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d3_end_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
                <button type="button" id="pt_d3_work" onclick="$('input[type=hidden][name=pt_d3_work').val('1');$('#pt_d3_work').css('background-color','#F07B22');$('#pt_d3_no_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-lg btn-26-button-style font-size-1em btn-sq btn-cadmium-orange">운영</button>
                <button type="button" id="pt_d3_no_work" onclick="$('input[type=hidden][name=pt_d3_work').val('0');$('#pt_d3_no_work').css('background-color','#F07B22');$('#pt_d3_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-d btn-lg btn-26-button-style float-lg-end font-size-1em btn-sq">미운영</button>
                <?php
                if($r[pt_d3_work] == '0'){
                    echo "<script>$('input[type=hidden][name=pt_d3_work').val('0');$('#pt_d3_no_work').css('background-color','#F07B22');$('#pt_d3_work').css('background-color','rgba(0, 0, 0, 0.3)');</script>";
                }
                ?>
			</div>
			<div class="col-12 col-lg-2">
				<div class="form-group mb-3">
					<label class="form-label text-lg-center label-80-style">
						<strong>+3 영업일</strong><br>
					</label>
					<input class="form-control text-center" name="pt_d4_date" value="<?=date("Y-m-d", strtotime("+3 day"))?>"/>
					<div class="form-group mb-3">
                        <input class="form-control k-m-t-25 text-center"  name="pt_d4_to"  value="<?=($r[pt_d4_to] == "")?"0":$r[pt_d4_to]?>"/>
					</div>
				</div>
                <select class="form-control k-m-t-25 text-center" name="pt_d4_start_time">
                    <option value="08:00" <?=$r[pt_d4_start_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d4_start_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d4_start_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d4_start_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d4_start_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d4_start_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d4_start_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d4_start_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d4_start_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d4_start_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d4_start_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d4_start_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d4_start_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
                <select class="form-control k-m-t-25 text-center" name="pt_d4_end_time">
                    <option value="08:00" <?=$r[pt_d4_end_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d4_end_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d4_end_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d4_end_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d4_end_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d4_end_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d4_end_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d4_end_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d4_end_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d4_end_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d4_end_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d4_end_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d4_end_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
                <button type="button" id="pt_d4_work" onclick="$('input[type=hidden][name=pt_d4_work').val('1');$('#pt_d4_work').css('background-color','#F07B22');$('#pt_d4_no_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-lg btn-26-button-style font-size-1em btn-sq btn-cadmium-orange">운영</button>
                <button type="button" id="pt_d4_no_work" onclick="$('input[type=hidden][name=pt_d4_work').val('0');$('#pt_d4_no_work').css('background-color','#F07B22');$('#pt_d4_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-d btn-lg btn-26-button-style float-lg-end font-size-1em btn-sq">미운영</button>
                <?php
                if($r[pt_d4_work] == '0'){
                    echo "<script>$('input[type=hidden][name=pt_d4_work').val('0');$('#pt_d4_no_work').css('background-color','#F07B22');$('#pt_d4_work').css('background-color','rgba(0, 0, 0, 0.3)');</script>";
                }
                ?>
			</div>
			<div class="col-12 col-lg-2">
				<div class="form-group mb-3">
					<label class="form-label text-lg-center label-80-style">
						<strong>+4 영업일</strong><br>
					</label>
					<input class="form-control text-center" name="pt_d5_date" value="<?=date("Y-m-d", strtotime("+4 day"))?>"/>
					<div class="form-group mb-3">
                        <input class="form-control k-m-t-25 text-center"  name="pt_d5_to"  value="<?=($r[pt_d5_to] == "")?"0":$r[pt_d5_to]?>"/>
					</div>
				</div>
                <select class="form-control k-m-t-25 text-center" name="pt_d5_start_time">
                    <option value="08:00" <?=$r[pt_d5_start_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d5_start_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d5_start_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d5_start_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d5_start_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d5_start_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d5_start_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d5_start_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d5_start_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d5_start_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d5_start_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d5_start_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d5_start_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
                <select class="form-control k-m-t-25 text-center" name="pt_d5_end_time">
                    <option value="08:00" <?=$r[pt_d5_end_time]=="08:00:00"?"selected":""?>>08:00</option>
                    <option value="09:00" <?=$r[pt_d5_end_time]=="09:00:00"?"selected":""?>>09:00</option>
                    <option value="10:00" <?=$r[pt_d5_end_time]=="10:00:00"?"selected":""?>>10:00</option>
                    <option value="11:00" <?=$r[pt_d5_end_time]=="11:00:00"?"selected":""?>>11:00</option>
                    <option value="12:00" <?=$r[pt_d5_end_time]=="12:00:00"?"selected":""?>>12:00</option>
                    <option value="13:00" <?=$r[pt_d5_end_time]=="13:00:00"?"selected":""?>>13:00</option>
                    <option value="14:00" <?=$r[pt_d5_end_time]=="14:00:00"?"selected":""?>>14:00</option>
                    <option value="15:00" <?=$r[pt_d5_end_time]=="15:00:00"?"selected":""?>>15:00</option>
                    <option value="16:00" <?=$r[pt_d5_end_time]=="16:00:00"?"selected":""?>>16:00</option>
                    <option value="17:00" <?=$r[pt_d5_end_time]=="17:00:00"?"selected":""?>>17:00</option>
                    <option value="18:00" <?=$r[pt_d5_end_time]=="18:00:00"?"selected":""?>>18:00</option>
                    <option value="19:00" <?=$r[pt_d5_end_time]=="19:00:00"?"selected":""?>>19:00</option>
                    <option value="20:00" <?=$r[pt_d5_end_time]=="20:00:00"?"selected":""?>>20:00</option>
                </select>
				<div class="divider-h">
					<span class="divider"></span>
				</div>
                <button type="button" id="pt_d5_work" onclick="$('input[type=hidden][name=pt_d5_work').val('1');$('#pt_d5_work').css('background-color','#F07B22');$('#pt_d5_no_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-lg btn-26-button-style font-size-1em btn-sq btn-cadmium-orange">운영</button>
                <button type="button" id="pt_d5_no_work" onclick="$('input[type=hidden][name=pt_d5_work').val('0');$('#pt_d5_no_work').css('background-color','#F07B22');$('#pt_d5_work').css('background-color','rgba(0, 0, 0, 0.3)');" class="btn btn-d btn-lg btn-26-button-style float-lg-end font-size-1em btn-sq">미운영</button>
                <?php
                if($r[pt_d5_work] == '0'){
                    echo "<script>$('input[type=hidden][name=pt_d2_work').val('0');$('#pt_d5_no_work').css('background-color','#F07B22');$('#pt_d5_work').css('background-color','rgba(0, 0, 0, 0.3)');</script>";
                }
                ?>
			</div>
		</div>
	</div>
</div>
<!-- bloc-24 END -->

<!-- bloc-28 -->
<div class="bloc l-bloc" id="bloc-28">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col">
				<input type="submit" class="btn btn-d btn-lg btn-26-style" name=req value="영업정책 변경">
			</div>
		</div>
	</div>
</div>
<!-- bloc-28 END -->
</form>
<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
<!-- ScrollToTop Button END-->


<!-- bloc-84 -->
<div class="bloc l-bloc" id="bloc-84">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12 col-sm-4 col-lg-12">
				<h4 class="mg-md text-center text-sm-start text-lg-center h4-style">
					Copyright @마포구고용복지지원센터 2021.
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-84 END -->

</div>
<!-- Main container END -->
    


<!-- Additional JS -->
<script src="./js/bootstrap.bundle.min.js?2501"></script>
<script src="./js/blocs.min.js?4747"></script>
<script src="./js/lazysizes.min.js" defer></script><!-- Additional JS END -->



</body>
</html>
