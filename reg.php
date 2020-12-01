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
    <link rel="stylesheet" href="reg.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/8fbad63d60.js" crossorigin="anonymous"></script>


    <title>CADEN</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
</head>

<body>
    <!-- <h2>If you want us to notify you for future programs,then please register</h2> -->
    <nav class="navbar">
        <ul class="navbar_menu">
            <li class="logo"><a href="http://localhost:8080/nasa-web/home.html"><img src="images/logo1.png"></a></li>
            <li><a href="http://localhost:8080/nasa-web/home.html">Home</a></li>
            <li><a href="http://localhost:8080/nasa-web/ak.php">Akshat Mohite</a></li>
            <li><a href="http://localhost:8080/nasa-web/enroll.php">Enroll</a></li>
            <li><a href="http://localhost:8080/nasa-web/cont.html">Contact</a></li>
            <li><a href="http://localhost:8080/nasa-web/reg.php">Register</a> </li>
        </ul>
    </nav>

    <div class="container-1" id="blur">

        <div class="form">
            <form action="reg.php" method="POST">
                <div class="form-group">
                    <h3>Name</h3>
                    <input type="text" class="form-control" name="username" id="nameFormControlInput1" placeholder="what's your name">
                </div>
                <div class="form-group">
                    <h3>Mobile no</h3>
                    <input type="number" class="form-control" name="mobile" id="nameFormControlInput1" placeholder="what's mobile no">
                </div>
                <div class="form-group">
                    <h3 for="exampleFormControlInput1">Email address</h3>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="your@mail.com">
                </div>
                <button name="reg_btn" class="btn">Submit</button>

            </form>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script text="text/javascript">
        const realFileBtn = document.getElementById("real-file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if (realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(
                    /[\/\\]([\w\d\s\.\-\(\)]+)$/
                )[1];
            } else {
                customTxt.innerHTML = "No file chosen, yet.";
            }
        });
    </script>



</body>

</html>
<?php

if (isset($_POST['reg_btn'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];


    if ((empty($username)) or (empty($mobile)) or (empty($email))) {

        echo '<script>
    alert("Please fill all fields are required 😑❗")
</script>';

        // print_r($pic);


    } else {

        $insertquery = "insert into register (username,mobile,email) values ('$username','$mobile','$email')";

        $query = mysqli_query($conn, $insertquery);

        if ($query) {
            echo "Inserted";
            echo '<script>
    alert("THANK YOU ' . $username . ' 😇")
</script>';

            error_reporting(0);
        } else {
            echo "not inserted";
        }
        header('location:home.html');
    }
} else {
}





?>