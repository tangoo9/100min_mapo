<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include '../src/method_config.php';
$ipaddr = get_client_ip();

if (isset($_POST['a_id']) && isset($_POST['a_pw'])) {
    $id = $_POST['a_id'];    // uid, 로그인창에서 입력한 아이디 값 받기
    $pw = $_POST['a_pw'];  // upwd, 로그인창에서 입력한 비밀번호 값 받기

    $sql = "select p_no, p_name, p_pw, p_tel, p_biz_service, p_biz_service_detail,p_biz_check from partner where p_id = '$id' and p_biz_check = '업체' limit 1";   //DB에서 아이디값과 비밀번호가 동일한
    $result = sqlresult($sql);
    $login = date("Y-m-d H:i:s");

    if ($result[0][p_pw] == $pw) {
        $row = $result[0];
        session_start();
        $session = session_id();
        $_SESSION['ip'] = get_client_ip();
        $_SESSION['p_no'] = $row['p_no'];
        $_SESSION['p_id'] = $id;
        $_SESSION['p_name'] = $row['p_name'];
        $_SESSION['p_tel'] = $row['p_tel'];
        $_SESSION['p_biz_service'] = $row['p_biz_service'];
        $_SESSION['p_biz_service_detail'] = $row['p_biz_service_detail'];
        $_SESSION['p_biz_check'] = $row['p_biz_check'];
/*        $session_chk = "INSERT INTO session(m_no, s_id, s_login_time, s_session, s_ip) VALUES ('{$_SESSION['mno']}', '{$id}' ,'{$login}', '{$session}', '{$_SESSION['ip']}')";
        sqlresult($session_chk);*/

        echo "<meta http-equiv='refresh' content = '0; url=child-list'>";
    } else {
        echo '<script type = "text/javascript">alert("아이디나 패스워드를 잘못입력하셨습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    }
} else {
    echo '<script type = "text/javascript">alert("잘못된 접근입니다.")</script> ';
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}

