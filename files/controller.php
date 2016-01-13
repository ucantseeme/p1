<?php
$user = new User();
// var_dump($user);

if($_POST){
  if(isset($_POST['register'])){
    // echo "request from register page";die;
    $uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
    $email =filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    // $user_captcha = $_POST['captcha'];
    // $real_captcha = $_GET['xxz4asdc65cffd4edddff563'];

    // if($pass != $cpass){
    //   echo "<script>alert('Passwords not matching! Please try again.');</script>";
    // }elseif($user_captcha != $real_captcha){
    //   echo "<script>alert('Simple Spam Checker: Value not correct!');</script>";
    // }else{
    $result = $user->register($uname, $pass, $email, $name);
    // }

    echo '
    <div class="row">
    <div class="col-lg-12">
    <div class="intro-text">
    <center><span class="name" style="color: #18BC9C !important"><h2>Registration successful!</h2></span></center>
    <center><span class="skills">Congratulations! You are registered to our system.</span></center>
    <hr class="star-light">
    <center><span class="skills"><a href="#login">Login here!</a></span></center>
    </div>
    </div>
    </div>
    ';
  }elseif(isset($_POST['contact'])){
    if(empty($_POST['name'])  ||
    empty($_POST['email']) 		||
    empty($_POST['phone']) 		||
    empty($_POST['message'])	||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
      echo "No arguments Provided!";
      return false;
    }

    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Create the email and send the message
    $to = 'iamsarthakjoshi@gmail.com'; // This is where the form will send a message to.
    $email_subject = "Inquiry by:  $name";
    $email_body = "You have received a new message from your Aspiring Innovation contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: noreply@aspiringinnovation.com.np\n"; // This is the email address the generated message will be from.
    $headers .= "Reply-To: $email_address";
    // mail($to,$email_subject,$email_body,$headers);

    if(mail($to,$email_subject,$email_body,$headers)){
      echo '
      <div class="row">
      <div class="col-lg-12">
      <div class="intro-text">
      <center><span class="name" style="color: #18BC9C !important"><h2>Message sent successfully!</h2></span></center>
      <center><span class="skills">I will get back to you as soon as possile.</span></center>
      <hr class="star-light">
      <center><span class="skills"><a href="#login">Login here!</a></span></center>
      </div>
      </div>
      </div>
      ';
      return true;
    }else{
      echo '
      <div class="row">
      <div class="col-lg-12">
      <div class="intro-text">
      <center><span class="name" style="color: red !important"><h2>Message not sent!</h2></span></center>
      <center><span class="skills">Something is wrong. Please try again later.</span></center>
      <hr class="star-light">
      <center><span class="skills"><a href="#login">Login here!</a></span></center>
      </div>
      </div>
      </div>
      ';
    }
  }
}

?>
