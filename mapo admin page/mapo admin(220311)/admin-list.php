<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_chk();
$search = ($_GET[o_start_date] !="")?" date(o_order_date) >= date('{$_GET[o_start_date]}') and":"";
$search .= ($_GET[o_end_date] !="")?" date(o_order_date) <= date('{$_GET[o_end_date]}') and":"";
$search .= ($_GET[o_status] !="")?" o_status = '{$_GET[o_status]}' and":"";
$search .= ($_GET[o_service] !="")?" o_service = '{$_GET[o_service]}' and":"";
$search .= ($_GET[o_find] !="")?" concat(IFNULL(m_tel, ''), IFNULL(m_name, ''), IFNULL(m_addr,''), IFNULL(o_no, ''), IFNULL(o_id,''), IFNULL(o_service,''), IFNULL(o_service_detail,''), IFNULL(o_cmt,'')) like '%{$_GET[o_find]}%' and":"";
$search = substr($search , 0, -4);
$search = ($search != "")?"where".$search:"";
$sql = "select * from order_info o 
left join member m on m.m_no = o.m_no 
left join member_child mc on mc.mc_no = o.mc_no
{$search} order by o_order_date asc";
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
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?7555">
	<link rel="stylesheet" type="text/css" href="style.css?5173">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src=/src/jquery.js></script>
    <link rel="stylesheet" type="text/css" href="/src/datetimepicker.css">
    <script src=/src/datetimepicker.js></script>
    <title>admin-list</title>


    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<!-- Main container -->
<div class="page-container">
    
<!-- bloc-2 -->
<div class="bloc l-bloc" id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<h4 class="mg-md">
					돌봄이음<br> 관리자 시스템
				</h4>
			</div>
			<div class="col-sm-8 col-lg-9 k-align-right">
				<a href="admin-list" class="btn btn-lg btn-style width100 btn-cadmium-orange">통합조회<br></a><a href="admin-register" class="btn btn-d btn-lg btn-style float-lg-none width100">일정등록</a><a href="admin-assign" class="btn btn-d btn-lg btn-style float-lg-none width100">돌봄배정<br></a><a href="admin-manager" class="btn btn-d btn-lg btn-style float-lg-none width100">활동가<br></a><a href="admin-service" class="btn btn-d btn-lg btn-style float-lg-none width100">서비스<br></a><a href="admin-order" class="btn btn-d btn-lg btn-style float-lg-none width100">의뢰기관<br></a><a href="admin-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none width100">암호변경<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none width100">로그아웃<br></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-3 -->
    <form method="get">
<div class="bloc l-bloc" id="bloc-3">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12">
				<div class="row row-style">
					<div class="col-lg-2">
						<div class="form-group mb-3">
							<label class="form-label">
								시작일<br>
							</label>
							<input class="form-control" id="o_start_date" name="o_start_date" value="<?=$_GET[o_start_date]?>" autocomplete="off">

						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group mb-3">
							<label class="form-label">
								종료일<br>
							</label>
							<input class="form-control"id="o_end_date" name="o_end_date"  value="<?=$_GET[o_end_date]?>" autocomplete="off">
						</div>
					</div>
                    <script>
                        $.datetimepicker.setLocale('ko');
                        $('#o_start_date').datetimepicker({
                            // timepicker:false,
                            timepicker:false,
                            format:'Y-m-d'
                        });
                        $('#o_end_date').datetimepicker({
                            timepicker:false,
                            format:'Y-m-d'
                        });
                    </script>
					<div class="col-lg-2">
						<div class="form-group mb-3">
							<label class="form-label">
								상태별<br>
							</label>
							<div class="form-group mb-3">
                                <select class="form-control" name="o_status">
                                    <option>선택해 주세요.</option>
                                    <option value="일정요청" <?=($_GET[o_status]=="일정요청")?"selected":""?>>일정요청</option>
                                    <option value="진행예정" <?=($_GET[o_status]=="진행예정")?"selected":""?>>진행예정</option>
                                    <option value="제공완료" <?=($_GET[o_status]=="제공완료")?"selected":""?>>제공완료</option>
                                    <option value="취소" <?=($_GET[o_status]=="취소")?"selected":""?>>취소</option>
                                </select>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group mb-3">
							<label class="form-label">
								서비스별<br>
							</label>
                            <select class="form-control" name="o_service">
                                <option>선택해 주세요.</option>
                                <option value="아동 돌봄" <?=($_GET[o_service]=="아동 돌봄")?"selected":""?>>아동 돌봄</option>
                                <option value="성인 돌봄" <?=($_GET[o_service]=="성인 돌봄")?"selected":""?>>성인 돌봄</option>
                            </select>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group mb-3">
							<label class="form-label">
								문자열 검색<br>
							</label>
							<input class="form-control" name="o_find"  value="<?=$_GET[o_find]?>"/>
						</div>
					</div>
					<div class="col-lg-2">
						<button type="submit" class="btn btn-d btn-lg btn-padding k-margin-main">검색</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    </form>
