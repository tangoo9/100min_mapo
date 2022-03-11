<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_chk();
$sql = "select * from admin where a_no = '{$_GET[a_no]}' and a_sort = 'order' order by a_regat asc";
$r = sqlresult($sql)[0];
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
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?6877">
	<link rel="stylesheet" type="text/css" href="style.css?5060">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>admin-service-assign-1</title>


    
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
					돌봄이음<br>관리자 시스템
				</h4>
			</div>
			<div class="col-sm-8 col-lg-9 k-align-right">
				<a href="admin-list" class="btn btn-d btn-lg btn-style float-lg-none width100">통합조회<br></a><a href="admin-register" class="btn btn-d btn-lg btn-style width100 ">일정등록</a><a href="admin-assign" class="btn btn-d btn-lg btn-style float-lg-none width100">돌봄배정<br></a><a href="admin-manager" class="btn btn-d btn-lg btn-style float-lg-none width100">활동가<br></a><a href="admin-service" class="btn btn-d btn-lg btn-style float-lg-none width100">서비스<br></a><a href="admin-order" class="btn btn-d btn-lg btn-style float-lg-none width100 btn-cadmium-orange">의뢰기관<br></a><a href="admin-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none width100">암호변경<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none width100">로그아웃<br></a></div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-23 -->
<div class="bloc l-bloc" id="bloc-23">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12">
				<h4 class="mg-md k-m-up-full h4-활동가-상세-정보-style">
					의뢰기관정보
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-23 END -->

<!-- bloc-24 -->
    <form method="POST" action="process/admin">
        <input type="hidden" name="a_no" value="<?=$r[a_no]?>">
        <input type="hidden" name="method" value="order_register">
<div class="bloc l-bloc" id="bloc-24">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group mb-3">
					<label class="form-label">
						의뢰기관명<br>
					</label>
					<input class="form-control" name="a_name" value="<?=$r[a_name]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						패스워드<br>
					</label>
					<input class="form-control" type="password" name="a_pw" value="<?=$r[a_pw]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						전화번호<br>
					</label>
					<input class="form-control" name="a_tel" value="<?=$r[a_tel]?>"/>
				</div>
                <div class="form-group mb-3">
                    <label class="form-label">
                        상태<br>
                    </label>
                    <select class="form-control" name="a_status">
                        <option value="대기" <?=($r[a_status] == "대기")?"selected":""?>>대기</option>
                        <option value="활성" <?=($r[a_status] == "활성")?"selected":""?>>활성</option>
                    </select>
                </div>
			</div>
			<div class="col-md-6">
				<div class="form-group mb-3">
					<label class="form-label">
						아이디
					</label>
					<input class="form-control" name="a_id" value="<?=$r[a_id]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						주소<br>
					</label>
					<input class="form-control" name="a_addr" value="<?=$r[a_addr]?>"/>
				</div>
                <div class="form-group mb-3">
                    <label class="form-label">
                        비고<br>
                    </label>
                    <input class="form-control" name="a_cmt" value="<?=$r[a_cmt]?>"/>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-24 END -->

<!-- bloc-87 -->
<div class="bloc l-bloc" id="bloc-87">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col">
                <input type="submit" class="btn btn-d btn-lg w-100" name="req" value="등록/수정"><br>
			</div>
		</div>
	</div>
</div>
    </form>
<!-- bloc-87 END -->

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
<script src="./js/bootstrap.bundle.min.js?8370"></script>
<script src="./js/blocs.min.js?7275"></script>
<script src="./js/lazysizes.min.js" defer></script><!-- Additional JS END -->


</body>
</html>
