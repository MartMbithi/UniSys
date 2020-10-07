<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 May 2020 13:00:15 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>UniSys | Students Records Management Module</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
  <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

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
<!-- AJAX -->
<script>
  function getCourseDetails(val) {
    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'courseName=' + val,
      success: function(data) {
        //alert(data);
        $('#Course_Id').val(data);
      }
    });

  }

  function getFacultyDetails(val) {
    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'facultyName=' + val,
      success: function(data) {
        //alert(data);
        $('#facultyID').val(data);
      }
    });

    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'facultyId=' + val,
      success: function(data) {
        //alert(data);
        $('#facultyCode').val(data);
      }
    });

  }

  function getUnitDetails(val) {
    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'UnitCode=' + val,
      success: function(data) {
        //alert(data);
        $('#unitName').val(data);
      }
    });
  }

  function getStudentDetails(val) {
    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'RegNumber=' + val,
      success: function(data) {
        //alert(data);
        $('#StudentName').val(data);
      }
    });

    $.ajax({

      type: "POST",
      url: "ajax.php",
      data: 'StudentName=' + val,
      success: function(data) {
        //alert(data);
        $('#StudentID').val(data);
      }
    });
  }
</script>
</head>