<!-- bloc-3 END -->

<!-- bloc-4 -->
    <div class="bloc l-bloc none" id="bloc-4">
        <div class="container bloc-lg-table">
            <div class="row">
                <div class="col-12 col-lg-2">
                    <label class="form-label label-style text-lg-start">
                        예약일
                    </label>
                </div>
                <div class="col-12 col-lg-1">
                    <label class="form-label text-lg-end">
                        이름<br>
                    </label>
                </div>
                <div class="col-12 col-lg-2">
                    <label class="form-label text-lg-center">
                        전화번호
                    </label>
                </div>
                <div class="col-12 col-lg-3">
                    <label class="form-label text-lg-center">
                        주소<br>
                    </label>
                </div>
                <div class="col-12 col-lg-1">
                    <label class="form-label text-lg-center">
                        서비스
                    </label>
                </div>
                <div class="col-12 col-lg-2">
                    <label class="form-label text-lg-center">
                        비고
                    </label>
                </div>
                <div class="col-12 col-lg-1">
                    <label class="form-label text-lg-center">
                        기능
                    </label>
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
<!-- bloc-4 END -->
    <?php
    for($i =0; $i < $rr; $i++){
?>
<form method="GET" action="admin-list-detail">
    <input type="hidden" name="o_no" value="<?=$r[$i][o_no]?>">
        <div class="bloc l-bloc none">
            <div class="container bloc-lg-table">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <label class="form-label label-style text-lg-start">
                            <?php
                            if($r[$i][o_end_time] == ""){
                                echo $r[$i][o_start_time];
                            }
                            else{?>
                            <?=date("Y-m-d",strtotime($r[$i][o_start_time]))?>
                            <?=($r[$i][o_end_time] != "")?" ~ <br>".date("Y-m-d",strtotime($r[$i][o_end_time])):""?>
                            <?php
                            }
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
                        <label class="form-label text-lg-center">
                            <?=$r[$i][m_tel]?>
                            <?=($r[$i][mc_tel] != "")?"<br>({$r[$i][mc_tel]})":""?>
                        </label>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label text-lg-left">
                            &nbsp;<?=$r[$i][m_addr]?>
                        </label>
                    </div>
                    <div class="col-12 col-lg-1">
                        <label class="form-label text-lg-left">
                            &nbsp;<?=$r[$i][o_service]?><br>
                            &nbsp;<?=$r[$i][o_service_detail]?>
                        </label>
                    </div>
                    <div class="col-12 col-lg-2">
                        <label class="form-label text-lg-center">
                            <?=$r[$i][o_cmt]?>
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
			<div class="col-12 col-sm-4 col-lg-12 ">
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
<script src="./js/bootstrap.bundle.min.js?8370"></script>
<script src="./js/blocs.min.js?7275"></script>
<script src="./js/lazysizes.min.js" defer></script><!-- Additional JS END -->
</body>
</html>
