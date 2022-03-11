<?php
include '../src/method_config.php';
session_chk();
session_destroy();
echo "<script>alert('로그아웃 되었습니다.');</script>";
echo "<meta http-equiv='refresh' content='0; url=/admin/index'>";
?>