<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_order();
$sql = "select * from order_info o 
left join member m on m.m_no = o.m_no 
where o_no = '{$_GET[o_no]}' and a_no = '$_SESSION[a_no]' order by o_order_date asc";
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

    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?4711">
    <link rel="stylesheet" type="text/css" href="style.css?1231">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>admin-passwd</title>



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
                <div class="col">
                    <h4 class="mg-md text-lg-center">
                        주문 취소 - <?=$r[m_name]?>님 (주문번호 : <?=$r[o_no]?>)
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-2 END -->

    <!-- bloc-1 -->
    <div class="bloc none l-bloc" id="bloc-1">
        <div class="container bloc-lg-table">
            <div class="row voffset ">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 offset-lg-3 auto col-lg-4">
                    <form method="POST" action="process/order">
                        <input type="hidden" name="o_no" value="<?=$r[o_no]?>">
                        <input type="hidden" name="method" value="list">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                취소사유<br>
                            </label>
                            <div class="form-group mb-3">
                                <select class="form-control" name="o_cmt1">
                                    <option value="주문자 취소">
                                        주문자 취소
                                    </option>
                                    <option value="조건 불일치">
                                        조건 불일치
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                기타 비고 입력
                            </label>
                            <input class="form-control" type="text" name="o_cmt2" placeholder="기타 비고를 입력해주세요."/>
                        </div>
                        <input class="bloc-button btn btn-d btn-lg btn-패스워드-변경-style float-lg-none w-100 k-m-u-30" type="submit" name="req" value="취소완료">
                        <button class="bloc-button btn btn-d btn-lg btn-패스워드-변경-style w-100 k-m-u-30" onClick='opener.document.location.reload();window.close();'>
                            창닫기
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-1 END -->

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
    


<!-- Additional JS --><script src="./js/jquery.min.js"></script>


<script src="./js/bootstrap.bundle.min.js?1715"></script>
<script src="./js/blocs.min.js?5082"></script>
<script src="./js/jqBootstrapValidation.js"></script>
<script src="./js/formHandler.js?6570"></script>
<script src="./js/lazysizes.min.js" defer></script>
<!-- Additional JS END -->


</body>
</html>
