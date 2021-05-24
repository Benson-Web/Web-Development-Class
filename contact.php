<?php
$fname = $lname = $email = $msg = "";
$fnameErr = $lnameErr = $emailErr = $msgErr = "";

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if ($fname = ""){
        $fnameErr = "First name is empty";
    } else {
        $fname = test_input($_POST["fname"]);
    }
    if ($lname = ""){
        $lnameErr = "Last name is empty";
    } else {
        $lname = test_input($_POST["lname"]);
    }
    if ($email = ""){
        $emailErr = "Email is empty";
    } else {
        $email = test_input($_POST["email"]);
    }
    if ($msg = ""){
        $msgErr = "Message is empty";
    } else {
        $msg = test_input($_POST["msg"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
$to = "benson@kejetia.online";
$subj = "Web Development Master Class";

$message = $msg;

$header = "From: ". $email . $fname;
if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
    echo '<script>alert("Please check the the captcha form")</script>';
    exit;
  }
  $secretKey = "6LcIX-IaAAAAACX-zUBj9iH1wg2k8-Adid7FFShK";
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <script src="script/index.js"></script>
    <title>Contact</title>
</head>
<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>    
    <div class="head">
        <h1>Send a direct email here</h1>

        <div class="tagline">
            <p>You will get a response ASAP</p>
        </div>
    </div>

    <div class="bars" id="bars" onclick="openNav()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <div class="sidenav" id="sidenav">
        <a href="index.html">Home</a>
        <a href="javascript:void(0)" onclick="aboutUs()">About</a>
        <a href="contact.html">Contact</a>
        <a href="lessons.html">Lessons</a>
        <a href="javascript:void(0)" onclick="closeNav()" class="close">&times;</a>
    </div>
    <div class="about" id="about">

        <div id="close">
            <a href="javascript:void(0)"; onclick="closeAbout()">&times;</a>
        </div>
        <div class="info" id="info">
            <h1>About</h1>

            <p class="par">Benson's WebDev Masterclass is a series of classes organized periodically
                in different locations and online.
            </p>
            <p class="par">
                The goal is to create practical web developers who will help the web Development
                community in Ghana grow
            </p>
            <p class="par">
                Our classes are limited to 50 people. This is to facilitate easy use
                and efficient teaching and learning.
            </p>

            <p class="moreInfo">
                For more information, send us an email to <a href="mailto:benson@kejetia.online">benson@kejetia.online</a><br>
                Or call/whatsapp +233560146182
            </p>
        </div>
    </div>
    <div id="comingSoon">
    <?php
        if (mail($to,$subj,$message,$header)) {
            echo "<h2>Email sent!</h2>
            <h3>We will respond ASAP</h3>";
        } else {
            echo "<h2>Email failed to send!</h2>
            <h3>Please try again</h3>";
        }

        echo "<p> ". $fnameErr ."</p>";
        echo "<p> ". $lnameErr ."</p>";
        echo "<p> ". $emailErr ."</p>";
        echo "<p> ". $msgErr ."</p>";
    ?>
</div>

    
</body>
</html>