<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $cid = $_GET['cid'] ?? '';
    $cid = (int)$cid;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $cid bernilai valid:
    Kalau $cid tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */
  if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_biodata.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cid, cnim,	cnama_lengkap,	ctempat_lahir,	ctanggal_lahir,	chobi,	cpasangan,
	cpekerjaan,	cnamaorangtua,	cnama_kakak,	cnama_adik
                                    FROM tbl_biodata_mahasiswa_sederhana WHERE cid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_biodata.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read_biodata).php');
  }

  #Nilai awal (prefill form)
  $nim  = $row['cnim'] ?? '';
  $nama = $row['cnama_lengkap'] ?? '';
  $tempat_lahir = $row['ctempat_lahir'] ?? '';
    $tanggal_lahir = $row['ctanggal_lahir'] ?? '';
    $hobi = $row['chobi'] ?? '';
    $pasangan = $row['cpasangan'] ?? '';
    $pekerjaan = $row['cpekerjaan'] ?? '';
    $nama_ortu = $row['cnamaortu'] ?? '';
    $nama_kakak = $row['cnama_kakak'] ?? '';
    $nama_adik = $row['cnama_adik'] ?? '';
  #Ambil error dan nilai old input kalau ada
 $flash_error = $_SESSION['flash_error'] ?? '';
  $old_biodata = $_SESSION['old_biodata'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old_biodata']);
  if (!empty($old_biodata)) {
    $nim  = $old_biodata['nim'] ?? $nim;
    $nama = $old_biodata['nama'] ?? $nama;
    $tempat_lahir = $old_biodata['tempat_lahir'] ?? $tempat_lahir;
    $tanggal_lahir = $old_biodata['tanggal_lahir'] ?? $tanggal_lahir;
    $hobi = $old_biodata['hobi'] ?? $hobi;
    $pasangan = $old_biodata['pasangan'] ?? $pasangan;
    $pekerjaan = $old_biodata['pekerjaan'] ?? $pekerjaan;
    $nama_ortu = $old_biodata['namaortu'] ?? $nama_ortu;
    $nama_kakak = $old_biodata['nama_kakak'] ?? $nama_kakak;
    $nama_adik = $old_biodata['nama_adik'] ?? $nama_adik;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="contact">
        <h2>Edit Buku Tamu</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="proses_update.php" method="POST">

          <input type="text" name="cid" value="<?= (int)$cid; ?>">

         <label>NIM:
      <input type="text" name="nim" value="<?= htmlspecialchars($nim); ?>" required>
    </label>

    <label>Nama Lengkap:
      <input type="text" name="nama" value="<?= htmlspecialchars($nama); ?>" required>
    </label>

    <label>Tempat Lahir:
      <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($tempat_lahir); ?>" required>
    </label>

    <label>Tanggal Lahir:
      <input type="text" name="tanggal_lahir" value="<?= htmlspecialchars($tanggal_lahir); ?>" required>
    </label>

    <label>Hobi:
      <input type="text" name="hobi" value="<?= htmlspecialchars($hobi); ?>" required>
    </label>

    <label>Pasangan:
      <input type="text" name="pasangan" value="<?= htmlspecialchars($pasangan); ?>" required>
    </label>

    <label>Pekerjaan:
      <input type="text" name="pekerjaan" value="<?= htmlspecialchars($pekerjaan); ?>" required>
    </label>

    <label>Nama Orang Tua:
      <input type="text" name="nama_ortu" value="<?= htmlspecialchars($namaortu); ?>" required>
    </label>

    <label>Nama Kakak:
      <input type="text" name="nama_kakak" value="<?= htmlspecialchars($nama_kakak); ?>" required>
    </label>

    <label>Nama Adik:
      <input type="text" name="nama_adik" value="<?= htmlspecialchars($nama_adik); ?>" required>
    </label>

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read_biodata.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>