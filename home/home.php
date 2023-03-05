<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../asset/css/homestyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- get data from data base -->
        <?php
        include'../asset/php/koneksi.php';
        // Query to get count of male people
        $sql = "SELECT COUNT(*) AS total_male FROM students_tbl WHERE gender='Laki-Laki'";
        $result = mysqli_query($conn, $sql);

        // Query to get count of female people
        $sqlfemale = "SELECT COUNT(*) AS total_female FROM students_tbl WHERE gender='Prempuan'";
        $female = mysqli_query($conn, $sqlfemale);

        if(mysqli_num_rows($result) > 0) {
            // Fetching result
            $row = mysqli_fetch_assoc($result);
            $total_male = $row['total_male'];

            //fetching result female
            $femaler = mysqli_fetch_assoc($female);
            $total_female = $femaler ['total_female']
            
            ?>
            <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Gender');
                data.addColumn('number', 'Slices');
                data.addRows([
                ['Laki-Laki', <?php echo "$total_male"; ?>],
                ['Perempuan', <?php echo "$total_female"; ?>]
                ]);

                // Set chart options
                var options = {'title':'Jenis Kelamin Siswa',
                            'width':400,
                            'height':300};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
            </script>
        <?php
        }

        // Closing database connection
        mysqli_close($conn);
        ?>
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

        <!-- Sidebar -->
        <div class="container-fluid">
            <!-- row full height -->
            <div class="row" style="height: 100vh;">
                <!-- sidebar 2 column -->
                <div class="col-2 text-center shadow-lg">
                    <!-- sidebar full height -->
                    <div class="sidebar" style="height: 100%;">
                        <!-- sidebar brand -->
                        <div class="sidebar-brand py-5">
                            <h2 class="text-wrap"><span class="Admin "></span><span>Admin</span></h2>
                        </div>
                        <!-- sidebar menu -->
                        <div class="sidebar-menu list-group list-group-flush text-center fw-bolder fs-5 object-fit-none">
                            <a href="#" class="list-group-item list-group-item-action active py-3 rounded-3"><span class="las la-igloo"></span>
                               <span class="text-wrap" >Dashboard</span></a>

                            <a href="daftarsiswa.php" class="list-group-item list-group-item-action py-3 rounded-3"><span class="las la-users"></span>
                               <span class = "text-wrap"> Daftar Siswa</span></a>

                            <a href="#" class="list-group-item list-group-item-action py-3 rounded-3"><span class="las la-cog"></span>
                                <span class="text-wrap">Logout</span></a>
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
                                Dashboard
                            </h2>
                        </header>

                        <!-- main -->
                        <section class="p-5">
                            <!-- pie chart -->
                            <div id="chart_div"></div>
                        </section>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="../asset/js/homescript.js" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>