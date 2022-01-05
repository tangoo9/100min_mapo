<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>돌봄이음</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-join-input.css">
    <script src="/src/jquery.js"></script>
    <script>
        function sms(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'get', phone : $('#m_tel').val() },
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
</head>
<body>
    <main>
        <h1>회원가입</h1>
        <form id="signUpForm" action="/api/app_process" method="post">
            <div class="form_container">
                <input type="hidden" name="method" value="join">
                <!-- 임시로 method get / 수정필요 -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">이메일</span>
                    <input name="m_id" type="email" placeholder="이메일을 입력해 주세요." 
                                aria-label="id" class="form-control" required >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">패스워드</span>
                    <input name="m_pw" type="password" placeholder="패스워드를 입력해 주세요." 
                                aria-label="password" class="form-control" required >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">이름</span>
                    <input name="m_name"  type="text" placeholder="이름을 입력해 주세요." 
                                aria-label="name" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">주소</span>
                    <input class="form-control addrBtn" type="button" onclick="sample3_execDaumPostcode()" value="주소 검색하기">
                    <div id="wrap" style="display:none;border:1px solid;width:80%;height:10rem;margin:5px 0;position:relative">
                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                    </div>
                </div>
                <div class="addr_box">
                    <input class="form-control" type="hidden" id="sample3_postcode" placeholder="우편번호">
                    <input class="form-control" type="text" id="sample3_address" placeholder="주소">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" id="sample3_detailAddress" placeholder="상세주소">
                        <input class="form-control" type="text" id="sample3_extraAddress" placeholder="">
                    </div>
                <!-- <input name="m_addr" type="text" placeholder="주소를 입력해 주세요." 
                    aria-label="name" class="form-control" required> -->
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">성별</span>
                    <select name="m_sex" class="form-select">
                        <option selected disabled value="">성별을 선택하세요.</option>
                        <option value="여">여</option>
                        <option value="남">남</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">전화번호</span>
                    <input name="m_tel" id="m_tel" type="tel" placeholder="전화번호를 입력해 주세요."
                                aria-label="tel" class="form-control" required>
                    <button class="btn btn-primary buttonStyle_inner" onclick="sms();" type="button">인증</button>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">인증</span>
                    <input type="text" id ='code' name="m_pw_confirm" placeholder="인증번호를 입력해 주세요." 
                                aria-label="code" class="form-control" required>
                    <button class="btn btn-primary buttonStyle_inner" onclick="check();" type="button">확인</button>
                </div>
                <div class="selectBox">
                    <button class="selectButton btn_div1" type="button" onclick="window.history.back()">
                        <p>이전</p>
                    </button>
                    <button class="selectButton btn_div2" type="submit">
                        <p>회원가입</p>
                    </button>
                </div>
            </div>
        </form>

    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="js/daum_api.js"></script>
</body>
</html>