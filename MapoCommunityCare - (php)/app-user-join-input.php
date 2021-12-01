<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <input type="hidden" name="method" value="join">
            <!-- 임시로 method get / 수정필요 -->
            <div class="inputBox">
                <input name="m_id" class="inputStyle" type="email" placeholder="이메일을 입력해 주세요." required>
            </div>
            <div class="inputBox">
                <input name="m_pw" class="inputStyle" type="password" placeholder="패스워드를 입력해 주세요" required>
            </div>
            <div class="inputBox">
                <input name="m_name" class="inputStyle" type="text" placeholder="이름을 입력해 주세요." required>
            </div>
            <div class="inputBox">
                <input name="m_addr" class="inputStyle " type="text" placeholder="주소를 입력해 주세요." required>
            </div>
            <div class="inputBox">
                <select name="m_sex" class="inputStyle ">
                    <option value="여">여</option>
                    <option value="남">남</option>
                </select>
            </div>
            <div class="inputBox">
                <input name="m_tel" id="m_tel" class="inputStyle ver2" type="tel" placeholder="전화번호를 입력해 주세요." required>
                <button class="btn btn-primary buttonStyle_inner" onclick="sms();" type="button">인증</button>
            </div>
            <div class="inputBox">
                <input class="inputStyle ver2" type="text" id ='code' name="m_pw_confirm" placeholder="인증번호를 입력해 주세요." required>
                <button class="btn btn-primary buttonStyle_inner" onclick="check();" type="button">확인</button>
            </div>
            <button class="btn btn-primary signUpButton" type="submit" >
                <p>회원가입</p>
            </button>
            <button class="btn btn-primary returnButton" type ="button" onclick="location.href='app-user-join-accept'">
                <p>이전</p>
            </button>
        </form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>