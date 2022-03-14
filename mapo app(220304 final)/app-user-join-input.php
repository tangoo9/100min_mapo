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
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function sms(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'get', phone : $('#m_tel').val() },
                success : function(data) {
                    alert(data);
                }
            });
        }
        function check(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'check', code : $('#code').val() },
                success : function(data) {
                    alert(data);
                }
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
                <input type="hidden" name="agree" value="<?=($_GET[agree] == 'on')?"Y":"N"?>>">
                <!-- 임시로 method get / 수정필요 -->
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">이메일</span>
                    <input id="email" name="m_id" type="email" placeholder="이메일을 입력해 주세요." 
                                aria-label="id" class="form-control" autocomplete="off" required >
                </div>
                <div class="check_font" id="email_check"></div>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">비밀번호</span>
                    <input id="pwd"name="m_pw" type="password" placeholder="영문,숫자, 특수문자 포함, 8자리 이상" 
                                aria-label="password" class="form-control" required >
                </div>
                <div class="check_font" id="pwd_check"></div>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">비밀번호 재확인</span>
                    <input id="re_pwd" type="password" placeholder="비밀번호를 재확인 해 주세요." 
                                aria-label="password" class="form-control" required >
                </div>
                <div class="check_font" id="re_pwd_check"></div>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">이름</span>
                    <input id="name" name="m_name"  type="text" placeholder="이름을 입력해 주세요." 
                                aria-label="name" class="form-control" autocomplete="off" required>
                                
                </div>
                <div class="check_font" id="name_check"></div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">주소</span>
                    <input class="form-control addrBtn" type="button" onclick="sample3_execDaumPostcode()" value="주소 검색하기">
                    <div id="wrap" style="display:none;border:1px solid;width:100%;height:10rem;margin:5px 0;position:relative">
                    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                    </div>
                </div>
                <div class="addr_box">
                    <input class="form-control" type="hidden" id="sample3_postcode" placeholder="우편번호">
                    <input name="m_addr" class="form-control" type="text" id="sample3_address" placeholder="주소" required>
                    <div class="input-group mb-3">
                        <input name="m_addr_detail" class="form-control" type="text" id="sample3_detailAddress" placeholder="상세주소">
                        <input class="form-control" type="text" id="sample3_extraAddress" placeholder="" required>
                    </div>
                <!-- <input name="m_addr" type="text" placeholder="주소를 입력해 주세요." 
                    aria-label="name" class="form-control" required> -->
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">성별</span>
                    <select name="m_sex" class="form-select" required>
                        <option selected disabled value="">성별을 선택하세요.</option>
                        <option value="여">여</option>
                        <option value="남">남</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">전화번호</span>
                    <input name="m_tel" id="m_tel" type="tel" placeholder="전화번호를 입력해 주세요."
                                aria-label="tel" class="form-control" autocomplete="off" required>
                    <button class="btn btn-primary buttonStyle_inner" onclick="sms();" type="button">인증</button>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">인증</span>
                    <input type="text" id ='code' name="m_pw_confirm" placeholder="인증번호를 입력해 주세요." 
                                aria-label="code" class="form-control" autocomplete="off" required>
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
    <script>
        // 이름 정규식 blur 버전
        var reg_name = /^[가-힣]{2,6}$/;
        $("#name").blur(function() {
            if (reg_name.test($(this).val())) {
                    console.log(reg_name.test($(this).val()));
                    $("#name_check").text('');
            } else {
                $('#name_check').text('이름을 한글 2-6자 이내로 작성해주세요.');
                $('#name_check').css('color', 'red');
                $('#name').focus();
            }
        });

        // 이메일 정규식 blur 
        let reg_email =/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        $("#email").blur(function() {
            if (reg_email.test($(this).val())) {
                    console.log(reg_email.test($(this).val()));
                    $("#email_check").text('');
            } else {
                $('#email_check').text('이메일 형식에 맞게 작성해주세요.');
                $('#email_check').css('color', 'red');
                $('#email').focus();
            }
        });

        let reg_pwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
        $("#pwd").blur(function() {
            if (reg_pwd.test($(this).val())) {
                    console.log(reg_pwd.test($(this).val()));
                    $("#pwd_check").text('');
            } else {
                $('#pwd_check').text('영문,숫자, 특수문자 포함, 8자리 이상');
                $('#pwd_check').css('color', 'red');
                $('#pwd').focus();
            }
        });
        $("#re_pwd").blur(function() {
            if (($("#pwd").val()) == ($("#re_pwd").val())) {
                    console.log(reg_pwd.test($(this).val()));
                    $("#re_pwd_check").text('');
            } else {
                $('#re_pwd_check').text('비밀번호가 일치하지 않습니다.');
                $('#re_pwd_check').css('color', 'red');
            }
        });

    </script>
</body>
</html>