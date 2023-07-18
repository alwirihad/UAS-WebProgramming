<?php
    include("../konek.php");
    session_start();
    $id_admin = $_SESSION['id_admin'];

    // Query untuk mengambil data mahasiswa berdasarkan id admin
    $query = "SELECT Id_admin, nama_admin, NoTelpon, Email, password FROM admin WHERE Id_admin = '$id_admin'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data admin
    $idAdmin = $row['Id_admin'];
    $password = $row['password'];
    $namaAdmin = $row['nama_admin'];
    $noTelpAdmin = $row['NoTelpon'];
    $emailAdmin = $row['Email'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profil</title>
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
    <link rel="stylesheet" href="profil.css" />
  </head>

  <body>
    <div class="sidebar">
      <img src="../img/pp.png" class="pp" />
      <header><?php echo $namaAdmin; ?></header>
      <ul>
        <li class="Profil">
          <a href="profil.php"><i></i>Profil</a>
        </li>
        <li class="formsid">
          <a href="informasisidang.php"><i></i>Informasi Data Sidang</a>
        </li>
        <li class="dafja">
          <a href="informasipenguji.php"><i></i>Informasi Dosen Penguji</a>
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
        <a href="dashboard_admin.php" class="back button">&laquo; </a>
        <h3 class="profil">PROFIL</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="data">Data</div>
          <div class="frame10">
            <button onclick="window.location.href='profil(up).php'">Update</button>
          </div>
          <div class="asset">
            <div class="nama-1">Nama</div>
            <input type="text" class="nama" value="<?php echo $namaAdmin; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Id Admin</div>
            <input type="text" class="id_admin" value="<?php echo $idAdmin; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Password</div>
            <input type="text" class="Password" value="<?php echo $password; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">No.Telp</div>
            <input type="text" class="notelp" value="<?php echo $noTelpAdmin; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Email</div>
            <input type="text" class="Email" value="<?php echo $emailAdmin; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
