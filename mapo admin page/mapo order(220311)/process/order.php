<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../../src/method_config.php';
session_check_order();
//주문리스트 처리
if($_POST[method] == 'list'){
    $o_no = $_POST[o_no];
    $m_no = $_POST[m_no];
    if($_POST[req] == "취소완료" && $o_no != ""){
        $u  = "update order_info set o_status = '취소', o_cmt = '{$_POST[o_cmt1]} - {$_POST[o_cmt2]}' where o_no = '{$o_no}'";
        sqlresult($u);
        echo '<script type = "text/javascript">alert("주문이 정상 취소 되었습니다.")</script> ';
        echo "<script>opener.document.location.reload();window.close();</script>";
    }
    else{
        if($o_no != "" && $m_no != ""){
            $u1_state = to_update_sql($_POST, "req", "o");
            $u2_state = to_update_sql($_POST, "req", "m");
            $u1 = "update order_info set {$u1_state} where o_no = '{$o_no}'";
            $u2 = "update member set {$u2_state} where m_no = '{$m_no}'";
            sqlresult($u1);
            sqlresult($u2);
            echo '<script type = "text/javascript">alert("주문이 정상 변경되었습니다.")</script> ';
            echo "<meta http-equiv='refresh' content='0; url=../order-list-detail?o_no={$o_no}'>";
        }
    }
}
//주문생성 처리
elseif($_POST[method] == 'register'){
    $o_no = $_POST[o_no];
    $m_no = $_POST[m_no];
    if($_POST[req] == "등록/변경" && $o_no == ""){
        $err = "select m_no from member where m_tel = '{$_POST[m_tel]}'";
        $errr = sqlrow($err);
        if($errr >= '1'){
            $m_no = sqlresult($err)[0][m_no];
            sqlresult("update member set m_name = '{$_POST[m_name]}', m_addr = '{$_POST[m_addr]}' where m_no = '{$_POST[m_no]}'");
        }
        else{
            $u2_state = to_insert_sql($_POST, "req", "m");
            echo $u2_state;
            sqlresult("insert into member {$u2_state}");
            $search_member = "select m_no from member where m_tel = '{$_POST[m_tel]}'";
            $m_no = sqlresult($search_member)[0][m_no];
        }
        $_POST[m_regat] = $_POST[o_regat];
        $u1_state = to_insert_sql($_POST, "req", "o");
        sqlresult("insert into order_info {$u1_state}");
        $search_order = "select o_no from order_info where o_order_date = '{$_POST[o_order_date]}' and o_regat = '{$_POST[o_regat]}' and o_cmt = '{$_POST[o_cmt]}' and m_no is null";
        $o_no = sqlresult($search_order)[0][o_no];
        sqlresult("update order_info set o_start_time = '{$_POST[o_order_date]}', m_no = '{$m_no}', a_no = '{$_SESSION[a_no]}' where o_no = '{$o_no}'");
        echo '<script type = "text/javascript">alert("주문이 정상 등록되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../order-list-detail?o_no={$o_no}'>";
    }
    else{
        if($o_no != "" && $m_no != ""){
            $u1_state = to_update_sql($_POST, "req", "o");
            $u2_state = to_update_sql($_POST, "req", "m");
            $u1 = "update order_info set {$u1_state} where o_no = '{$o_no}'";
            $u2 = "update member set {$u2_state} where m_no = '{$m_no}'";
            sqlresult($u1);
            sqlresult($u2);
            echo '<script type = "text/javascript">alert("주문이 정상 변경되었습니다.")</script> ';
            echo "<meta http-equiv='refresh' content='0; url=../order-list-detail?o_no={$o_no}'>";
        }
    }
}
//패스워드
elseif($_POST[method] == 'pw'){
$pw = "select a_pw from admin where a_no = '{$_SESSION[a_no]}'";
$pw = sqlresult($pw)[0][a_pw];
if($pw == $_POST[pw_ori] && $_POST[pw_new] == $_POST[pw_new_confirm]){
    $u = "update admin set a_pw = '{$_POST[pw_new]}' where a_no = '{$_SESSION[a_no]}'";
    sqlresult($u);
    session_destroy();
    echo "<script>alert('패스워드 변경으로 로그아웃 되었습니다.');</script>";
    echo "<script>opener.location.href = '/order/index';window.close();</script>";
    }
}
elseif($_POST[method] == 'join'){
    if(strpos(decrypt($_SESSION[auth]), "success_") !== false && $_POST[a_pw] == $_POST[a_pw_confirm]){
        $a_tel = explode('_',decrypt($_SESSION[auth]))[2];
        $in = "insert into admin(a_id, a_pw, a_name, a_addr, a_tel, a_regat, a_status) values ('{$_POST[a_id]}','{$_POST[a_pw]}','{$_POST[a_name]}','{$_POST[a_addr]}','{$a_tel}','{$now}','대기')";
        sqlresult($in);
        echo "<script>alert('정상 가입처리 되었습니다. 관리자의 승인 후 사용 가능합니다.');</script>";
        echo "<script>location.href = '/order/index';</script>";
    }
    else{
        echo "<script>alert('잘못된 정보 입니다. 다시 가입 진행 요청드립니다.');</script>";
        echo "<script>location.href = '/order/order-join';</script>";
    }
}
