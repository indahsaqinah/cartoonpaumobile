<?php
if (isset($_POST["submit"])) {
    include 'dbconnect.php';
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$pass'");
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('php/mainpage.php')</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
    }
}
?>

<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2019.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="../js/script.js"></script>
    <title>Frozen Cartoon Pau - Login</title>
</head>

<body>
    
    <div class="w3-main w3-2019-sweet-corn">
        
        <div class="w3-header w3-display-container w3-2019-creme-de-peche w3-padding-8 w3-center">
            <img src="res/logo.png" alt="Trulli" width="280" height="180" class="responsive">    
        </div>

        <div class="w3-container w3-padding-64 form-container">
            <div class="w3-card-4 w3-round">
                <div class="w3-container w3-2019-creme-de-peche">
                    <h2 class="w3-center">Login</h2>
                </div>

                <form name="loginForm" id="loginForm" class="w3-container w3-white" action="login.php" method="post">
                    <p>
                        <label class="w3-text-black"><b>Email</b></label>
                        <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
                    </p>
                    <p>
                        <label class="w3-text-black"><b>Password</b></label>
                        <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" required>
                    </p>
                    <p>
                        <input class="w3-check" type="checkbox" id="idremember" name="remember" onclick="rememberMe()">
                        <label>Remember Me</label>
                    </p>
                    <p>
                        <button class="w3-btn w3-round w3-2019-creme-de-peche w3-block" name="submit">Login</button>   
                    </p>
                </form>
            </div>
        </div>
    </div>
                    
    <footer class="w3-container w3-2019-creme-de-peche w3-center">
            <p>Powered by FROZEN CARTOON PAU</p>        
    </footer>
        
</body>
</html>