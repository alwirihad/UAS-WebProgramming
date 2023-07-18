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

    // Menerima data keterangan dari URL
    $keterangan = isset($_GET['keterangan']) ? $_GET['keterangan'] : '';

    // Mengenerate nomor bimbingan dan tanggal saat ini
    $noBimbingan = 'Generate Nomor Bimbingan'; // Silakan isi dengan logika yang sesuai
    $tanggalUbah = date('Y-m-d');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = $_POST['keterangan'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Bimbingan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="DaftarBimbing.css">
</head>

<body>
    <div class="sidebar">
        <img src="../img/pp.png" class="pp">
        <h4 class="nama-mahasiswa"><?php echo $namaMahasiswa; ?></h4>
        <ul>
            <li class="Profil"><a href="profil.php"><i></i>Profil</a></li>
            <li class="formsid"><a href="formsid.php"><i></i>Formulir Sidang</a></li>
            <li class="dafja"><a href="daftarpengaju.php"><i></i>Daftar Pengajuan</a></li>
            <li class="dafbim"><a href="#"><i></i>Daftar Bimbingan</a></li>
            <li class="skl"><a href="skl.php"><i></i>SKL</a></li>
            <li class="logout"><a href="logout.php"><i></i>Logout</a></li>
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
                <div class="frame10">
                    <button class="Update" onclick="window.location.href='DaftarBimbing(up).php?'">Update</button>
                </div>
                
                <div class="jadwal">
                    <div class="judul">No.</div>
                    <div class="judul"> Tanggal Ubah</div>
                    <div class="judul">Keterangan</div>
                </div>
                <div class="jadwal1">
                    <div class="judul1"></div>
                    <div class="judul"></div>
                    <div class="judul"></div>
                </div>

            </div>
        </div>

</body>

</html>