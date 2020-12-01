<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webinar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
} else {
    // die("Connection failed because" . mysqli_connect_error());
    error_reporting(0);
}

?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CADEN</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-ll col-12">
                <div class="table-responsive">
                    <table class="table-striped text-center table-bordered ">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="py-3 text-white">id</th>
                                <th class="py-3 text-white">Name</th>
                                <th class="py-3 text-white">Mobile no</th>
                                <th class="py-3 text-white">Whatsappno</th>
                                <th class="py-3 text-white">Email</th>
                                <th class="py-3 text-white">Reference Name</th>
                                <th class="py-3 text-white">Proof Pictures</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php

                            $selectquery = "select * from web ";

                            $query = mysqli_query($conn, $selectquery);

                            $result = mysqli_fetch_array($query);

                            while ($result = mysqli_fetch_array($query)) {

                            ?>

                                <tr>
                                    <td> <?php echo $result['id'] ?> </td>

                                    <td> <?php echo $result['username'] ?> </td>

                                    <td> <?php echo $result['mob'] ?> </td>

                                    <td> <?php echo $result['whatsapp'] ?> </td>

                                    <td> <?php echo $result['email'] ?> </td>

                                    <td> <?php echo $result['refname'] ?> </td>

                                    <td> <img src="<?php echo $result['pic'] ?>" alt="image" width="300" height="200"></td>
                                </tr>

                            <?php
                            }
                            ?>


                        </tbody>


                    </table>

                </div>

            </div>

        </div>
    </div>

</body>

</html>