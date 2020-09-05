<html>
<body>
<?php
// See the password_hash() example to see where this came from.
$hash           = '$2y$12$bayVp/x9PTmOSPUlvDfqYOP8HK/.eOtYFtDEjLq2036Ck8fqTLjzu';
$input_password = $_POST["psw"];

if (password_verify($input_password, $hash)) {
    echo "<iframe src='http://localhost:8080/display_info.php' width='100%' height='1000' name = 'Content'>
  </iframe>";
} else {
    echo 'Invalid password.';
}

?>
</body>
</html>
