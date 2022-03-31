<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
if($_POST[method] == "change_time"){
    $o_d1 = ($_POST[o_d1] == 'on')?" , o_d1 = 'Y', o_d1_start = '{$_POST[o_d1_start]}', o_d1_end = '{$_POST[o_d1_end]}'":" , o_d1 = 'N', o_d1_start = '', o_d1_end = ''";
    $o_d2 = ($_POST[o_d2] == 'on')?" , o_d2 = 'Y', o_d2_start = '{$_POST[o_d2_start]}', o_d2_end = '{$_POST[o_d2_end]}'":" , o_d2 = 'N', o_d2_start = '', o_d2_end = ''";
    $o_d3 = ($_POST[o_d3] == 'on')?" , o_d3 = 'Y', o_d3_start = '{$_POST[o_d3_start]}', o_d3_end = '{$_POST[o_d3_end]}'":" , o_d3 = 'N', o_d3_start = '', o_d3_end = ''";
    $o_d4 = ($_POST[o_d4] == 'on')?" , o_d4 = 'Y', o_d4_start = '{$_POST[o_d4_start]}', o_d4_end = '{$_POST[o_d4_end]}'":" , o_d4 = 'N', o_d4_start = '', o_d4_end = ''";
    $o_d5 = ($_POST[o_d5] == 'on')?" , o_d5 = 'Y', o_d5_start = '{$_POST[o_d5_start]}', o_d5_end = '{$_POST[o_d5_end]}'":" , o_d5 = 'N', o_d5_start = '', o_d5_end = ''";
    $u = "update order_info set o_start_time = '{$_POST[start_day]}', o_end_time = '{$_POST[end_day]}' , o_comment = '{$_POST[o_comment]}' {$o_d1}{$o_d2}{$o_d3}{$o_d4}{$o_d5} where o_no = '{$_POST[no]}' and m_no = '{$_SESSION[m_no]}'";
    sqlresult($u);
    echo "<script>alert('정보가 변경되었습니다.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=/app/app-user-info-detail?o_no={$_POST[no]}'>";
}
else{
$_SESSION[agree] = ($_GET[agree] == 'on')?"Y":"N";
for($i=0;$i<count($_SESSION[select_child]);$i++){
    $in = "INSERT INTO `mcc`.`order_child`(`mc_no`, `m_no`, `p_no`,
`oc_name`, `oc_order_time`, `oc_start_time`, `oc_end_time`, 
`oc_d`, `oc_d_start`, `oc_d_end`, 
`oc_d2`, `oc_d2_start`, `oc_d2_end`, 
`oc_d3`, `oc_d3_start`, `oc_d3_end`, 
`oc_d4`, `oc_d4_start`, `oc_d4_end`, 
`oc_d5`, `oc_d5_start`, `oc_d5_end`, 
`oc_snack`, `oc_snack_info`, 
`oc_relation`, `oc_health`, `oc_health_etc_comment`, `oc_condition`, `oc_condition_etc_comment`, `oc_back_home`, `oc_back_home_etc_comment`, `oc_emergency`, `oc_textarea`, 
`oc_agree`, `oc_regat`) 
VALUES ('{$_SESSION[select_child][$i]}', '{$_SESSION[m_no]}', '{$_SESSION[p_no]}', 
 '{$_SESSION[select_care]}', '{$now}', '{$_SESSION[start]}', '{$_SESSION[end]}', 
 '{$_SESSION[d1]}', '{$_SESSION[d1_start]}', '{$_SESSION[d1_end]}', 
 '{$_SESSION[d2]}', '{$_SESSION[d2_start]}', '{$_SESSION[d2_end]}', 
 '{$_SESSION[d3]}', '{$_SESSION[d3_start]}', '{$_SESSION[d3_end]}', 
 '{$_SESSION[d4]}', '{$_SESSION[d4_start]}', '{$_SESSION[d4_end]}', 
 '{$_SESSION[d5]}', '{$_SESSION[d5_start]}', '{$_SESSION[d5_end]}', 
 '{$_SESSION[snack]}', '{$_SESSION[snack_info]}', 
 '{$_SESSION[relation]}', '{$_SESSION[health]}', '{$_SESSION[health_etc_comment]}', '{$_SESSION[condition]}', '{$_SESSION[condition_etc_comment]}', '{$_SESSION[back_home]}', '{$_SESSION[back_home_etc_comment]}', '{$_SESSION[emergency]}', '{$_SESSION[textarea]}', 
 '{$_SESSION[agree]}', '{$now}')";
sqlresult($in);
}
echo "<meta http-equiv='refresh' content='0; url=/app/app-user-order-child-order-complete'>";
}
?>