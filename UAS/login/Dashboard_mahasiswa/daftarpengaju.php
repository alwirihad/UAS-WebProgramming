<?php
    include("../konek.php");
    session_start();
    $nim = $_SESSION['NIM'];

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $query = "SELECT NIM, nama_Mahasiswa, NoTelpon, Email, password FROM mahasiswa WHERE NIM = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data mahasiswa
    $nimMahasiswa = $row['NIM'];
    $password = $row['password'];
    $namaMahasiswa = $row['nama_Mahasiswa'];
    $noTelpMahasiswa = $row['NoTelpon'];
    $emailMahasiswa = $row['Email'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Mengambil nilai input dari elemen formulir
      $topikSkripsi = $_POST['topikSkripsi'];
      $topikSkripsiEN = $_POST['topikSkripsiEN'];
      $judulSkripsi = $_POST['judulSkripsi'];
      $judulSkripsiEN = $_POST['judulSkripsiEN'];
      $abstrakSkripsi = $_POST['abstrakSkripsi'];
      $dosenPembimbing1 = $_POST['dosenPembimbing1'];
      $dosenPembimbing2 = $_POST['dosenPembimbing2'];
  
      // Query INSERT untuk menyimpan data ke tabel pengajuan_sidang
      $query = "INSERT INTO skripsi (topikSkripsi, topikSkripsiEN, judulSkripsi, judulSkripsiEN, abstrakSkripsi, dosenPembimbing1, dosenPembimbing2)
                VALUES ('$topikSkripsi', '$topikSkripsiEN', '$judulSkripsi', '$judulSkripsiEN', '$abstrakSkripsi', '$dosenPembimbing1', '$dosenPembimbing2')";
  
      // Menjalankan query INSERT
      if (mysqli_query($koneksi, $query)) {
          // Jika data berhasil disimpan, redirect ke halaman lain atau tampilkan pesan sukses
          header("Location: ../Dashboard_admin/informasipenguji.php"); // Ganti "halaman_lain.php" dengan halaman tujuan setelah data disimpan
          exit;
      } else {
          // Jika terjadi error saat menyimpan data, tampilkan pesan error
          echo "Error: " . mysqli_error($koneksi);
      }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Pengajuan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="daftarpengaju.css" />
  </head>

  <body>
    <div class="sidebar">
      <img src="../img/pp.png" class="pp" />
      <header class="nama-mahasiswa"><?php echo $namaMahasiswa; ?></header>
      <ul>
        <li class="Profil">
          <a href="profil.php"><i></i>Profil</a>
        </li>
        <li class="formsid">
          <a href="formsid.php"><i></i>Formulir Sidang</a>
        </li>
        <li class="dafja">
          <a href="#"><i></i>Daftar Pengajuan</a>
        </li>
        <li class="dafbim">
          <a href="DaftarBimbing.php"><i></i>Daftar Bimbingan</a>
        </li>
        <li class="skl">
          <a href="skl.php"><i></i>SKL</a>
        </li>
        <li class="logout">
          <a href="logout.php"><i></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class="content">
      <div class="flex-row">
        <a href="dashboard_mahasiswa.php" class="back button">&laquo; </a>
        <h3 class="dafja">DAFTAR PENGAJUAN SIDANG</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="data">Data</div>
          <form method="post" action="">
            <div class="frame10">
              <button class="Update" type="submit">Update</button>
            </div>
            <button class="batal">Batal</button>
            <div class="asset">
              <div class="nama-1">Topik Skripsi</div>
              <input type="text" class="nama" name="topikSkripsi"/>
              <div class="rectangle-25"></div>
            </div>
            <div class="asset">
              <div class="nama-1">Topik Skripsi(EN)</div>
              <input type="text" class="NIM" name="topikSkripsiEN"/>
              <div class="rectangle-25"></div>
            </div>
            <div class="asset">
              <div class="nama-1">Judul Skripsi</div>
              <input type="text" class="Password" name="judulSkripsi"/>
              <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Judul Skripsi(EN)</div>
            <input type="text" class="notelp" name="judulSkripsiEN" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Abstrak Skripsi</div>
            <input type="text" class="Email" name="abstrakSkripsi" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Dosen Pembimbing 1</div>
            <input type="text" class="Email" name="dosenPembimbing1"/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Dosen Pembimbing 2</div>
            <input type="text" class="Email" name="dosenPembimbing2" />
            <div class="rectangle-25"></div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </body>
</html>
