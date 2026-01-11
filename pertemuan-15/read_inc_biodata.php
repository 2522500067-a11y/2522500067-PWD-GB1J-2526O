<?php
require 'koneksi.php';

$fieldBiodata = [
  "nim" => ["label" => "nim:", "suffix" => ""],
  "nama" => ["label" => "nama lengkap:", "suffix" => " &#128526;"],
  "tempat" => ["label" => "tempat lahir:", "suffix" => ""],
  "tanggal" => ["label" => "tanggal lahir:", "suffix" => ""],
  "hobi" => ["label" => "hobi:", "suffix" => ""],
  "pasangan" => ["label" => "pasangan:", "suffix" => ""],
  "pekerjaan" => ["label" => "pekerjaan:", "suffix" => ""],
  "ortu" => ["label" => "nama orang_tua:", "suffix" => ""],
  "kaka" => ["label" => "Nama kaka:", "suffix" => ""],
  "adik" => ["label" => "Nama adik:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_biodata_mahasiswa_sederhana ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrBiodatat = [
      "nim"  => $row["cnim"]  ?? "",
      "nama"  => $row["cnama_lengkap"]  ?? "",
      "tempat"  => $row["ctempat_lahir"]  ?? "",
      "tanggal"  => $row["ctanggal_lahir"]  ?? "",
      "hobi"  => $row["chobi"]  ?? "",
      "pasangan"  => $row["cpasangan"]  ?? "",
      "pekerjaan"  => $row["cpekerjaan"]  ?? "",
      "ortu"  => $row["cnama_orangtua"]  ?? "",
      "kaka"  => $row["cnama_kaka"]  ?? "",
      "adik"  => $row["cnama_adik"]  ?? "",
      
    ];
    echo tampilkanBiodata($fieldBiodata, $arrBiodata);
  }
}
?>
