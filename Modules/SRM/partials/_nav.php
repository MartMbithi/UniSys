<?php
$auth_id = $_SESSION['auth_id'];
$ret = "SELECT * FROM `UniSys_Staffs` WHERE auth_id ='$auth_id' ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($staff = $res->fetch_object()) {
    if ($staff->passport == '') {
        $passport = "<img src='assets/img/boy.png' alt='avatar'>";
    } else {
        $passport = "<img src='assets/img/$staff->passport' alt='avatar'>";
    } ?>
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item theme-brand flex-row  text-center">
            <!--  <li class="nav-item theme-logo">
                <a href="dashboard.php">
                    <img src="assets/img/logo.png" class="navbar-logo" alt="logo">
                </a>
            </li> -->
            <li class="nav-item theme-text">
                <a href="dashboard.php" class="nav-link">UniSys</a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-0 ml-auto">
            <!-- <li class="nav-item align-self-center search-animated">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                    </div>
                </form>
            </li> -->
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php echo $passport; ?>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="logout.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<?php
} ?>