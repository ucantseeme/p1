<?php
include("config/config.php");
include("config/autoload.php");
$db = new Db();
// var_dump($db->connect());die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
  <script>
  $(function() {
    $( "#accordion" ).accordion({
      active: 1
    });
    $( "#datepicker" ).datepicker();
  });
  </script>
  <style media="screen">
  #book_by_id, #book_by_name, #book_by_author, #book_by_name_author{
    display: none;
  }
  </style>
</head>

<body id="page-top" class="index">
  <nav class="navbar navbar-default navbar-fixed-top">
    <?php include('includes/nav.php'); ?>
  </nav>

  <header>
    <?php include('includes/header.php'); ?>
  </header>

  <!-- Home-Grid Section -->
  <section id="portfolio">
    <div class="container">
      <?php
      if(isset($_GET['action']) && !empty($_GET['action'])){
        $file = "files/" . $_GET['action'] . ".php";
        //echo $file;
        if(file_exists($file)){
          include($file);
        }else{
          include("files/home.php");
        }
      }else{
        include("files/home.php");
      }
      ?>
    </div>
  </section>

  <!-- About Section -->
  <section class="success" id="about">
    <?php include('files/about.php'); ?>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <?php include('files/contact.php'); ?>
    </div>
  </section>

  <!-- Login Section -->
  <section class="success" id="search">
    <?php include('files/search.php'); ?>
  </section>

  <!-- SignUp Section -->
  <section id="signup">
    <?php include('files/register.php'); ?>
  </section>
  <!-- Footer -->
  <footer class="text-center">
    <?php include('includes/footer.php'); ?>
  </footer>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-top page-scroll visible-xs visible-sm">
    <a class="btn btn-primary" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->
  <?php include('files/modals.php'); ?>

  <!-- Bootstrap Core JavaScript -->
  <script src="assets/js/bootstrap.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/cbpAnimatedHeader.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="assets/js/jqBootstrapValidation.js"></script>
  <script src="assets/js/contact_me.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="assets/js/freelancer.js"></script>

  <!-- For google map -->
  <script src="assets/js/googleapis.js"></script>

  <!-- jQuery UI plugins resources -->
  <script src="assets/js/jquery-ui.js"></script>

  <!-- Include summernote js-->
  <script src="assets/js/summernote.js"></script>

  <!-- Simple jQuery Image Slider js -->
  <script src="assets/js/sss.js"></script>

  <!-- Custom Jquery Script -->
  <script src="assets/js/myscript.js"></script>
</body>
</html>
