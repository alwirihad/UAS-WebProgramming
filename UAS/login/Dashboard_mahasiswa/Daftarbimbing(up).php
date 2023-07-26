<?php
    include("../konek.php");
    session_start();
    $nim = $_SESSION['NIM'];

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $query = "SELECT mahasiswa.NIM, mahasiswa.nama_mahasiswa FROM daftar_bimbingan INNER JOIN mahasiswa.NIM = daftar_bimbingan.NIM WHERE NIM = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data mahasiswa
     $no = $row['no_bimbingan'];
     $tanggal = $row['tanggal'];
     $keterangan = $row['keterangan'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Bimbingan</title>
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
    <link rel="stylesheet" href="Daftarbimbing(up).css" />
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
        <h3 class="dafbim">DAFTAR BIMBINGAN SIDANG</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="data">Data</div>
          <form method="post" action="DaftarBimbing.php">
            <div class="frame10">
              <button class="Update" onclick="window.location.href='daftarbimbingan.php?keterangan=<?php echo $keterangan; ?>'">Update</button>
            </div>  
            <button class="batal">Batal</button>
            <div class="asset">
              <div class="nama-1">Keterangan</div>
              <input type="text" class="keterangan" />
              <div class="rectangle-25"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
