<?php
     session_start();
     $sesnim = $_POST["txtnim"];
     $sesnama = $_POST["txtnamalengkap"];
     $sestempatlahir = $_POST["txttempatlahir"];
     $sestanggallahir = $_POST["txttanggallahir"];
     $seshobi = $_POST["txthobi"];
     $sespasangan = $_POST["txtpasangan"];
     $sespekerjaan = $_POST["txtpekerjaan"];
     $sesnamaortu = $_POST["txtnamaortu"];
     $sesnamakakak = $_POST["txtnamakakak"];
     $sesnamaadik = $_POST["txtnamaadik"];
     $_SESSION["sesnim"] = $sesnim;
     $_SESSION["txtnamalengkap"] = $sesnama;
     $_SESSION["txttempatlahir"] = $sestempatlahir;
     $_SESSION["txttanggallahir"] = $sestanggallahir;
     $_SESSION["txthobi"] = $seshobi;
     $_SESSION["txtpasangan"] = $sespasangan;
     $_SESSION["txtpekerjaan"] = $sespekerjaan;
     $_SESSION["txtnamaortu"] = $sesnamaortu;
     $_SESSION["txtnamakakak"] = $sesnamakakak;
     $_SESSION["txtnamaadik"] = $sesnamaadik;
     header("Location: index.php");
     exit();
     ?>
     
