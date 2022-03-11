<?php
include '../src/method_config.php';
session_check_child();
session_destroy();
echo "<script>alert('로그아웃 되었습니다.');</script>";
echo "<meta http-equiv='refresh' content='0; url=/child/index'>";
?>