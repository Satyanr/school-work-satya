<?php
        include'../asset/php/koneksi.php';
        // Query to get count of male people
        $sqlmale = "SELECT COUNT(*) AS total_male FROM students_tbl WHERE gender='Laki-Laki'";
        $male = mysqli_query($conn, $sqlmale);

        // Query to get count of female people
        $sqlfemale = "SELECT COUNT(*) AS total_female FROM students_tbl WHERE gender='Prempuan'";
        $female = mysqli_query($conn, $sqlfemale);

        if(mysqli_num_rows($female) > 0) {
            // Fetching male
            $rowmale = mysqli_fetch_assoc($male);
            $total_male = $rowmale['total_male'];

            //fetching female
            $rowfemale = mysqli_fetch_assoc($female);
            $total_female = $rowfemale['total_female'];

            echo "$total_female";
        }

        // Closing database connection
        mysqli_close($conn);
        ?>