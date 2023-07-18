<?php
    include("konek.php");
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
    <title>dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="dash.css">
</head>

<body>
    <div class="sidebar">
        <img src="/img/pp.png" class="pp">
        <h4 class="nama-mahasiswa"><?php echo $namaMahasiswa; ?></h4>
        <ul>
            <li><a href="profil.php"><i class="Profil"></i>Profil</a></li>
            <li><a href="formsid.php"><i class="formsid"></i>Formulir Sidang</a></li>
            <li><a href="dafja.php"><i class="dafja"></i>Daftar Pengajuan</a></li>
            <li><a href="DaftarBimbing.php"><i class="dafbim"></i>Daftar Bimbingan</a></li>
            <li><a href="skl.php"><i class="skl"></i>SKL</a></li>
            <li><a href="logout.php"><i class="logout"></i>Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <img src="/img/Logo Universitas Esa Unggul 1.png" alt="">
        <div class="cardcontaint">
            <div class="cardprof" onclick="window.location.href='profil.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">Profil</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>

            <div class="cardformsid" onclick="window.location.href='formsid.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Sidang</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <div class="carddafju" onclick="window.location.href='daftarpengaju.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pengajuan</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <div class="carddafbing" onclick="window.location.href='DaftarBimbing.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Bimbingan</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <div class="cardskl" onclick="window.location.href='skl.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">SKL</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <div class="cardlogout" onclick="window.location.href='logout.php'">
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text"></p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>