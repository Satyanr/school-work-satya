<?php
include 'asset/php/koneksi.php'; // Include login script
if(isset($_POST['login'])) {
    // Get input values
    $username = $_POST['username'];
    $password = $_POST['password'];
    //get data from database
    $query = mysqli_query($conn, "SELECT * FROM user_tbl WHERE username = '$username'");
    //check if username exist
    if(mysqli_num_rows($query) == 0) {
    // If invalid, display login form with error message
    ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="asset/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Login Page -->
        <div class="loginpage position-absolute top-50 start-50 translate-middle">
            <div class="container text-center">
                <div class="row shadow-lg p-3 border rounded-4">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Username is not registered!
                                </div>
                            </div>
                        </div>
                        <h1 class="px-5 pb-5"> Login </h1>
                        <form class="py-3" method="post" action="">
                            <div class="row px-3 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputusername" class="col-form-label">Username</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="username" id="inputusername" class="form-control" required>
                                </div> 
                            </div>
                            <div class="row px-3 pb-5 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputPassword6" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" name="password" id="inputPassword6" class="form-control" required>
                                </div> 
                            </div>
                            <div class="px-5 d-grid gap-2">
                                <button name="login" class="btn btn-primary" type="submit">Login</button>
                                <button onclick="location.href ='register.php';" class="btn btn-primary" type="button">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="asset/js/script.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
    <?php
    }else{
         //get password from database
        $data = mysqli_fetch_array($query);
        $pass = $data['password'];
        

        // Check if input values are valid
        if($password === $pass) {
            // display home page
            header("Location: home/home.php");
        } else {
            // If invalid, display login form with error message
            ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="asset/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Login Page -->
        <div class="loginpage position-absolute top-50 start-50 translate-middle">
            <div class="container text-center">
                <div class="row shadow-lg p-3 border rounded-4">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    Password or Username is incorrect
                                </div>
                            </div>
                        </div>
                        <h1 class="px-5 pb-5"> Login </h1>
                        <form class="py-3" method="post" action="">
                            <div class="row px-3 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputusername" class="col-form-label">Username</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="username" id="inputusername" class="form-control" required>
                                </div> 
                            </div>
                            <div class="row px-3 pb-5 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputPassword6" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" name="password" id="inputPassword6" class="form-control" required>
                                </div> 
                            </div>
                            <div class="px-5 d-grid gap-2">
                                <button name="login" class="btn btn-primary" type="submit">Login</button>
                                <button onclick="location.href ='register.php';" class="btn btn-primary" type="button">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="asset/js/script.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
    
<?php
    }
}
} else {
    // If not logged in, display login form
    ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
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

        <!-- Login Page -->
        <div class="loginpage position-absolute top-50 start-50 translate-middle">
            <div class="container text-center">
                <div class="row shadow-lg p-3 border rounded-4">
                    <div class="col">
                        <h1 class="px-5 pb-5"> Login </h1>
                        <form class="py-3" method="post" action="">
                            <div class="row px-3 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputusername" class="col-form-label">Username</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="username" id="inputusername" class="form-control" required>
                                </div> 
                            </div>
                            <div class="row px-3 pb-5 py-3 g-3 align-items-center">
                                <div class="col">
                                    <label for="inputPassword6" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" name="password" id="inputPassword6" class="form-control" required>
                                </div> 
                            </div>
                            <div class="px-5 d-grid gap-2">
                                <button name="login" class="btn btn-primary" type="submit">Login</button>
                                <button onclick="location.href ='register.php';" class="btn btn-primary" type="button">Registrasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="asset/js/script.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

<?php    
}
?>