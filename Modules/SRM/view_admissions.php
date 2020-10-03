<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
require_once('partials/_head.php');
check_login();

?>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a class="main-logo" href="dashboard.php"></a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <?php
        require_once('partials/_header.php');
        $view = $_GET['view'];
        $ret = "SELECT * FROM `UniSys_Students` WHERE id = '$view'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($std = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-info-inner">
                                <div class="profile-img">
                                    <img src="img/student/<?php echo $std->passport; ?>" alt="" />
                                </div>
                                <div class="profile-details-hr">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Name</b><br /> <?php echo $std->name; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Reg Number</b><br /> <?php echo $std->reg_no; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>National ID Number</b><br /> <?php echo $std->idnumber; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Course</b><br /> <?php echo $std->course_name; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="address-hr">
                                                <p><b>Campus Email</b><br /> <?php echo $std->campus_email; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Personal Email</b><br /> <?php echo $std->personal_email; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Phone Number</b><br /> <?php echo $std->phone; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Date Of Birth</b><br /> <?php echo $std->dob; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Gender</b><br /> <?php echo $std->gender; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Country</b><br /> <?php echo $std->country; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="address-hr">
                                                <p><b>Address</b><br /> <?php echo $std->adr; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <h3>500</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <h3>900</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div class="address-hr">
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                                <h3>600</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Activity</a></li>
                                    <li><a href="#reviews"> Biography</a></li>
                                    <li><a href="#INFORMATION">Update Details</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Full Name</b><br /> Fly Zend</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Mobile</b><br /> 01962067309</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Email</b><br /> fly@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Location</b><br /> UK</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="content-profile">
                                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                                    dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                                    dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                                                                    dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Skill Set</h2>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-skill">
                                                                <h2>Java</h2>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 90%;" class="progress-bar progress-yellow"></div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-skill">
                                                                <h2>Php</h2>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 80%;" class="progress-bar progress-green"></div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-skill">
                                                                <h2>Apps</h2>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 70%;" class="progress-bar progress-blue"></div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-skill">
                                                                <h2>C#</h2>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 60%;" class="progress-bar progress-red"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Education</h2>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-b-15">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Experience</h2>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <h2>Subjects</h2>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                    <li><i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="chat-discussion" style="height: auto">
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/1.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Michael Smith </a>
                                                                <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-success"><i class="fa fa-heart"></i> Love</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/2.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Karl Jordan </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                                                                    <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/3.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Michael Smith </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/4.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Alice Jordan </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                                                    It uses a dictionary of over 200 Latin words.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> Nudge</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/1.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Mark Smith </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                                                    It uses a dictionary of over 200 Latin words.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-success"><i class="fa fa-heart"></i> Love</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/2.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Karl Jordan </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                                                                    <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/3.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Michael Smith </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="chat-message">
                                                            <div class="profile-hdtc">
                                                                <img class="message-avatar" src="img/contact/4.jpg" alt="">
                                                            </div>
                                                            <div class="message">
                                                                <a class="message-author" href="#"> Alice Jordan </a>
                                                                <span class="message-date"> Fri Jan 25 2015 - 11:12:36 </span>
                                                                <span class="message-content">
                                                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                                                    It uses a dictionary of over 200 Latin words.
                                                                </span>
                                                                <div class="m-t-md mg-t-10">
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input name="number" type="text" class="form-control" placeholder="First Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Last Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Date of Birth">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Department">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Pincode">
                                                            </div>
                                                            <div class="file-upload-inner ts-forms">
                                                                <div class="input prepend-big-btn">
                                                                    <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-download"></i>
                                                                    </label>
                                                                    <div class="file-button">
                                                                        Browse
                                                                        <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                    </div>
                                                                    <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group sm-res-mg-15 tbpf-res-mg-15">
                                                                <input type="text" class="form-control" placeholder="Description">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Select Gender</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Select country</option>
                                                                    <option>India</option>
                                                                    <option>Pakistan</option>
                                                                    <option>Amerika</option>
                                                                    <option>China</option>
                                                                    <option>Dubai</option>
                                                                    <option>Nepal</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Select state</option>
                                                                    <option>Gujarat</option>
                                                                    <option>Maharastra</option>
                                                                    <option>Rajastan</option>
                                                                    <option>Maharastra</option>
                                                                    <option>Rajastan</option>
                                                                    <option>Gujarat</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Select city</option>
                                                                    <option>Surat</option>
                                                                    <option>Baroda</option>
                                                                    <option>Navsari</option>
                                                                    <option>Baroda</option>
                                                                    <option>Surat</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Website URL">
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Mobile no.">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress mg-t-15">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php require_once('partials/_footer.php');
        } ?>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>