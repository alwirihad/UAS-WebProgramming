<?php
    include("../konek.php");
    session_start();
    $nim = $_SESSION['NIM'];

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $query = "SELECT mahasiswa.NIM, mahasiswa.nama_Mahasiswa, jadwal.tanggal, jadwal.sesi, jadwal.ruang, jadwal.detail, jadwal.status, skripsi.topikSkripsi, skripsi.judulSkripsi, skripsi.NIDN1, skripsi.NIDN2, dosen1.nama_dosen AS nama_dosen1, dosen2.nama_dosen AS nama_dosen2 FROM jadwal INNER JOIN mahasiswa ON jadwal.NIM = mahasiswa.NIM INNER JOIN skripsi ON jadwal.idskripsi = skripsi.idskripsi INNER JOIN dosen AS dosen1 ON skripsi.NIDN1 = dosen1.NIDN INNER JOIN dosen AS dosen2 ON skripsi.NIDN2 = dosen2.NIDN WHERE mahasiswa.NIM = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data mahasiswa
    $nimMahasiswa = $row['NIM'];
    $namaMahasiswa = $row['nama_Mahasiswa'];
    $tanggal = $row['tanggal'];
    $sesi = $row['sesi'];
    $ruang = $row['ruang'];
    $topik = $row['topikSkripsi'];
    $judul = $row['judulSkripsi'];
    $dospen1 = $row['nama_dosen1'];
    $dospen2 = $row['nama_dosen2'];
    $detail = $row['detail'];
    $status = $row['status'];

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Formulir Sidang</title>
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
    <link rel="stylesheet" href="formsid.css" />
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
          <a href="#"><i></i>Formulir Sidang</a>
        </li>
        <li class="dafja">
          <a href="daftarpengaju.php"><i></i>Daftar Pengajuan</a>
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
        <h3 class="formsidang">FORMULIR SIDANG</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="data">Data</div>
          <div class="frame10">
            <button class="update" onclick="window.location.href='formsid(up).php'">Update</button>
          </div>
          <div class="asset">
            <div class="nama-1">Nama</div>
            <input type="text" class="nama" value="<?php echo $namaMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Nim</div>
            <input type="text" class="NIM" value="<?php echo $nimMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Tanggal Sidang</div>
            <input type="text" class="tanggal" value="<?php echo $tanggal; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Sesi Sidang</div>
            <input type="text" class="sesi" value="<?php echo $sesi; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Ruang Sidang</div>
            <input type="text" class="ruang" value="<?php echo $ruang; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Topik Skripsi</div>
            <input type="text" class="topik" value="<?php echo $topik; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Judul Skripsi</div>
            <input type="text" class="judul" value="<?php echo $judul; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Dosen Pembimbing 1</div>
            <input type="text" class="dospen1" value="<?php echo $dospen1; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Dosen Pembimbing 2</div>
            <input type="text" class="dospen2" value="<?php echo $dospen2; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Detail</div>
            <input type="text" class="detail" value="<?php echo $detail; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Status</div>
            <input type="text" class="status" value="<?php echo $status; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
