<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$sesemail = $_SESSION["txtEmail"] ?? "";
$sespesan = $_SESSION["txtPesan"] ?? "";
$sesnim = $_SESSION["sesnim"] ?? "";
$sesnama = $_SESSION["txtnamalengkap"] ?? "";  
$sestempatlahir = $_SESSION["txttempatlahir"] ?? "";
$sestanggallahir = $_SESSION["txttanggallahir"] ?? "";
$seshobi = $_SESSION["txthobi"] ?? "";
$sespasangan = $_SESSION["txtpasangan"] ?? "";
$sespekerjaan = $_SESSION["txtpekerjaan"] ?? "";
$sesnamaortu = $_SESSION["txtnamaortu"] ?? "";
$sesnamakakak = $_SESSION["txtnamakakak"] ?? "";
$sesnamaadik = $_SESSION["txtnamaadik"] ?? "";
?>

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
      echo "nama saya Dewa";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="about">
      <?php
          $nim = "2522500067";
          $Nama_Lengkap = "Jelisa dewi komariah&hearts;";
          $Tempat_Lahir = "Pangkalpinang";
          $Tanggal_Lahir = "26-06-2007";
          $hobi = "mendaki";
          $Pasangan = "saya belum dikasih kepastian&hearts;";
          $Pekerjaan = "mahasiswa&hearts;";
          $Nama_orang_tua ="Nama Ayah saya adalah INDRA GUNAWAN dan Nama Ibu saya ELIANTI&hearts;";
          $Nama_kakak = "saya tidak mempunyai kakak ";
          $Nama_adik = "Jelita dewi komariah";
      ?>

      <h2>biodata sederhana mahasiswa</h2>
      <p><strong>NIM:</strong><?php echo $sesnim?> </p>
      <p><strong>Nama Lengkap:</strong><?php echo $sesnama?></p>
      <p><strong>Tempat Lahir:</strong><?php echo $sestempatlahir?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $sestanggallahir?></p>
      <p><strong>Hobi:</strong><?php echo $seshobi?></p>
      <p><strong>Pasangan:</strong> <?php echo $sespasangan ?></p>
      <p><strong>Pekerjaan:</strong><?php echo $sespekerjaan?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesnamaortu?></p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesnamakakak?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesnamaadik?></p>
    </section>


    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="  " method="POST">

        <label for="txtnama"><span>Nama:</span>
          <input type="text" id="txtnama" name="txtnama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
</section>




  <section id="contact">
      <br><h2> di sini</h2></br>
      <form action="ulangan.php" method="POST">

        <label for="txtnim"><span>NIM:</span>
          <input type="Nim" id="txtnim" name="txtnim" placeholder="di sini........." required autocomplete="nim">
        </label>

        <label for="txtnamalengkap"><span>Nama Lengkap:</span>
          <input type="Nama" id="txtnamalengkap" name="txtnamalengkap" placeholder="di sini........." required autocomplete="nama">
        </label>

        <label for="txttempatlahir"><span>Tempat Lahir:</span>
          <input type="Tempat lahir" id="txttempatlahir" name="txttempatlahir" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txttanggallahir"><span>Tanggal Lahir:</span>
          <input type="Tanggal lahir" id="txttanggallahir" name="txttanggallahir" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txthobi"><span>Hobi:</span>
          <input type="hobi" id="txthobi" name="txthobi" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txtpasangan"><span>Pasangan:</span>
          <input type="pasangan" id="txtpasangan" name="txtpasangan" placeholder="di sini........." required autocomplete="email">
        </label>

        
        <label for="txtpekerjaan"><span>Pekerjaan:</span>
          <input type="pekerjaan" id="txtpekerjaan" name="txtpekerjaan" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txtnamaortu"><span>Nama Orang Tua:</span>
          <input type="nama orang tua" id="txtnamaortu" name="txtnamaortu" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txtnamakakak"><span>Nama Kakak:</span>
          <input type="nama kakak" id="txtnamakakak" name="txtnamakakak" placeholder="di sini........." required autocomplete="email">
        </label>

        <label for="txtnamaadik"><span>Nama Adik:</span>
          <input type="nama adik" id="txtnamadik" name="txtnamaadik" placeholder="di sini........." required autocomplete="email">
        </label>

  

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>


      

    </section>
  </main>

  <footer>
    <p>&copy; 2025 JELISA DEWI KOMARIAH[2522500067]</p>
  </footer>

  <script src="script.js"></script>
</body>
  
</html>