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
<!--  style="text-decoration: none;color: black; font-family: 'Alegreya', serif;" -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="enroll.css" />
    <title>CADEN</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar">
        <ul class="navbar_menu">
            <li class="logo"><a href="/home.html"><img src="images/logo1.png"></a></li>
            <li><a href="/home.html">Home</a></li>
            <li><a href="/ak.php">Akshat Mohite</a></li>
            <li><a href="/enroll.php">Enroll</a></li>
            <li><a href=" /cont.html">Contact </a> </li>
            <li><a href="/reg.php">Register</a> </li>
        </ul>
    </nav>
    <div class="container-1" id="blur">
        <div class="form">
            <form action="enroll.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <h3>Name</h3>
                    <input type="text" class="form-control" name="username" id="nameFormControlInput1" placeholder="what's your name">
                </div>
                <div class="form-group">
                    <h3>Mobile no</h3>
                    <input type="number" class="form-control" name="mob" id="nameFormControlInput1" placeholder="what's mobile no">
                </div>
                <div class="form-group">
                    <h3>Whatsapp no</h3>
                    <input type="number" class="form-control" name="whatsapp" id="nameFormControlInput1" placeholder="what's whatsapp  no">
                </div>
                <div class="form-group">
                    <h3 for="exampleFormControlInput1">Email address</h3>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="your@mail.com">
                </div>
                <div class="form-group">
                    <h3>Reference name</h3>
                    <input type="text" class="form-control" name="refname" id="nameFormControlInput1" placeholder="Name / NA">
                </div>
                <div class="payment_detail">
                    <h3>Payment Detail</h3>
                    <input class="form-control" type="text" placeholder="₹4000" readonly>
                    <p>UPI id - 9702380567@paytm</p>
                    <p>Account no-</p>
                    <p>IFSC code -</p>
                    <p> Note : You have to pay ₹4000 for 1st month (Total Fee:₹8000)</p>
                </div>
                <div class="file_upload">
                    <h3>Screenshot Proof</h3>
                    <input type="file" name="pic" id="real-file" hidden="hidden" />
                    <button type="button" id="custom-button">CHOOSE A FILE</button>
                    <span id="custom-text">No file chosen, yet.</span>
                    <p>Note : You have to upload screenshot of transaction. </p>
                </div>
                <div class="form-check">☑
                    I agree to <a onclick="toggle()">Terms&Conditions</a>.
                    </label>

                </div>
                <button name="form_sub" class="btn">Submit</button>

            </form>
        </div>
    </div>

    <div class="modal-bg">
        <div class="modal">
            <p>No refund</p>
            <p>The user should have internet access</p>
            <p>appropriate device for lecture</p>
            <p>Lecture on saturday & sunday evening</p>
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

    <script>
        function toggle() {
            alert(" 🤔 What's our Term and Condition? \n No refund.\nThe user should have internet access.\nThe user shoul have appropriate device for lecture Lecture on saturday & sunday evening ");
        }
    </script>


</body>

</html>

<?php



if (isset($_POST['form_sub'])) {
    $username = $_POST['username'];
    $mob = $_POST['mob'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $refname = $_POST['refname'];
    $pic = $_FILES['pic'];

    if ((empty($username)) or (empty($mob)) or (empty($whatsapp)) or (empty($email)) or (empty($pic)) or empty($refname)) {

        echo '<script>alert("Please fill all fields are required 😑❗")</script>';

        // print_r($pic);


    } else {
        $filename = $pic['name'];
        $filepath = $pic['tmp_name'];
        // $filerror = $file['error'];

        // if ($filerror == 0) {
        $destfile = 'upload/' . $filename;
        // echo "$destfile";
        move_uploaded_file($filepath, $destfile);

        $insertquery = "insert into web(username,mob,whatsapp,email,refname,pic) values ('$username','$mob','$whatsapp','$email','$refname','$destfile')";

        $query = mysqli_query($conn, $insertquery);

        if ($query) {
            echo "Inserted";
            echo '<script>alert("THANK YOU ' . $username . ' 😇")</script>';

            error_reporting(0);
        } else {
            echo "not inserted";
        }
        // header('location:home.php')
    }
} else {
}





?>
