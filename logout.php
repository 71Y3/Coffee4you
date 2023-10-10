<?php
include("db_connect.php");
unset($_SESSION['auth_id']);
unset($_SESSION['auth_name']);
unset($_SESSION['auth_email']);
unset($_SESSION['auth_address']);
unset($_SESSION['auth_login']);
unset($_SESSION['auth_password']);
$_SESSION['auth'] = 'no_auth';
$_SESSION['auth_id'] = '99';
?>
<script type="text/javascript">document.location.href = "index.php"</script>

