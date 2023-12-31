<!DOCTYPE html>
<html>

<head>
    <title>Daftar Bimbingan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="DaftarBimbing.css">
</head>

<body>
    <div class="sidebar">
        <img src="../img/pp.png" class="pp">
        <header>Nama Admin</header>
        <ul>
            <li class="Profil"><a href="profil.php"><i></i>Profil</a></li>
            <li class="formsid"><a href="informasisidang.php"><i></i>Informasi Data Sidang</a></li>
            <li class="dafja"><a href="informasipenguji.php"><i></i>Informasi Dosen Penguji</a></li>
            <li class="dafbim"><a href="DaftarBimbing.php"><i></i>Daftar Bimbingan</a></li>
            <li class="skl"><a href="skl.php"><i></i>SKL</a></li>
            <li class="logout"><a href="logout.php"><i></i>Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="flex-row">
            <a href="dashboard_admin.php" class="back button">&laquo; </a>
            <h3 class="dafbim">DAFTAR BIMBINGAN SIDANG</h3>
        </div>
        <div class="overlap-group">
            <div class="overlap-group3">
                <div class="data">Data</div>
                <div class="frame10">
                    <button onclick="window.location.href='DaftarBimbing(cari).php'">Cari</button>
                </div>
                <div class="asset">
                    <div class="nama-1">
                        Cari NIM
                    </div>
                    <input type="text" class="nama">
                    <div class="rectangle-25"></div>
                </div>


            </div>

        </div>
    </div>

</body>

</html>