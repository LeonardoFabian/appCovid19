
<?php 
/*
  session_start();
*/
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>APP COVID-19 | Programa de Infectados</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon -->
  <link rel="icon" href="views/images/template/logo-mini.svg">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- Signo Zodiacal style -->
  <link rel="stylesheet" href="views/dist/css/zodiaco.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- DataTable Responsive -->  

  <!-- Sweet Alert 2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

<!-- Site wrapper -->
  <?php

  

      echo '<div class="wrapper">';

      include "modules/header.php";
      include "modules/menu.php";

      if(isset($_GET["route"])){
        if(
          $_GET["route"] == "inicio" ||
          $_GET["route"] == "infectados" ||
          $_GET["route"] == "single"
        ){
          include "modules/".$_GET["route"].".php";
        } else {
          include "modules/404.php";
        }
      } else {
        include "modules/inicio.php";
      }
      
      include "modules/footer.php";

    echo '</div>';

    

  ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="views/dist/js/demo.js"></script>-->
<!-- DataTables -->
<script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTable Responsive -->
<script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>


<script src="views/js/template.js"></script>
<script src="views/js/infectados.js"></script>
</body>
</html>