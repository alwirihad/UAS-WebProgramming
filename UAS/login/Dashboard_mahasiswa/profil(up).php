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

    // Proses update profil
    if(isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $noTelp = $_POST['no_telp'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query untuk melakukan update data mahasiswa
        $updateQuery = "UPDATE mahasiswa SET nama_Mahasiswa = '$nama', NoTelpon = '$noTelp', Email = '$email', password = '$password' WHERE NIM = '$nim'";
        $updateResult = mysqli_query($koneksi, $updateQuery);

        if($updateResult) {
            // Redirect ke halaman profil setelah berhasil update
            header("Location: profil.php");
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
    <style>
      body {
        margin: 0;
        padding: 0;
      }

      .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 290px;
        background-color: rgba(16, 65, 103, 1);
        color: #fff;
        padding-top: 60px;
      }

      .sidebar .pp {
        position: relative;
        bottom: 40px;
        max-width: 150px;
        margin-left: 60px;
      }

      .sidebar header {
        color: #fff;
        font-family: Poppins;
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-transform: capitalize;
        position: relative;
        bottom: 40px;
        padding: 20px;
        font-size: 22px;
        left: 10px;
      }

      .sidebar ul {
        position: relative;
        bottom: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .sidebar li {
        padding: 15px;
      }

      .sidebar li a {
        color: #fff;
        text-decoration: none;
      }

      .sidebar li i {
        margin-left: 50px;
      }

      .sidebar ul a {
        display: flex;
        align-items: center;
        width: 235px;
        padding: 4px 2px;
        box-sizing: border-box;
      }

      .sidebar ul a:hover {
        color: black;
        background-color: rgba(240, 160, 40, 1);
      }

      .sidebar ul :hover {
        background-color: rgba(240, 160, 40, 1);
      }

      .sidebar ul .Profil {
        background-color: rgba(240, 160, 40, 1);
      }

      .content {
        align-items: center;
        display: flex;
        flex-direction: column;
        gap: 46px;
        margin-top: 48px;
        min-height: 571px;
        width: 678px;
      }

      .flex-row a {
        position: relative;
        left: 29px;
        bottom: 73px;
        text-decoration: none;
        font-size: 80px;
        color: black;
      }

      .flex-row .profil {
        position: relative;
        left: 89px;
        bottom: 138px;
      }

      .overlap-group {
        position: relative;
        left: 446px;
        bottom: 160px;
        width: 848px;
        height: 370px;
        border-radius: 12px;
        background-color: rgba(16, 65, 103, 1);
      }

      .data {
        position: relative;
        color: #fff;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: capitalize;
        bottom: 45px;
        left: 26px;
      }

      .overlap-group button {
        position: relative;
        left: 632px;
        bottom: 75px;
        border-radius: 5px;
        padding: 4px 19px 6px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        background: #f0a028;
        color: #000;
        font-size: 17px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        border: none;
      }

      .overlap-group .batal {
        position: relative;
        left: 747px;
        bottom: 107px;
        border-radius: 5px;
        padding: 4px 25px 6px 25px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        background: rgba(132, 184, 225, 1);
        color: #000;
        font-size: 17px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        text-transform: capitalize;
        border: none;
      }

      .overlap-group3 {
        position: relative;
        top: 60px;
        left: 2px;
        height: 308px;
        width: 844px;
        border-radius: 0px 0px 10px 10px;
        background-color: #fff;
      }

      .asset {
        position: relative;
        bottom: 35px;
        left: 40px;
      }

      input {
        position: relative;
        left: 150px;
        bottom: 25px;
        border-radius: 5px;
        border: 1px solid #104167;
        background: #fff;
        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.25);
        width: 550px;
      }

      .nama-1 {
        color: #000;
        font-family: Poppins;
        font-size: 13px;
        font-style: normal;
        font-weight: 600;
        text-transform: capitalize;
      }

      @media (max-width: 768px) {
        .sidebar {
          width: 100%;
          padding-top: 15px;
          display: none;
        }

        .sidebar header {
          text-align: center;
        }

        .sidebar ul {
          display: flex;
          flex-direction: row;
          justify-content: space-around;
          margin-top: 15px;
        }

        .sidebar li {
          padding: 10px;
          border-bottom: none;
        }

        .content {
          margin-left: 0;
        }
      }
    </style>
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
          <form method="POST" action="profil(up).php">
          <div class="frame10">
            <button type="submit" name="update">Update</button>
          </div>
          <button class="batal" onclick="window.location.href='profil.php'">Batal</button>
          <div class="asset">
            <div class="nama-1">Nama</div>
            <input type="text" class="nama" name="nama" value="<?php echo $namaMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Nim</div>
            <input type="text" class="NIM" name="nim" value="<?php echo $nimMahasiswa; ?>" readonly/>
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Password</div>
            <input type="text" class="Password" name="password" value="<?php echo $password; ?>" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">No.Telp</div>
            <input type="text" class="notelp" name="no_telp" value="<?php echo $noTelpMahasiswa; ?>" />
            <div class="rectangle-25"></div>
          </div>
          <div class="asset">
            <div class="nama-1">Email</div>
            <input type="text" class="Email" name="email" value="<?php echo $emailMahasiswa; ?>"/>
            <div class="rectangle-25"></div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
