<?php
    include("../konek.php");
    session_start();
    $nim = $_SESSION['NIM'];

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $query = "SELECT mahasiswa.NIM, mahasiswa.nama_Mahasiswa, jadwal.tanggal, jadwal.sesi, jadwal.ruang, jadwal.topik, jadwal.judul, jadwal.dospen1, jadwal.dospen2, jadwal.detail, jadwal.status FROM mahasiswa INNER JOIN jadwal on mahasiswa.NIM = jadwal.NIM;";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data mahasiswa
    $nimMahasiswa = $row['NIM'];
    $namaMahasiswa = $row['nama_Mahasiswa'];
    $tanggal = $row['tanggal'];
    $sesi = $row['sesi'];
    $ruang = $row['ruang'];
    $topik = $row['topik'];
    $judul = $row['judul'];
    $dospen1 = $row['dospen1'];
    $dospen2 = $row['dospen2'];
    $detail = $row['detail'];
    $status = $row['status'];

    // Proses update profil
    if (isset($_POST["submit"])) {
      // Ambil data dari formulir
      $newnim = $_POST['NIM'];
      $newnamaMahasiswa = $_POST['nama'];
      $newtanggal = $_POST['tanggal'];
      $newsesi = $_POST['sesi'];
      $newruang = $_POST['ruang'];
      $newtopik = $_POST['topik'];
      $newjudul = $_POST['judul'];
      $newdospen1 = $_POST['dospen1'];
      $newdospen2 = $_POST['dospen2'];
      $newdetail = $_POST['detail'];
      $newstatus = $_POST['status'];
  
      // Query untuk melakukan update data mahasiswa
      $updateQuery = "UPDATE mahasiswa
                INNER JOIN jadwal ON mahasiswa.NIM = jadwal.NIM
                SET mahasiswa.nama_Mahasiswa = '$newnamaMahasiswa',
                    jadwal.tanggal = '$newtanggal',
                    jadwal.sesi = '$newsesi',
                    jadwal.ruang = '$newruang',
                    jadwal.topik = '$newtopik',
                    jadwal.judul = '$newjudul',
                    jadwal.dospen1 = '$newdospen1',
                    jadwal.dospen2 = '$newdospen2',
                    jadwal.detail = '$newdetail',
                    jadwal.status = '$newstatus'
                WHERE mahasiswa.NIM = '$newnim'";
      $updateResult = mysqli_query($koneksi, $updateQuery);

      if($updateResult) {
          // Redirect ke halaman formsid setelah berhasil update
          header("Location: formsid.php");
          exit();
      } else {
          // Tampilkan pesan error jika terjadi kesalahan
          $error = "Gagal memperbarui profil. Silakan coba lagi.";
      }
    }
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
    <link rel="stylesheet" href="formsid(up).css">
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
        <h3 class="formsidang">FORMULIR SIDANG</h3>
      </div>
      <div class="overlap-group">
        <div class="overlap-group3">
          <form action="formsid.php" method="post">
            <div class="data">Data</div>
            <div class="frame10">
              <button type="submit" class="submit" name="submit">Update</button>
            </div>
            <button class="batal" onclick="window.location.href='formsid.php'">Batal</button>
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
            <input type="text" class="topik" value="<?php echo $topik; ?>" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Judul Skripsi</div>
            <input type="text" class="judul" value="<?php echo $judul; ?>" />
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
            <input type="text" class="detail" value="<?php echo $detail; ?>" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Status</div>
            <input type="text" class="status" value="<?php echo $status; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </body>
</html>
