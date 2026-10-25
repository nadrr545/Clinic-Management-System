<?php
session_start();
include('../../include/config.php');
$_SESSION['login'] == "";
date_default_timezone_set('Asia/Tehran');
$ldate = date('d-m-Y h:i:s A', time());
mysqli_query($db, "UPDATE userlog  SET logout = '$ldate' WHERE uid = '" . $_SESSION['id'] . "' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg'] = "شما از حساب کاربری خارج شدید";
?>
<script language="javascript">
    document.location = "./index.php";
</script>