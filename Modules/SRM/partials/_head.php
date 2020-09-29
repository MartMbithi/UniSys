<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>UniSys - Students Records Management Module</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="css/meanmenu.min.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="css/educate-custon-icon.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="css/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>

   <!-- SWEET ALERTS
		============================================ -->
  <script src="js/sweetalerts/promise-polyfill.js"></script>
  <link href="js/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="js/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
  <script src="js/sweetalerts/sweetalert2.min.js"></script>
  <script src="js/sweetalerts/custom-sweetalert.js"></script>
  
  <!-- SWAL ALERTS INJECTION
		============================================ -->
  <?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
      setTimeout(function() {
          swal({
            title: 'Success',
            text: "<?php echo $success; ?>",
            type: 'success',
            padding: '2em'
          })
        },
        100);
    </script>

  <?php } ?>
  <?php if (isset($err)) { ?>
    <!--This code for injecting error alert-->
    <script>
      setTimeout(function() {
          swal("Failed", "<?php echo $err; ?>", "error");
        },
        100);
    </script>

  <?php } ?>
  <?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
      setTimeout(function() {
          swal("Success", "<?php echo $info; ?>", "info");
        },
        100);
    </script>

  <?php } ?>
</head>