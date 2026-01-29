<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "kode" => ["label" => "kode anggota:", "suffix" => ""],
    "nama" => ["label" => "Nama anggota:", "suffix" => " &#128526;"],
    "alamat" => ["label" => "alamat anggota:", "suffix" => ""],
    "tanggal" => ["label" => "Tanggal anggota:", "suffix" => ""],
    "hobi" => ["label" => "Hobi:", "suffix" => " &#127926;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "asal" => ["label" => "asal SLTA:", "suffix" => ""],
    "pacar" => ["label" => "Nama pacar:", "suffix" => ""],
    "mantan" => ["label" => "Nama mantan:", "suffix" => ""],
];
$sql = "SELECT * FROM tbl_biodata_anggota ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data mahasiswa: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data mahasiswa yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
        "kode"       => $row["dkode_anggota"],
        "nama"      => $row["dnama_anggota"],
        "alamat"    => $row["dalamat_anggota"],
        "tanggal"   => $row["dtanggal_anggota"],
        "hobi"      => $row["dhobi"],
        "pekerjaan" => $row["dpekerjaan"],
        "ortu"      => $row["dnama_orang_tua"],
        "asal"      => $row["dasal_SLTA"],
        "pacar"     => $row["dnama_pacar"],
        "mantan"      => $row["dnama_mantan"],
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>