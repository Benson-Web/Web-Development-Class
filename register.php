<?php
$fname = $lname = $email = $pnumber = $pnumber = $city = $town = "";
$fnameErr = $lnameErr = $emailErr = $pnumberErr = $pnumberErr = $cityErr = $townErr = "";

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
    if ($pnumber = ""){
        $pnumberErr = "Phone number name is empty";
    } else {
        $pnumber = test_input($_POST["pnumber"]);
    }
    if ($city = ""){
        $cityErr = "City is empty";
    } else {
        $city = test_input($_POST["city"]);
    }
    if ($town = ""){
        $townErr = "Town is empty";
    } else {
        $town = test_input($_POST["town"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sendTo = $email;
  $subject = "Response Recieved";
  $htmlContent = file_get_contents("emailmsg.html");
  $headers  = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers = "From: benson@kejetia.online";
  
  mail($sendTo,$subject,$htmlContent,$headers);
  
$to = "benson@kejetia.online";
$subj = "Web Development Master Class";

$message = "Last Name: ". $lname ."\r\n";
$message .= "First Name: ". $fname ."\r\n";
$message .= "Email: ". $email. "\r\n";
$message .= "Phone Number: ". $pnumber. "\r\n";
$message .= "City : ". $city. "\r\n";
$message .= "Town : ". $town. "\r\n";

$header = "From: ". $email . $fname;

if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
    echo '<h2>Please check the the captcha form.</h2>';
    exit;
  }
  $secretKey = "6LcIX-IaAAAAACX-zUBj9iH1wg2k8-Adid7FFShK";
  $ip = $_SERVER['REMOTE_ADDR'];
  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
  // should return JSON with success as true
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Register for class</title>
</head>
<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>    
    <div class="head">
        <h1>Benson's WebDev <br>Masterclass</h1>

        <div class="tagline">
            <p>Web Development made simple</p>
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
    <div class="whatsapp" onclick="openContacts()">
        <a href="javascipt:void(0)" >
           .
        </a>
</div>

<div id="contactDetails" >
    <div class="contactInfo">
        <a href="mailto:benson@kejetia.online"><i class="fa fa-envelope"></i>Email</i></a>
        <a href="https://wa.me/+233560146182"><i class="fa fa-whatsapp"></i>WhatsApp </i></a>
        <a href="tel:+233560146182" > <i class="fa fa-phone"></i> Call</a>
        <a href="javascript:void(0)" onclick="closeContacts()" style="background-color: transparent; color: red; text-align: center;">Close</a>
    </div>
</div>


<div id="comingSoon">
    <?php
        if (mail($to,$subj,$message,$header) && $responseKeys["success"]) {
            echo "<h2>Response sent successfully!</h2>
            <h3>We will respond ASAP</h3>";
        } else {
            echo "<h2>Email failed to send!</h2>
            <h3>Please try again</h3>";
        }

        if (!$responseKeys["success"]) {
            echo "<h3>Please check captcha</h3>";
        }
    ?>
</div>


<div class="footer">
    <p>Created by <i>Benson</i></p>
</div>
</body>
</html>