<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registrasi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="asset/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body onload="load()">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Load Page -->
        <div id="loadpage" class="loadpage">
            <div class="spinner-grow text-primary position-absolute top-50 start-50 translate-middle" style="width: 6rem; height: 6rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Registrasi Page -->
        <div class="loginpage position-absolute top-50 start-50 translate-middle">
            <div class="container text-center">
                <div class="row shadow-lg p-3 border rounded-4">
                    <div class="col">
                        <h1 class="px-5 pb-5"> Registrasi </h1>
                        <form class="py-3" id="registerForm" method="post" name="registerForm" action="">
                            <div class="row px-3 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="usernametxt" class="col-form-label">Username</label>
                                </div>
                                <div class="col-auto">
                                    <input name="username" type="text" id="usernametxt" class="form-control">
                                </div> 
                            </div>
                            <div class="row px-3 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="passwordtxt" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input name="password" type="password" id="passwordtxt" class="form-control" >
                                </div> 
                            </div>
                            <div class="row px-3 pb-5 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="cpassword" class="col-form-label">Confirm Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="cpassword" class="form-control">
                                </div> 
                            </div>
                            <div class="px-5 d-grid gap-2">
                                <button class="btn btn-primary" id="submitButton" name="register" type="submit">Registrasi</button>
                                <button onclick="location.href ='index.php';" class="btn btn-primary" type="button">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register php-->
        <?php
            include 'asset/php/koneksi.php';
            if (isset($_POST['register'])){
                $id = uniqid('user_');
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "INSERT INTO user_tbl (id_user, username, password) VALUES ('$id','$username', '$password')";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "Registrasi Berhasil";
                } else {
                    echo "Koneksi Gagal";
                }
            }
        ?>
        
        <script src="asset/js/script.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>