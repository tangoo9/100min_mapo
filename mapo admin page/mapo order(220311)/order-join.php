<?php
session_start();
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
    <script src=/src/jquery.js></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?2362">
	<link rel="stylesheet" type="text/css" href="style.css?5779">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>admin-passwd</title>
<script>
    function sms(){
        var request = $.ajax({
            type: "POST",
            url: "/api/order_join",
            data: { method : 'get', phone : $('#a_tel').val() },
            timeout: 10000,
        });
        request.done(function( msg ) {
            alert(msg);
        });
    }
    function check(){
        var request = $.ajax({
            type: "POST",
            url: "/api/order_join",
            data: { method : 'check', code : $('#code').val() },
            timeout: 10000,
        });
        request.done(function( msg ) {
            alert(msg);
        });
    }
</script>

    
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
					돌봄이음<br>
                    의뢰기관 회원가입
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-1 -->
    <form method="POST" action="process/order">
        <input type="hidden" name="method" value="join">
<div class="bloc none l-bloc" id="bloc-1">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 offset-lg-3 auto col-lg-4">
				<form id="form_30439" data-form-type="blocs-form" novalidate data-success-msg="Your message has been sent." data-fail-msg="Sorry it seems that our mail server is not responding, Sorry for the inconvenience!">
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							아이디<br>
						</label>
						<input id="name_2693_6324_30439" class="form-control" name="a_id" required />
					</div>
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							패스워드
						</label>
						<input id="email_2693_6324_30439" class="form-control" type="password" name="a_pw" required />
					</div>
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							패스워드확인
						</label>
						<input class="form-control" id="input_1884_30439" type="password" name="a_pw_confirm" required />
					</div>
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							기관
						</label>
						<input class="form-control" id="input_367_30439" name="a_name" required/>
					</div>
                    <div class="form-group mb-3">
                        <label class="form-label mg-clear">
                            주소
                        </label>
                        <input class="form-control" id="input_367_30439" name="a_addr" required/>
                    </div>
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							전화번호
						</label>
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group mb-3">
								<input class="form-control field-bloc-1-style" name="a_tel" id="a_tel" required/>
							</div>
						</div>
						<div class="col">
						    <a href="#" onclick="sms();" class="btn btn-d btn-lg btn-4-padding w-100">인증</a>
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="form-label mg-clear">
							인증번호입력
						</label>
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group mb-3 container-div-style">
									<input class="form-control" id ='code' required/>
								</div>
							</div>
							<div class="col">
                                <a href="#" onclick="check();" class="btn btn-d btn-lg btn-4-padding w-100">확인</a>
							</div>
						</div>
					</div> 
					<button class="bloc-button btn btn-d btn-lg w-100 k-m-t" type="submit">
						회원 가입
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
<!-- Main container END -->
    


<!-- Additional JS --><script src="./js/jquery.min.js"></script>


<script src="./js/bootstrap.bundle.min.js?1715"></script>
<script src="./js/blocs.min.js?5082"></script>
<script src="./js/jqBootstrapValidation.js"></script>
<script src="./js/formHandler.js?7247"></script>
<script src="./js/lazysizes.min.js" defer></script>
<!-- Additional JS END -->


</body>
</html>
