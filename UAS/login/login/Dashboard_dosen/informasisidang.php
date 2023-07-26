<?php
    include("../konek.php");
    session_start();
    $nidn = $_SESSION['NIDN'];

    // Query untuk mengambil data Dosen berdasarkan NIM
    $query = "SELECT dosen.NIDN, dosen.nama_dosen, mahasiswa.NIM, mahasiswa.nama_Mahasiswa, skripsi.judulSkripsi, skripsi.topikSkripsi, skripsi.abstrakSkripsi, jadwal.tanggal, jadwal.ruang FROM jadwal INNER JOIN mahasiswa ON mahasiswa.NIM = jadwal.NIM INNER JOIN dosen ON dosen.NIDN = jadwal.NIDN1 INNER JOIN skripsi ON skripsi.idskripsi = jadwal.idskripsi WHERE dosen.NIDN = '$nidn';";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

     // Ambil data Dosen
    $nidn = $row['NIDN'];
    $nama_dosen = $row['nama_dosen'];
    $NIM = $row['NIM'];
    $nama_mahasiswa = $row['nama_Mahasiswa'];
    $judul = $row['judulSkripsi'];
    $topik = $row['topikSkripsi'];
    $abstrak = $row['abstrakSkripsi'];
    $tanggal = $row['tanggal'];
    $ruang = $row['ruang'];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Informasi Data Sidang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="Informasisidang.css">
</head>

<body>
    <div class="sidebar">
        <img src="../img/pp.png" class="pp">
        <header class="nama-dosen"><?php echo $nama_dosen; ?></header>
        <ul>
            <li class="Profil"><a href="profil.php"><i></i>Profil</a></li>
            <li class="formsid"><a href="informasisidang.php"><i></i>Informasi Data Sidang</a></li>
            <li class="logout"><a href="logout.php"><i></i>Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="flex-row">
            <a href="dashboard_dosen.php" class="back button">&laquo; </a>
            <h3 class="formsidang">INFORMASI DATA SIDANG</h3>
        </div>
        <div class="overlap-group">
            <div class="overlap-group3">
                <div class="data">Data</div>
                <div class="frame10">
                    <button onclick="window.location.href='informasisidang(cari).php'">Cari</button>
                </div>
                <div class="asset">
                    <div class="nama-1">
                        Cari NIM
                    </div>
                    <input type="text" class="nama">
                    <div class="rectangle-25"></div>
                </div>
                <div class="jadwal">
                    <div class="judul">No.</div>
                    <div class="judul"> NIM mahasiswa</div>
                    <div class="judul"> Nama mahasiswa</div>
                    <div class="judul">Judul Skripsi</div>
                    <div class="judul">Topik Skripsi</div>
                    <div class="judul">Abstrak Skripsi</div>
                    <div class="judul">Tanggal</div>
                    <div class="judul">Ruang</div>
                </div>
                <div class="jadwal1">
                    <div class="judul1"><?= $no ?></div>
                    <div class="judul"><?= $nim ?></div>
                    <div class="judul"><?= $nama_mahasiswa ?></div>
                    <div class="judul"><?= $judul ?></div>
                    <div class="judul"><?= $topik ?></div>
                    <div class="judul"><?= $abstrak ?></div>
                    <div class="judul"><?= $tanggal ?></div>
                    <div class="judul"><?= $ruang ?></div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>