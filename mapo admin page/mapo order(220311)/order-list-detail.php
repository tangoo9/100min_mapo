<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_order();
$sql = "select * from order_info o 
left join member m on m.m_no = o.m_no 
where o_no = '{$_GET[o_no]}' and a_no = '$_SESSION[a_no]' order by o_order_date asc";
$r = sqlresult($sql)[0];
if(sqlrow($sql) == '0'){
    echo '<script type = "text/javascript">alert("잘못된 접근입니다.")</script> ';
    echo "<meta http-equiv='refresh' content='0; url=/order/order-list'>";
    exit;
}
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
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?9936">
	<link rel="stylesheet" type="text/css" href="style.css?5390">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>order-register-1</title>
    <script src="./js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/src/datetimepicker.css">
    <script src=/src/datetimepicker.js></script>

    
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
<div class="bloc l-bloc" id="bloc-0">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<h4 class="h4-bloc-2-style mg-clear float-lg-none">
					돌봄이음<br>의뢰기관 시스템
				</h4>
			</div>
			<div class="col-sm-8 k-align-right align-self-center order-lg-1 offset-lg-0 col-lg-9">
                <a href="order-list" class="btn btn-lg btn-style float-lg-none btn-cadmium-orange">등록리스트<br></a><a href="order-register" class="btn btn-lg btn-style float-lg-none btn-d">일정등록</a><a href="order-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none">암호변경<br></a><a href="index.html" class="btn btn-d btn-lg btn-style float-lg-none">로그아웃<br></a>
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
                    주문 상세 내역 - <?=$r[m_name]?>님 (주문번호 : <?=$r[o_no]?>)
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-23 END -->
    <form method="POST" action="process/order">
        <input type="hidden" name="o_no" value="<?=$r[o_no]?>">
        <input type="hidden" name="m_no" value="<?=$r[m_no]?>">
        <input type="hidden" name="method" value="list">
        <div class="bloc l-bloc" id="bloc-24">
            <div class="container bloc-lg">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                예약일<br>
                            </label>
                            <input class="form-control" id="datetimepicker" name="o_order_date" value="<?=$r[o_order_date]?>"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                이름<br>
                            </label>
                            <input class="form-control" value="<?=$r[m_name]?>" readonly/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                주소<br>
                            </label>
                            <input class="form-control" value="<?=$r[m_addr]?>" readonly/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label label-bloc-24-style">
                                상세서비스<br>
                            </label>
                            <select class="form-control" name="o_service_detail">
                                <option value="아동" <?=($r[o_service_detail]=="아동")?"selected":""?>>아동</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label label-bloc-24-style">
                                유료여부<br>
                            </label>
                            <select class="form-control" name="o_pay">
                                <option value="예" <?=($r[o_pay]=="예")?"selected":""?>>예</option>
                                <option value="아니오" <?=($r[o_pay]=="아니오")?"selected":""?>>아니오</option>
                            </select>
                            <input type="submit" class="btn btn-d btn-lg w-100 k-m-u-30" name="req" value="변경">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                등록일
                            </label>
                            <input class="form-control" value="<?=$r[o_regat]?>" readonly/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label label-bloc-24-style">
                                전화번호<br>
                            </label>
                            <input class="form-control" name="m_tel" value="<?=$r[m_tel]?>"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                서비스<br>
                            </label>
                            <select class="form-control" name="o_service">
                                <option value="돌봄" <?=($r[o_service]=="돌봄")?"selected":""?>>돌봄</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                비고<br>
                            </label>
                            <input class="form-control" name="o_cmt" value="<?=$r[o_cmt]?>"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                서비스상태<br>
                            </label>
                            <select class="form-control" name="o_status">
                                <option value="일정요청" <?=($r[o_status]=="일정요청")?"selected":""?>>일정요청</option>
                                <option value="진행예정" <?=($r[o_status]=="진행예정")?"selected":""?>>진행예정</option>
                                <option value="제공완료" <?=($r[o_status]=="제공완료")?"selected":""?>>제공완료</option>
                                <option value="취소" <?=($r[o_status]=="취소")?"selected":""?>>취소</option>
                            </select>

                            <a href="order-list-detail-cancel?o_no=<?=$r[o_no]?>" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=600'); return false;" class="btn btn-d btn-lg w-100 k-m-u-30">취소</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="./js/bootstrap.bundle.min.js?1715"></script>
<script src="./js/blocs.min.js?5082"></script>
<script src="./js/lazysizes.min.js" defer></script><!-- Additional JS END -->
<script src="./js/datetimepicker.options.js"></script>

</body>
</html>
