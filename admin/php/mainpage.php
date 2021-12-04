<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('../login.php')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/script.js"></script>
    <title>Frozen Cartoon Pau - Main Page</title>

    
</head>

<body>
    <div class="w3-main w3-2019-sweet-corn body">
        <div class="w3-header w3-display-container w3-2019-creme-de-peche w3-padding-8 w3-center">
            <img src="../res/logo.png" alt="Trulli" width="280" height="180" class="responsive">    
        </div>

        <div class="w3-bar w3-white">
            <a href="../../index.html" class="w3-bar-item w3-button w3-right">Logout</a>
        </div>

    </div>

    <footer class="w3-footer w3-container w3-center w3-2019-creme-de-peche">
        <p>Powered by FROZEN CARTOON PAU</p>
    </footer>

</body>
</html>
