<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>UniSys | Hostel Information Management Module</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
  <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
  <link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
  <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
  <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
  <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
  <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_multiple_tables.css">
  <link href="assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
  <!-- SWAL ALERTS INJECTION-->
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

    function getBookDetails(val) {
      $.ajax({

        type: "POST",
        url: "ajax.php",
        data: 'bookIsbn=' + val,
        success: function(data) {
          //alert(data);
          $('#bookTitle').val(data);
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
    }
  </script>
</head>