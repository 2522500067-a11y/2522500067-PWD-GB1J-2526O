<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "nama" => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
    "tempat" => ["label" => "Tempat Lahir:", "suffix" => ""],
    "tanggal" => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "hobi" => ["label" => "Hobi:", "suffix" => " &#127926;"],
    "pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
    "adik" => ["label" => "Nama Adik:", "suffix" => ""],
];
$sql = "SELECT * FROM tbl_biodata_mahasiswa_sederhana ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data mahasiswa: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data mahasiswa yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
        "nim"       => $row["cnim"],
        "nama"      => $row["cnama_lengkap"],
        "tempat"    => $row["ctempat_lahir"],
        "tanggal"   => $row["ctanggal_lahir"],
        "hobi"      => $row["chobi"],
        "pasangan"  => $row["cpasangan"],
        "pekerjaan" => $row["cpekerjaan"],
        "ortu"      => $row["cnama_orang_tua"],
        "kakak"     => $row["cnama_kakak"],
        "adik"      => $row["cnama_adik"],
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>