<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include '../src/method_config.php';
$ipaddr = get_client_ip();

if (isset($_POST['a_id']) && isset($_POST['a_pw'])) {
    $id = $_POST['a_id'];    // uid, 로그인창에서 입력한 아이디 값 받기
    $pw = $_POST['a_pw'];  // upwd, 로그인창에서 입력한 비밀번호 값 받기

    $sql = "select a_no, a_name, a_pw, a_tel, a_sort, a_agency from admin where a_id = '$id' and a_sort = 'admin' and a_status = '활성' limit 1";   //DB에서 아이디값과 비밀번호가 동일한
    $result = sqlresult($sql);
    $login = date("Y-m-d H:i:s");

    if ($result[0][a_pw] == $pw) {
        $row = $result[0];
        session_start();
        $session = session_id();
        $_SESSION['ip'] = get_client_ip();
        $_SESSION['a_no'] = $row['a_no'];
        $_SESSION['a_id'] = $id;
        $_SESSION['a_name'] = $row['a_name'];
        $_SESSION['a_tel'] = $row['a_tel'];
        $_SESSION['a_sort'] = $row['a_sort'];
        $_SESSION['a_agency'] = $row['a_agency'];

/*        $session_chk = "INSERT INTO session(m_no, s_id, s_login_time, s_session, s_ip) VALUES ('{$_SESSION['mno']}', '{$id}' ,'{$login}', '{$session}', '{$_SESSION['ip']}')";
        sqlresult($session_chk);*/

        echo "<meta http-equiv='refresh' content = '0; url=admin-list'>";
    } else {
        echo '<script type = "text/javascript">alert("아이디나 패스워드를 잘못입력하셨습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    }
} else {
    echo '<script type = "text/javascript">alert("잘못된 접근입니다.")</script> ';
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}

