<?php
    include("konek.php");
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
      <img src="/img/pp.png" class="pp" />
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
          <a href="logout.php"><i></i>Logout</a>
        </li>
      </ul>
    </div>
    <div class="content">
      <div class="flex-row">
        <a href="dashboard_mahasiswa.php" class="back button">&laquo; </a>
        <h3 class="profil">PROFIL</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <div class="data">Data</div>
          <div class="frame10">
            <button onclick="window.location.href='profil(up).php'">
              Update
            </button>
          </div>
          <div class="asset">
            <div class="nama-1">Nama</div>
            <input type="text" class="nama" value="<?php echo $namaMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1" >Nim</div>
            <input type="text" class="NIM" value="<?php echo $nimMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Password</div>
            <input type="text" class="Password" value="<?php echo $password; ?>"readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">No.Telp</div>
            <input type="text" class="notelp" value="<?php echo $noTelpMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1" >Email</div>
            <input type="text" class="Email" value="<?php echo $emailMahasiswa; ?>"readonly/>
            <div class="rectangle-25"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
