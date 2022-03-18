<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$odate = date("Y-m-d");
$_SESSION[agree] = ($_GET[agree] == 'on')?"Y":"N";
for($i=0;$i<count($_SESSION[select_child]);$i++){
    $in = "INSERT INTO `mcc`.`order_info`(`mc_no`, `m_no`, `p_no`,
`o_service`, `o_service_detail`,`o_order_date`, `o_order_time`, `o_start_time`, `o_end_time`, 
`o_d1`, `o_d1_start`, `o_d1_end`, 
`o_d2`, `o_d2_start`, `o_d2_end`, 
`o_d3`, `o_d3_start`, `o_d3_end`, 
`o_d4`, `o_d4_start`, `o_d4_end`, 
`o_d5`, `o_d5_start`, `o_d5_end`, 
`o_snack`, `o_snack_info`, 
`o_relation`, `o_health`, `o_health_etc_comment`, `o_condition`, `o_condition_etc_comment`, `o_back_home`, `o_back_home_etc_comment`, `o_emergency`, `o_textarea`, 
`o_agree`, `o_regat`) 
VALUES ('{$_SESSION[select_child][$i]}', '{$_SESSION[m_no]}', '{$_SESSION[p_no]}', 
  '아동 돌봄', '{$_SESSION[select_care]}','{$_SESSION[start]}' ,'{$now}', '{$_SESSION[start]}', '{$_SESSION[end]}', 
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
$_SESSION[order_time] = $now;
echo "<meta http-equiv='refresh' content='0; url=/app/app-user-order-child-order-complete'>";
?>