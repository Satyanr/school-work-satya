<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../asset/css/tambahsiswastyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="no-scroll" onload="load()">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Load Page -->
        <div id="loadpage" class="loadpage">
            <div class="spinner-grow text-primary position-absolute top-50 start-50 translate-middle" style="width: 6rem; height: 6rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- main content full height -->
        <div class="main-content shadow text-center" style="height: 100%;">
            <!-- header -->
            <header class="p-3 bg-primary rounded-bottom-5">
                <h2 class="text-light">
                    Tambah Siswa
                </h2>
            </header>

                <!-- content -->
            <section class ="container">
                <div class="content p-3">
                    <form action="" method="POST" class="shadow w-100" enctype="multipart/form-data">
                        <div class="row py-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <div class="text-center">
                                <img id="image-preview" class="rounded mx-auto d-block w-100" src="../image/sample.jpg" alt="Image preview">
                                <br>
                                <input id="file-input" type="file" accept="image/*" name="imagestudents" value="">
                                </div>
                            </div>
                        </div>
                    <div class="row py-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="nama" class="form-label"><h4>Nama</h4></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="row gx-4 py-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="nis" class="form-label"><h4>NIS</h4></label>
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS">
                            </div>
                            <div class="col-md-3">
                                <label for="nisn" class="form-label"><h4>NISN</h4></label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                            </div>
                        </div>
                        <div class="row gx-4 py-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="kelas" class="form-label"><h4>Kelas</h4></label>
                                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                            </div>
                            <div class="col-md-3">
                                <label for="jurusan" class="form-label"><h4>Jurusan</h4></label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan">
                            </div>
                        </div>
                        <div class="row py-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <label for="ttl" class="form-label"><h4>Tempat Tanggal Lahir</h4></label>
                                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan TTL">
                            </div>
                            <div class="col-md-3">
                                <label for="alamat" class="form-label"><h4>Alamat</h4></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="row py-3 d-flex justify-content-center">
                            <div class="col-sm-2">
                                <label for="kelamin" class="form-label"><h4>Jenis Kelamin</h4></label>
                                <select name="kelamin" class="form-select" aria-label="Default select example">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Prempuan">Prempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-3 d-flex justify-content-center">
                            <div class="col-sm-2">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" name="tambahkan" type="submit">Tambahkan</button>
                                <button onclick="location.href ='daftarsiswa.php';" class="btn btn-primary" type="button">Batalkan</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <?php
            if(isset($_POST['tambahkan'])) {
                $id = uniqid('students_');
                $name = $_POST['nama'];
                $nis = $_POST['nis'];
                $nisn = $_POST['nisn'];
                $kelas = $_POST['kelas'];
                $jurusan = $_POST['jurusan'];
                $ttl = $_POST['ttl'];
                $alamat = $_POST['alamat'];
                $kelamin = $_POST['kelamin'];
                $filename = $_FILES["imagestudents"]["name"];
                $tempname = $_FILES["imagestudents"]["tmp_name"];
                $folder = "../image/" . $filename;
                

                include_once("../asset/php/koneksi.php");
                        

                $sql = "INSERT INTO students_tbl(students_id,NISN,NIS,name,grade,major,date_of_birth,domicile,gender,photo) VALUES('$id','$nisn','$nis','$name','$kelas','$jurusan','$ttl','$alamat','$kelamin','$filename')";
                $query = mysqli_query($conn, $sql);

                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    
                }

            }

            ?>

        <script src="../asset/js/tambahsiswascript.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>