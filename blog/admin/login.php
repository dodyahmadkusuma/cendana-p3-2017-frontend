<!DOCTYPE html>
<html>
<head>
    <title>Kasus</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css">
</head>
<body>


    <div class="wrapper">
        <div class="navbar" style="margin-bottom: 100px">
                <ul class="left">
                    <li><a href="../../index.php"><img src="../asset/img/logo.png" alt="logo"></a></li>
                </ul>
                <ul class="right">
                    <li><a href="../../index.php">Keluar</a></li>
                </ul>
            
        </div>
		<div class="form_login" >
            <form action="" method="POST">
                <input class="inputtext" type="text" name="user" placeholder="Username/Email">
                <br>
                <input class="inputtext" type="password" name="pass" placeholder="Password">
                <br>
                <div class="left">
                <a href="##">Lupa Password ?</a>
                <input type="checkbox" name="ingat_saya"> Ingat Saya
                </div>
                <div class="right">
                <button class="masuk" >Sign In</button>
                </div>
                <button class="daftar">Daftar Sekarang</button>
            </form>
        </div>
   	</div>


</body>
</html>
<?php 
include"../conn.php";

    session_start();

    if (!empty($_SESSION['userdata'])) {
        header('Location:list-post.php');
    }

    $param = $_POST;

    if (!empty($param)) {
        $username = $param['user'];
        $password = $param['pass'];

        $sql = "SELECT * FROM user
                where 
                nama_user = '$username' AND 
                password = '$password'
                limit 1
                ";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);

        if (count($data) > 0) {
            $_SESSION["userdata"] = $data;

            header('Location:list-post.php');
        }
        
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
        
    } else {
        echo "Isi username dan password terlebih dahulu.";
    }
    































 ?>