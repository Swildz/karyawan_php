<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
</head>

<body class="container col-md-3" style="margin-top : 100px; background-color : #333;">
    <div class="jumbotron text-center">
        <div class="row">
            <div class="col-md">
                <form action="" method="post" role="form" class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
                    
                    <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>
                    
                    <input type="password" name="password" id="inputPass" class="form-control" placeholder="Password" required>

                    <label for=""></label>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Sign In</button>
                </form>
                <div class="text-center">
                    <small>
                        <p>Not a member? <a href="#!"><u>Register</u></a></p>
                    </small>
                    <p>or sign up with:</p>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        if (isset($_POST['submit'])) {
            include 'koneksi.php';
            $password = md5($_POST['password']);
            $query = "SELECT * FROM user WHERE username='$_POST[username]' AND password='$password'";
            $cek = mysqli_query($database, $query);

            $data = mysqli_fetch_array($cek);
            $result = mysqli_num_rows($cek);

            if ($result == 1) {
                session_start();
                $_SESSION['user'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                header('location:index.php');
            } else {
                echo "<script>alert('Username and Password Invalid')</script>";
            }
        }
    ?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>