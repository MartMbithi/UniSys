<?php require_once('partials/_head.php'); ?>

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
                        <form id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username | Email | Staff Number</label>
                                <input type="text" placeholder="" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="checkbox login-checkbox">
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Reset Password</button>
                            <a class="btn btn-default btn-block" href="index.php">Login</a>
                        </form>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_auth-footer.php');?>
        </div>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>