

<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"]=$sesnama;
$_SESSION["txtEmai"]=$sesemail;
$_SESSION["txtPesan"]=$sespesan;
header("location: index.php");
?>




<?php
session_start();
$sesnama=$_SESSION["sesnama"];
$sesemail=$_SESSION["txtEmai"];
$sespesan=$_SESSION["txtPesan"];
?>