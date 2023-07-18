<?php
    include("../konek.php");
    session_start();
    $nim = $_SESSION['NIM'];

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $query = "SELECT nama_Mahasiswa FROM mahasiswa WHERE NIM = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    // Ambil nama mahasiswa
    $namaMahasiswa = $row['nama_Mahasiswa'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Logout</title>
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
    <link rel="stylesheet" href="logout.css" />
  </head>

  <body>
    <div class="sidebar">
      <img src="../img/pp.png" class="pp" />
      <h4 class="nama-mahasiswa"><?php echo $namaMahasiswa; ?></h4>
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
          <a href="#"><i></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class="content">
      <div class="flex-row">
        <a href="dashboard_mahasiswa.php" class="back button">&laquo; </a>
        <h3 class="Logout">Logout</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="Saved">You're Data Will Be Saved</div>
          <div class="frame10">
            <button class="Yes" type="submit"><a href="../loginsid.php">Yes</a></button>
            <button class="No" type="submit"><a href="dashboard_mahasiswa.php">No</a></button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
