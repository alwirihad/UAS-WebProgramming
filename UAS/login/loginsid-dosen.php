<?php
    session_start();
    include("konek.php");
    $nidn_dosen = "";
    $password = "";
    $err = "";
    if(isset($_POST['login'])){
        $nidn_dosen   = $_POST['nidn_dosen'];
        $password   = $_POST['password'];
        if($nidn_dosen == '' or $password == ''){
            $err .= "<li>Silahkan masukkan nidn dosen dan password</li>";
        }
        if(empty($err)){

            $sqlDosen = "SELECT * FROM dosen WHERE NIDN = '$nidn_dosen'";
            $qDosen = mysqli_query($koneksi, $sqlDosen);
            $dosen = mysqli_fetch_array($qDosen);

            if($dosen && $dosen['password'] != $password){
                $err .= "<li>Akun dosen tidak ditemukan</li>";
            }
            elseif($dosen) {
                $_SESSION['NIDN'] = $nidn_dosen;
                header("location: Dashboard_dosen/dashboard_dosen.php");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&display=swap" rel="stylesheet">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <form method="post" action="">

            <div class="login-div">
                <?php
                if($err){
                    echo "<ul>$err</ul>";
                }
                ?>
            <div class="logo">
                <img src="img/Logo Universitas Esa Unggul 1.png" alt="">
            </div>
            <div class="title">
                Enter Your Details To Log In Your Account
                <div class="fields">
                    <div class="username">
                        <label for="">NIDN Dosen</label>
                    </div>
                    <input type="text" class="user-input"
                    placeholder="nidn dosen" name="nidn_dosen" id="textinput" required>
                    <div class="password">
                        <label for="">Password</label>
                        <input type="password" class="user-password" id="password" name="password" placeholder="Password" required>
                        <img src="icon/Vector.png" id="eyeicon">
                    </div>
                </div>
                <div class="link">
                    <a href="#">
                        Forgot Password ?
                    </a> 
                </div>
                <button class="submit" type="submit" name="login">Sign In</button>
            </div>
        </form>   
    </div>
</div>
<script src="login.js"></script>
</body>
</html>
