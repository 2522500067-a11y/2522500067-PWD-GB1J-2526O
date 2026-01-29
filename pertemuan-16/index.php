<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">

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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
    $flash_error  = $_SESSION['flash_error'] ?? '';
    $old_biodata  = $_SESSION['old_biodata'] ?? [];

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old_biodata']);
    ?>

    <section id="biodata">
      <h2>Biodata Pengunjung</h2>

      <?php if ($flash_sukses): ?>
        <div style="padding:10px;margin-bottom:10px;background:#d4edda;color:#155724;border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if ($flash_error): ?>
        <div style="padding:10px;margin-bottom:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses_pengunjung.php" method="POST">

        <label for="txtKdPengunjung"><span>Kode Pengunjung:</span>
          <input type="text" id="txtKdPengunjung" name="txtKdPengunjung"
          placeholder="Masukkan kode pengunjung"
            required value="<?= htmlspecialchars($old_biodata['kode'] ?? '') ?>">
        </label>

        <label for="txtNmPengunjung"><span>Nama Pengunjung:</span>
          <input type="text" id="txtNmPengunjung" name="txtNmPengunjung"
          placeholder="Masukkan nama"
            required value="<?= htmlspecialchars($old_biodata['nama'] ?? '') ?>">
        </label>

        <label for="txtalmtrumah"><span>Alamat Rumah:</span>
          <input type="text" id="txtalmtrumah" name="txtalmtrumah"
          placeholder="masukkan alamat"
            required value="<?= htmlspecialchars($old_biodata['alamat'] ?? '') ?>">
        </label>

        <label for="txtTglkunjungan"><span>Tanggal Kunjungan:</span>
          <input type="text" id="txtTglkunjungan" name="txtTglkunjungan"
          placeholder="masukkan tanggal"
            required value="<?= htmlspecialchars($old_biodata['tanggal'] ?? '') ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi"
          placeholder="masukkan hobi"
            required value="<?= htmlspecialchars($old_biodata['hobi'] ?? '') ?>">
        </label>

        <label for="txtAsalslta"><span>Asal SLTA:</span>
          <input type="text" id="txtAsalslta" name="txtAsalslta"
          placeholder="masukkan asal"
            required value="<?= htmlspecialchars($old_biodata['asal'] ?? '') ?>">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan"
          placeholder="masukkan pekerjaan"
            required value="<?= htmlspecialchars($old_biodata['pekerjaan'] ?? '') ?>">
        </label>

        <label for="txtNmOrtua"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtua" name="txtNmOrtua"
          placeholder="masukkan nama ortu"
            required value="<?= htmlspecialchars($old_biodata['ortua'] ?? '') ?>">
        </label>

        <label for="txtNmpacar"><span>Nama Pacar:</span>
          <input type="text" id="txtNmpacar" name="txtNmpacar"
          placeholder="masukkan nama pacar"
            required value="<?= htmlspecialchars($old_biodata['pacar'] ?? '') ?>">
        </label>

        <label for="txtNmmantan"><span>Nama Mantan:</span>
          <input type="text" id="txtNmmantan" name="txtNmmantan"
          placeholder="masukkan nama mantan"
            required value="<?= htmlspecialchars($old_biodata['mantan'] ?? '') ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'read_pengunjung_inc.php'; ?>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? '';
    $flash_error  = $_SESSION['flash_error'] ?? '';
    $old          = $_SESSION['old'] ?? [];

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if ($flash_sukses): ?>
        <div style="padding:10px;margin-bottom:10px;background:#d4edda;color:#155724;border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if ($flash_error): ?>
        <div style="padding:10px;margin-bottom:10px;background:#f8d7da;color:#721c24;border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama"
          placeholder="masukkan nama"
            required value="<?= htmlspecialchars($old['nama'] ?? '') ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail"
          placeholder="masukkan email"
            required value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4"
          placeholder="masukkan pesan"
            required><?= htmlspecialchars($old['pesan'] ?? '') ?></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha"
          placeholder="masukkan captcha"
            required value="<?= htmlspecialchars($old['captcha'] ?? '') ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <br><hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>