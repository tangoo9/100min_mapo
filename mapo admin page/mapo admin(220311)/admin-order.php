<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_chk();
$sql = "select * from admin where a_sort = 'order' order by a_regat asc";
$r = sqlresult($sql);
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
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?5467">
	<link rel="stylesheet" type="text/css" href="style.css?8380">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>admin-service-1</title>


    
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
<div class="bloc l-bloc " id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<h4 class="mg-md">
					돌봄이음<br>관리자 시스템
				</h4>
			</div>
			<div class="col-sm-8 col-lg-9 k-align-right">
				<a href="admin-list" class="btn btn-d btn-lg btn-style float-lg-none width100">통합조회<br></a><a href="admin-register" class="btn btn-d btn-lg btn-style width100 ">일정등록</a><a href="admin-assign" class="btn btn-d btn-lg btn-style float-lg-none width100">돌봄배정<br></a><a href="admin-manager" class="btn btn-d btn-lg btn-style float-lg-none width100">활동가<br></a><a href="admin-service" class="btn btn-d btn-lg btn-style float-lg-none width100">서비스<br></a><a href="admin-order" class="btn btn-d btn-lg btn-style float-lg-none width100 btn-cadmium-orange">의뢰기관<br></a><a href="admin-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none width100">암호변경<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none width100">로그아웃<br></a>		</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-3 -->
<div class="bloc l-bloc" id="bloc-3">
	<div class="container bloc-lg ">
		<div class="row">
			<div class="col-12">
				<div class="row row-style">
					<div class="col-lg-10">
					</div>
					<div class="col-lg-2">
						<a href="admin-order-assign" class="btn btn-d btn-lg btn-padding k-margin-main k-m-l-10">기관 등록</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->

<!-- bloc-4 -->
<div class="bloc l-bloc none" id="bloc-4">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12 col-lg-2">
				<label class="form-label label-style text-lg-start">
					의뢰기관
				</label>
			</div>
			<div class="col-12 col-lg-2">
				<label class="form-label label-상세서비스-style text-lg-start">
					아이디<br>
				</label>
			</div>
			<div class="col-12 col-lg-2">
				<label class="form-label text-lg-center">
					전화번호
				</label>
			</div>
			<div class="col-12 col-lg-3">
				<label class="form-label text-lg-center">
					주소
				</label>
			</div>
			<div class="col-12 col-lg-2">
				<label class="form-label text-lg-center">
					상태
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

<!-- bloc-69 -->
    <?php
    for($i=0; $i < $rr; $i++){
        ?>
        <form method="GET" action="admin-manager-detail">
            <input type="hidden" name="a_no" value="<?=$r[$i][a_no]?>">
            <div class="bloc l-bloc none" id="bloc-69">
                <div class="container bloc-lg">
                    <div class="row k-m-l-100">
                        <div class="col-12 col-lg-2">
                            <label class="form-label label-style text-lg-start">
                                <?=$r[$i][a_name]?><br>
                            </label>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label class="form-label text-lg-end">
                                <?=$r[$i][a_id]?><br>
                            </label>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label class="form-label text-lg-center">
                                <?=$r[$i][a_tel]?><br>
                            </label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label class="form-label text-lg-center">
                                <?=$r[$i][a_addr]?><br>
                            </label>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label class="form-label text-lg-center">
                                <?=$r[$i][a_status]?><br>
                            </label>
                        </div>
                        <div class="col-12 col-lg-1">
                            <a href="admin-order-assign?a_no=<?=$r[$i][a_no]?>" class="btn btn-d btn-button-padding btn-lg k-t-s-s">수정<br></a>
                        </div>
                    </div>
                    <div class="row k-m-l-l k-m-u--25">
                        <div class="col">
                            <div class="divider-h k-list-line divider-padding divider-login-padding ㅏ k-m-t-25">
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

<!-- bloc-69 END -->

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
