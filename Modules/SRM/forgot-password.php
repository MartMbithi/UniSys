<?php
session_start();
include('configs/config.php');
include('configs/codeGen.php');

if (isset($_POST['reset'])) {
    if (!filter_var($_POST['auth_email'], FILTER_VALIDATE_EMAIL)) {
        $err = 'Invalid Email';
    }
    $checkEmail = mysqli_query($mysqli, "SELECT `auth_email` FROM `UniSys_Auth` WHERE `auth_email` = '" . $_POST['auth_email'] . "'") or exit(mysqli_error($mysqli));
    if (mysqli_num_rows($checkEmail) > 0) {
        //exit('This email is already being used');
        //Reset Password
        $email = $_POST['auth_email'];
        $new_pass = $_POST['new_pass'];
        $query = "INSERT INTO UniSys_PassResets (email, new_pass) VALUES (?,?)";
        $reset = $mysqli->prepare($query);
        $rc = $reset->bind_param('ss', $email, $new_pass);
        $reset->execute();
        if ($reset) {
            $success = "Password Reset Instructions Sent To Your Email";
            // && header("refresh:1; url=index.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    } else {
        $err = "No account with that email";
    }
}

require_once('partials/_head.php');
?>

<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>UniSys</h3>
                <p>Students Records Management Module</p>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" name="email" require class="form-control">
                                <input type="hidden" name="new_pass" value="<?php echo $a;?><?php echo $b;?>" require class="form-control">
                            </div>
                            <div class="checkbox login-checkbox">
                            </div>
                            <button type="submit" name="reset" class="btn btn-success btn-block loginbtn">Reset Password</button>
                            <a class="btn btn-default btn-block" href="index.php">Login</a>
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