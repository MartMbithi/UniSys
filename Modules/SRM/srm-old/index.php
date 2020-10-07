<?php
session_start();
include('configs/config.php');

if (isset($_POST['login'])) {
    $auth_email = $_POST['auth_email'];
    $auth_password = sha1(md5($_POST['auth_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT auth_email, auth_number, auth_password, auth_id  FROM UniSys_Auth  WHERE (auth_email =? || auth_number =? AND auth_password =?)");
    $stmt->bind_param('sss', $auth_email, $auth_email, $auth_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($auth_email, $auth_email, $auth_password, $auth_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['auth_id'] = $auth_id;
    if ($rs) {
        header("location:dashboard.php");
    } else {
        $err = "Access Denied Please Check Your Credentials";
    }
}
require_once('partials/_head.php');
?>

<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <img src="img/logo/logo-dark.png" class="img-fluid" alt="">
                <p>Students Records Management Module</p>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Staff Email | Staff Number</label>
                                <input type="text" required name="auth_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" required name="auth_password" class="form-control">
                            </div>
                            <div class="checkbox login-checkbox">
                            </div>
                            <input type="submit" name="login" class="btn btn-success btn-block loginbtn" value="Login">
                            <a class="btn btn-default btn-block" href="forgot-password.php">Forgot Password</a>
                        </form>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_auth-footer.php'); ?>
        </div>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>