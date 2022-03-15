<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_start();
if($_POST[method] == 'get' && $_POST[m_no] != ''){
    $c = "select * from member_child where m_no = '{$_POST[m_no]}' and mc_show_yn = 'Y' order by mc_regat asc";
    $cr = sqlresult($c);
    $crr = sqlrow($c);
    for($i=0;$i<$crr;$i++){
        if($i==0)
            $data = "[";
        $data .= "{\"no\":\"{$cr[$i][mc_no]}\", \"name\":\"{$cr[$i][mc_name]}\",\"birth\":\"{$cr[$i][mc_birth]}\",\"sex\":\"{$cr[$i][mc_sex]}\"},";
    }
    $data = substr($data, 0, -1);
    if($crr !=0)
    $data .= "]";
    echo $data;
}
elseif($_POST[method] == 'register'){
    $birth = $_POST[select_year]."-".$_POST[select_month]."-".$_POST[select_day];
    $birth = date("Y-m-d", strtotime($birth));
    $in = "insert into member_child(mc_name, mc_birth, mc_sex, mc_tel, mc_school, mc_grade, m_no, mc_show_yn, mc_regat)
VALUES('{$_POST[name]}','{$birth}','{$_POST[sex]}','{$_POST[tel]}','{$_POST[school]}','{$_POST[grade]}','{$_SESSION[m_no]}','Y', '{$now}')";
    sqlresult($in);
    echo '<script type = "text/javascript">alert("'.$_POST[name].'님이 정상등록 되었습니다.")</script> ';
    echo "<meta http-equiv='refresh' content='0; url=/app/app-user-order-child-order-step1'>";
}
elseif($_POST[method] == 'place'){
    $c = "select * from partner where p_biz_service_detail = '아동'";
    $cr = sqlresult($c);
    $crr = sqlrow($c);
    for($i=0;$i<$crr;$i++){
        if($i==0)
            $data = "[";
        $data .= "{\"no\":\"{$cr[$i][mc_no]}\", \"name\":\"{$cr[$i][mc_name]}\",\"birth\":\"{$cr[$i][mc_birth]}\",\"sex\":\"{$cr[$i][mc_sex]}\"},";
    }
    $data = substr($data, 0, -1);
    if($crr !=0)
        $data .= "]";
    echo $data;
}
elseif($_POST[method] == 'cancel'){
    $u = "update order_info set o_status = '취소', o_comment = '{$_POST[reason]} {$_POST[cmt]}' where o_no = '{$_POST[o_no]}'";
    sqlresult($u);
    echo "정상 취소 되었습니다.";
}
elseif($_POST[method] == 'remove'){
    $mc_no = str_replace("select_","",$_POST[mc_no]);
    $u = "update member_child set mc_show_yn = 'N', mc_regat = '{$now}' where mc_no = '{$mc_no}'";
    sqlresult($u);
    echo "삭제 되었습니다.";
}