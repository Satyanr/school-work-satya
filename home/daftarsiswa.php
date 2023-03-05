<?php
// Create database connection using config file
include_once("../asset/php/koneksi.php");
 
// Fetch all users data from database
$sql = "SELECT * FROM students_tbl ORDER BY students_id DESC";
$result = mysqli_query($conn, $sql);
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
        <title>Daftar Siswa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../asset/css/siswastyle.css">
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

        <!-- Sidebar -->
        <div class="container-fluid">
            <!-- row full height -->
            <div class="row" style="height: 100vh;">
                <!-- sidebar 2 column -->
                <div class="col-2 shadow-lg">
                    <!-- sidebar full height -->
                    <div class="sidebar" style="height: 100%;">
                        <!-- sidebar brand -->
                        <div class="sidebar-brand p-5">
                            <h2><span class="Admin "></span><span>Admin</span></h2>
                        </div>
                        <!-- sidebar menu -->
                        <div class="sidebar-menu list-group list-group-flush text-center fw-bolder fs-5">
                            <a href="home.php" class="list-group-item list-group-item-action py-3 rounded-3"><span class="las la-igloo"></span>
                               <span>Dashboard</span></a>

                            <a href="#" class="list-group-item list-group-item-action active py-3 rounded-3"><span class="las la-users"></span>
                               <span>Daftar Siswa</span></a>

                            <a href="#" class="list-group-item list-group-item-action py-3 rounded-3"><span class="las la-cog"></span>
                                <span>Logout</span></a>
                        </div>
                    </div>
                </div>
                <!-- main content 10 column -->
                <div class="col-10">
                    <!-- main content full height -->
                    <div class="main-content shadow text-center" style="height: 100%;">
                        <!-- header -->
                        <header class="p-3 bg-primary rounded-bottom-5">
                            <h2 class="text-light">
                                Daftar Siswa
                            </h2>
                        </header>


                        <!-- main -->
                        <section class="p-5">
                            <div class= "row py-3">
                                <div class="col-md-6">
                                </div>
                                <div class=" col-auto">
                                    <a href="tambahsiswa.php" class="btn btn-primary">Tambah Siswa</a>
                                </div>
                                <div class="col-md-4">
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class= "row shadow py-2">
                                <div class=" col">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <tr> 
                                        <?php  
                                            while($user_data = mysqli_fetch_array($result)) {         
                                                echo "<tr class='table-light'>";
                                                echo "<td>".$user_data['NIS']."</td>";
                                                echo "<td>".$user_data['name']."</td>";
                                                echo "<td>".$user_data['grade']."</td>";
                                                echo "<td>".$user_data['major']."</td>";
                                                echo "<td>";
                                                ?>
                                                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#detailsiswamodal">Detail</button>
                                                <a href='<?php echo "delete.php?id=$user_data[students_id]"?>' class="btn btn-danger">Hapus</a>           
                                           <?php
                                           echo "</td>
                                           </tr>";
                                            }
                                            ?>
                                    </table>
                                </div>
                            </div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>




        <!-- details modal -->
        <div class="modal fade" id="detailsiswamodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            <!-- content -->
                            <div class="content p-3 text-center">
                                <form action="" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" readonly>
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
                                </form>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
        </div>
        

        <script src="../asset/js/siswascript.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>