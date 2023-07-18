<?php
    session_start();
    include("konek.php");
    $id_admin = "";
    $password = "";
    $err = "";
    if(isset($_POST['login'])){
        $id_admin   = $_POST['id_admin'];
        $password   = $_POST['password'];
        if($id_admin == '' or $password == ''){
            $err .= "<li>Silahkan masukkan id_admin dan password</li>";
        }
        if(empty($err)){

            $sqlAdmin = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
            $qAdmin = mysqli_query($koneksi, $sqlAdmin);
            $admin = mysqli_fetch_array($qAdmin);

            if($admin && $admin['password'] != $password){
                $err .= "<li>Akun admin tidak ditemukan</li>";
            }
            elseif($admin) {
                $_SESSION['id_admin'] = $id_admin;
                header("location: Dashboard_admin/dashboard_admin.php");
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
                        <label for="">Id Admin</label>
                    </div>
                    <input type="text" class="user-input"
                    placeholder="id admin" name="id_admin" id="textinput" required>
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
