<?php
session_start();
IF(isset($_SESSION['m_no']) && isset($_SESSION['m_id']) && isset($_SESSION['m_name']) && isset($_SESSION['m_tel']) && isset($_SESSION['m_addr'])){
    echo "<meta http-equiv='refresh' content = '0; url=/app/app-user-main'>";
}
else{
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
    <title>돌봄이음</title>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-login.css">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script>function kakao(){
            alert("에러\r\n카카오 기업 가입이 필요합니다.");
        }</script>
</head>
<body>
    <div class="title_area">
        <h3>마포형 커뮤니티케어 일자리플랫폼</h3>
        <h1>돌봄이음</h1>
    </div>
<main>
    <!-- <span class="animate__animated animate__fadeIn titleText">안녕하세요!</span> -->
    <!-- 임시  -->
    <!-- <button type="button" onclick="location.href='app-user-main'">
    테스트용 임시버튼
    </button> -->
    <!-- 임시 end -->
    <div class="loginContainer">
        <form class="form" action="/api/app_login" method="post">
            <div class="input_box id_box">
                <div class="icon">
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.427 5.63836L10.0945 8.34814C9.46488 8.84764 8.57903 8.84764 7.94941 8.34814L4.58882 5.63836" stroke="#7B6F72" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6816 14.75C14.9627 14.7563 16.5 12.8822 16.5 10.5788V5.42751C16.5 3.12412 14.9627 1.25 12.6816 1.25H5.31835C3.03734 1.25 1.5 3.12412 1.5 5.42751V10.5788C1.5 12.8822 3.03734 14.7563 5.31835 14.75H12.6816Z" stroke="#7B6F72" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input name="m_id" class="input" type="email" placeholder="이메일을 입력해 주세요." autocomplete="off" required>
            </div>
            <div class="input_box pw_box">
                <div class="icon">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3175 6.08585V4.4756C10.3175 2.59085 8.78903 1.06235 6.90428 1.06235C5.01953 1.0541 3.48503 2.5751 3.47678 4.4606V4.4756V6.08585" stroke="#7B6F72" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76239 14.9372H4.03164C2.46114 14.9372 1.18764 13.6645 1.18764 12.0932V8.87645C1.18764 7.3052 2.46114 6.03245 4.03164 6.03245H9.76239C11.3329 6.03245 12.6064 7.3052 12.6064 8.87645V12.0932C12.6064 13.6645 11.3329 14.9372 9.76239 14.9372Z" stroke="#7B6F72" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.89717 9.65203V11.3178" stroke="#7B6F72" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input name="m_pw" class="input" type="password" placeholder="패스워드를 입력해 주세요." required>
            </div>
            <button class="button loginButton" type="submit" >
                <label>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.88609 0H14.9254C17.445 0 19.5 2 19.5 4.44V15.56C19.5 18.01 17.445 20 14.9047 20H9.87576C7.35611 20 5.29083 18.01 5.29083 15.57V10.77H11.6932L10.041 12.37C9.73119 12.67 9.73119 13.16 10.041 13.46C10.1959 13.61 10.4024 13.68 10.6089 13.68C10.8051 13.68 11.0117 13.61 11.1666 13.46L14.1819 10.55C14.3368 10.41 14.4194 10.21 14.4194 10C14.4194 9.8 14.3368 9.6 14.1819 9.46L11.1666 6.55C10.8568 6.25 10.3508 6.25 10.041 6.55C9.73119 6.85 9.73119 7.34 10.041 7.64L11.6932 9.23H5.29083V4.45C5.29083 2 7.35611 0 9.88609 0ZM0.5 9.9999C0.5 9.5799 0.855229 9.2299 1.2815 9.2299H5.29052V10.7699H1.2815C0.855229 10.7699 0.5 10.4299 0.5 9.9999Z" fill="white"/>
                    </svg>
                </label>
                <span>로그인</span>
            </button>
        </form>
        <button class="button loginButton_kakao" type="button" onclick="kakao();">카카오톡 로그인</button>
        <button class="button signUpButton" onclick="location.href='app-user-join-accept'">
            회원가입
        </button>
        <button class="button aroundButton" type="button" onclick="location.href='app-user-main'">둘러보기</button>
    </div>
</main>
</body>
</html>
<?php
}
?>