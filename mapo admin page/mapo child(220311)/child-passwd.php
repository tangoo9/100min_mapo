<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_child();
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

    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?3128">
    <link rel="stylesheet" type="text/css" href="style.css?8206">
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
                        패스워드 변경
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- bloc-2 END -->
    <form method="POST" action="process/child">
        <input type="hidden" name="method" value="pw">
        <!-- bloc-1 -->
        <div class="bloc none l-bloc" id="bloc-1">
            <div class="container bloc-lg-table">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 offset-lg-3 auto col-lg-4">
                        <div class="form-group mb-3">
                            <label class="form-label">
                                기존 패스워드<br>
                            </label>
                            <input class="form-control" required name="pw_ori"  type="password"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                새로운 패스워드
                            </label>
                            <input class="form-control" name="pw_new" type="password" required />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">
                                새로운 패스워드 확인
                            </label>
                        </div>
                        <input class="form-control" name="pw_new_confirm" type="password" required /><br>
                        <button class="bloc-button btn btn-d btn-lg w-100" type="submit">
                            패스워드 변경
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



<!-- Additional JS --><script src="./js/jquery.min.js"></script>


<script src="./js/bootstrap.bundle.min.js?8370"></script>
<script src="./js/blocs.min.js?7275"></script>
<script src="./js/jqBootstrapValidation.js"></script>
<script src="./js/formHandler.js?53"></script>
<script src="./js/lazysizes.min.js" defer></script>
<!-- Additional JS END -->


</body>
</html>
