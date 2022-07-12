<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      header('location:login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <title></title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=karyawan">Karyawan</a>
            </li>
            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?p=profil"><img src="icons/tablet.svg"> Profil</a>
                    <a class="dropdown-item" href="index.php?p=login"><img src="icons/Lock.svg"> Login</a>
                </div>
            </li>
        </ul>
        
    </div>
</nav>

<div class="container" style="padding-top: 70px">
    <div class="row flex-xl-nowrap">
        <div class="col-sm-2">
            <h4>Menu</h4>
            <ul style="list-style-type: none; padding: 0">
                <li><a href="index.php"> <img src="icons/house.svg"> Home</a></li>
                <li><a href="index.php?p=karyawan"> <img src="icons/people.svg"> Karyawan</a></li>
                <?php
                if($_SESSION['level']=='administrator'){
                    echo '<li><a href="index.php?p=user"> <img src="icons/people.svg"> User</a></li>';
                }
                ?>  
                <li><a href="index.php?p=profil"> <img src="icons/tablet.svg"> Profil</a></li>
                <li><a href="logout.php"> <img src="icons/Lock.svg"> Logout</a></li>      
            </ul>
            </nav>
        </div>
        <div class="col-sm">
            <?php
                $page=isset($_GET['p']) ? $_GET['p'] : '';
                if ($page=='') include 'home.php';
                if ($page=='karyawan') include 'list_karyawan.php';
                if ($page=='search_karyawan') include 'search_karyawan.php';
                if ($page=='entri_karyawan') include 'entri_karyawan.php';
                if ($page=='edit_karyawan') include 'edit_karyawan.php';
                if ($page=='profil') include 'profil.php';
                if ($page=='login') include 'login.php';
                if ($page=='logout') include 'login.php';
            ?>
        </div>
    </div>
    <div class="row" style="padding-top: 50px">    
        <div class="navbar navbar-expand-lg  fixed-bottom col-sm navbar-dark bg-dark">
            <div class="text-white">Copyright &copy; 2022 - Semoga Tidak Mengecewakan</div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>