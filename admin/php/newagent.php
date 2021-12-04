<?php
session_start();

if (isset($_POST["submit"])) {
    include_once("../dbconnect.php");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $sqlregister = "INSERT INTO `tbl_agent`(`name`, `email`, `phone`, `address`) VALUES('$name', '$email', '$phone', '$address')";
    
    try {
        $conn->exec($sqlregister);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
            uploadImage($phone);
        }
        echo "<script>window.location.replace('registersuccessful.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration failed')</script>";
        echo "<script>window.location.replace('newagent.php')</script>";
    }
}

function uploadImage($id) {
    $target_dir = "../res/users/";
    $target_file = $target_dir . $id . ".jpg";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/script.js"></script>
    <title>Frozen Cartoon Pau - New Agent Registration</title>
</head>

<body>

    <div class="w3-main w3-2019-sweet-corn">

        <div class="w3-header w3-display-container w3-2019-creme-de-peche w3-padding-8 w3-center">
            <img src="../res/logo.png" alt="Trulli" width="280" height="180" class="responsive">    
        </div>

        <div class="w3-container w3-padding-64 form-container">
            <div class="w3-card">
                <div class="w3-container w3-2019-creme-de-peche w3-center">
                    <h3>New Agent Registration</h3>
                </div>

                <form class="w3-container w3-padding w3-white" name="registerForm" action="newagent.php" method="post" enctype="multipart/form-data" onsubmit="return confirmDialog()" >
                    <p>
                        <div class="w3-container w3-border w3-center w3-padding">
                            <img class="w3-image w3-round" src="../res/users/profile.png" style="width:100%; max-width:200px"><br>
                            <input class="w3-margin" type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                        </div>
                    </p>
                    <p>
                        <label><b>Name</b></label>
                        <input class="w3-input w3-border w3-round" type="text" placeholder="Enter Name" name="name" id="idname" required>
                    </p>
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-border w3-round" type="email" placeholder="Enter Email" name="email" id="idemail" required>
                    </p>
                    <p>
                        <label><b>Phone No.</b></label>
                        <input class="w3-input w3-border w3-round" type="phone" placeholder="Enter Phone No" name="phone" id="idphone" required>
                    </p>
                    <p>
                        <label><b>Address</b></label>
                        <textarea class="w3-input w3-border w3-border w3-round" placeholder="Enter Adress" id="idaddress" name="address" required></textarea>
                    </p>

                    <div class="row">
                        <input class="w3-input w3-border w3-block w3-2019-creme-de-peche w3-round" type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="w3-container w3-2019-creme-de-peche w3-center">
        <p>Powered by FROZEN CARTOON PAU</p>        
    </footer>

</body>

</html>