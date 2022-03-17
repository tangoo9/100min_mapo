<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_child();
$sql = "select * from order_info o 
left join member m on m.m_no = o.m_no 
left join member_child mc on mc.mc_no = o.mc_no
where o.p_no = '{$_SESSION[p_no]}' group by o_no order by o_order_date asc";
$r =sqlresult($sql);
$rr = sqlrow($sql);
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="robots" content="index, follow" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?645">
	<link rel="stylesheet" type="text/css" href="style.css?5455">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>child-list</title>


    
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
				<a href="child-list" class="btn btn-lg btn-style float-lg-none btn-cadmium-orange">현황<br></a><!--<a href="child-to" class="btn btn-lg btn-style float-lg-none btn-ash-grey">운영관리</a-->
                <a href="child-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none">암호변경<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none">로그아웃<br></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<!-- bloc-4 -->
<div class="bloc none l-bloc" id="bloc-4">
	<div class="container bloc-lg-table">
		<div class="row">
			<div class="col-12 col-lg-2">
				<label class="form-label label-style text-lg-start">
					예약일<br>
				</label>
			</div>
			<div class="col-12 col-lg-1">
				<label class="form-label text-lg-left">
					이름<br>
				</label>
			</div>
			<div class="col-12 col-lg-2">
				<label class="form-label text-lg-left">
					전화번호
				</label>
			</div>
            <div class="col-12 col-lg-1">
                <label class="form-label text-lg-left">
                    서비스
                </label>
            </div>
			<div class="col-12 col-lg-5">
				<label class="form-label text-lg-left">
					비고
				</label>
			</div>
			<div class="col-12 col-lg-1">
				<label class="form-label text-lg-left">
					기능
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="divider-h k-list-line divider-padding">
					<span class="divider"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->
    <?php
    for($i =0; $i < $rr; $i++){
        ?>
        <form method="GET" action="child-list-detail">
            <input type="hidden" name="o_no" value="<?=$r[$i][o_no]?>">
            <div class="bloc l-bloc none">
                <div class="container bloc-lg-table">
                    <div class="row">
                        <div class="col-12 col-lg-2">
                                <label class="form-label label-style text-lg-start">
                                    <?=date("Y-m-d",strtotime($r[$i][o_start_time]))?>

                                    <!-- <?=($r[$i][o_end_time] != "")?" ~ <br>".date("Y-m-d",strtotime($r[$i][o_end_time])):""?> -->
                                    <?=
                                    ($r[$i][o_end_time] != "")?
                                    (($r[$i][o_service_detail]=="시간제")?
                                    " ~ <br>".date("Y-m-d",strtotime($r[$i][o_end_time])):
                                    ""):
                                    ""
                                    ?>
                                </label>
                        </div>
                        <div class="col-12 col-lg-1">
                            <label class="form-label text-lg-left">
                                <?=$r[$i][m_name]?>
                                <?=($r[$i][mc_name] != "")?"<br>({$r[$i][mc_name]})":""?>
                            </label>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label class="form-label text-lg-left">
                                <?=$r[$i][m_tel]?>
                                <?=($r[$i][mc_tel] != "")?"<br>({$r[$i][mc_tel]})":""?>
                            </label>
                        </div>
                        <div class="col-12 col-lg-1">
                            <label class="form-label text-lg-left">
                                &nbsp;<?=$r[$i][o_service]?><br>
                                &nbsp;<?=$r[$i][o_service_detail]?>                            </label>
                        </div>
                        <div class="col-12 col-lg-5">
                            <label class="form-label text-lg-left">
                                관계:<?=$r[$i][o_relation]?>/건강:<?=$r[$i][o_health]?> <?=$r[$i][o_health_etc_comment]?>/<?=$r[$i][o_condition]?> <?=$r[$i][o_condition_etc_comment]?>/<?=$r[$i][o_back_home]?> <?=$r[$i][o_back_home_etc_comment]?>/긴급연락:<?=$r[$i][o_emergency]?>/스낵:<?=$r[$i][o_snack]?> <?=$r[$i][o_snack_info]?>/<?=$r[o_text_area]?>

                            </label>
                        </div>
                        <div class="col-12 col-lg-1">
                            <input type="submit" class="btn btn-d btn-button-padding btn-lg k-t-s-s" value="<?=$r[$i][o_status]?>">
                        </div>
                    </div>
                    <div class="row k-m-l-l">
                        <div class="col">
                            <div class="divider-h k-list-line divider-padding">
                                <span class="divider"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
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
