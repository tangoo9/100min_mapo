<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../../src/method_config.php';
session_check_child();
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
            echo "<meta http-equiv='refresh' content='0; url=../child-list-detail?o_no={$o_no}'>";
        }
    }
}
//주문생성 처리
elseif($_POST[method] == 'register'){
    $o_no = $_POST[o_no];
    $m_no = $_POST[m_no];
    if($_POST[req] == "등록/변경" && $o_no == ""){
        $_POST[m_regat] = $_POST[o_regat];
        $u1_state = to_insert_sql($_POST, "req", "o");
        $u2_state = to_insert_sql($_POST, "req", "m");
        sqlresult("insert into member {$u2_state}");
        sqlresult("insert into order_info {$u1_state}");
        $search_member = "select m_no from member where m_tel = '{$_POST[m_tel]}'";
        $m_no = sqlresult($search_member)[0][m_no];
        $search_order = "select o_no from order_info where o_order_date = '{$_POST[o_order_date]}' and o_regat = '{$_POST[o_regat]}' and o_cmt = '{$_POST[o_cmt]}' and m_no is null";
        $o_no = sqlresult($search_order)[0][o_no];
        sqlresult("update order_info set m_no = '{$m_no}' and a_no = '{$_SESSION[a_no]}' where o_no = '{$o_no}'");
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
$pw = "select p_pw from partner where p_no = '{$_SESSION[p_no]}'";
$pw = sqlresult($pw)[0][p_pw];
if($pw == $_POST[pw_ori] && $_POST[pw_new] == $_POST[pw_new_confirm]){
    $u = "update partner set p_pw = '{$_POST[pw_new]}' where p_no = '{$_SESSION[p_no]}'";
    sqlresult($u);
    session_destroy();
    echo "<script>alert('패스워드 변경으로 로그아웃 되었습니다.');</script>";
    echo "<script>opener.location.href = '/child/index';window.close();</script>";
    }
}
elseif($_POST[method] == 'to'){
    sqlresult("DELETE FROM `mcc`.`partner_to` WHERE `p_no` = {$_SESSION[p_no]}");
    $_POST[pt_regat] = date("Y-m-d H:i:s");
    $u1_state = to_insert_sql_exp($_POST, "req", "p");
    sqlresult("insert into partner_to {$u1_state}");
    echo '<script type = "text/javascript">alert("운영정책이 정상 변경되었습니다.")</script> ';
    echo "<meta http-equiv='refresh' content='0; url=../child-to'>";
}
