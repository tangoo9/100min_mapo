<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../../src/method_config.php';
session_chk();
//주문리스트 처리
if($_POST[method] == 'list'){
    $o_no = $_POST[o_no];
    $m_no = $_POST[m_no];
    if($_POST[req] == "취소" && $o_no != ""){
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
            echo "<meta http-equiv='refresh' content='0; url=../admin-list-detail?o_no={$o_no}'>";
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
        echo $u1_state;
        echo $u2_state;
        sqlresult("insert into member {$u2_state}");
        sqlresult("insert into order_info {$u1_state}");
        $search_member = "select m_no from member where m_tel = '{$_POST[m_tel]}'";
        $m_no = sqlresult($search_member)[0][m_no];
        $search_order = "select o_no from order_info where o_order_date = '{$_POST[o_order_date]}' and o_regat = '{$_POST[o_regat]}' and o_cmt = '{$_POST[o_cmt]}' and m_no is null";
        $o_no = sqlresult($search_order)[0][o_no];
        sqlresult("update order_info set m_no = '{$m_no}' where o_no = '{$o_no}'");
        echo '<script type = "text/javascript">alert("주문이 정상 등록되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-register-confirm?o_no={$o_no}'>";
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
            echo "<meta http-equiv='refresh' content='0; url=../admin-list-detail?o_no={$o_no}'>";
        }
    }
}
//담당자배정
elseif($_POST[method] == 'assign'){
    $o_no = $_POST[o_no];
    $m_no = $_POST[m_no];
    if($_POST[req] == "배정" && $o_no != ""){
        sqlresult("update order_info set p_no = '{$_POST[p_no]}' where o_no = '{$o_no}'");
        echo '<script type = "text/javascript">alert("담당이 배정되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-assign'>";
    }
    else{
        echo '<script type = "text/javascript">alert("잘못된 정보 입니다. 다시 시도해주세요.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-assign'>";
        }
    }
//활동가관련
elseif($_POST[method] == 'partner_register'){
    $p_no = $_POST[p_no];
    if($_POST[req] == "변경" && $p_no != ""){
        $u1_state = to_update_sql($_POST, "req", "p");
        sqlresult("update partner set {$u1_state} where p_no = '{$p_no}'");
        echo '<script type = "text/javascript">alert("활동가 정보가 변경되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-manager-detail?p_no={$p_no}'>";
    }
    else{
        $u1_state = to_insert_sql($_POST, "req", "p");
        sqlresult("insert into partner {$u1_state}");
        echo '<script type = "text/javascript">alert("활동가 정보가 정상 등록 되었습니다.")</script>';
        $search = "select p_no from partner where p_id = '{$_POST[p_id]}'";
        $p_no=sqlresult($search)[0][p_no];
        echo "<meta http-equiv='refresh' content='0; url=../admin-manager-detail?p_no={$p_no}'>";
    }
}
//서비스
elseif($_POST[method] == 'partner_register_biz'){
    $p_no = $_POST[p_no];
    if($_POST[req] == "변경" && $p_no != ""){
        $u1_state = to_update_sql($_POST, "req", "p");
        sqlresult("update partner set {$u1_state} where p_no = '{$p_no}'");
        echo '<script type = "text/javascript">alert("서비스 기업 정보가 변경되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-service-assign?p_no={$p_no}'>";
    }
    else{
        $_POST[p_biz_check] = "업체";
        $_POST[p_biz_service] = "돌봄";
        $_POST[p_biz_service_detail] = "아동";
        $u1_state = to_insert_sql($_POST, "req", "p");
        sqlresult("insert into partner {$u1_state}");
        echo "insert into partner {$u1_state}";
        echo '<script type = "text/javascript">alert("서비스 기업 정보가 정상 등록 되었습니다.")</script>';
        $search = "select p_no from partner where p_id = '{$_POST[p_id]}'";
        $p_no=sqlresult($search)[0][p_no];
        echo "<meta http-equiv='refresh' content='0; url=../admin-service-assign?p_no={$p_no}'>";
    }
}
//의뢰기관
elseif($_POST[method] == 'order_register'){
    $a_no = $_POST[a_no];
    if($_POST[req] == "등록/수정" && $a_no != ""){
        $u1_state = to_update_sql($_POST, "req", "a");
        sqlresult("update admin set {$u1_state} where a_no = '{$a_no}'");
        echo '<script type = "text/javascript">alert("의뢰기관 정보가 변경되었습니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=../admin-order-assign?a_no={$a_no}'>";
    }
    else{
        $_POST[a_sort] = "order";
        $_POST[a_regat] = date("Y-m-d H:i:s");
        $u1_state = to_insert_sql($_POST, "req", "a");
        sqlresult("insert into admin {$u1_state}");
        echo '<script type = "text/javascript">alert("의뢰기관 정보가 정상등록되었습니다.")</script>';
        $search = "select a_no from admin where a_id = '{$_POST[a_id]}'";
        $a_no=sqlresult($search)[0][a_no];
        echo "<meta http-equiv='refresh' content='0; url=../admin-order-assign?a_no={$a_no}'>";
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
    echo "<meta http-equiv='refresh' content='0; url=/admin/index'>";
}
}
