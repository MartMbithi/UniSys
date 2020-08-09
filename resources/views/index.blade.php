<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UniSys - Light Weight University Information Management Syste</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="UniSys">
    <meta name="keywords" content="multipurpose, light weight, information management system,responsive,  University, bootstrap 4, html5, css3, jquery, js,clean">
    <meta name="author" content="MartDevelopers Inc , Team Devlan">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#343b43" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ url('css/vendor.min.css') }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ url('css/theme.min.css') }}">
    <!-- Modernizr-->
    <script src="{{ url('js/modernizr.min.js') }}"></script>
  </head>
  <!-- Body-->
  <body>
    <!-- Off-Canvas Menu-->
    @include('partials.off_canvas')

    <!-- Navbar: Simple Ghost-->
    @include('partials.nav')
    <!-- Page Content-->
    <!-- Hero-->
    <section class="bg-dark bg-center-top bg-no-repeat position-relative pt-5 pb-4 pb-md-5" style="background-image: url(img/homepages/theme-presentation/hero-bg-back.jpg);">
      <div class="img-cover bg-auto d-none d-md-block" style="background-image: url(img/homepages/theme-presentation/hero-bg-front.jpg);"></div>
      <div class="container bg-content py-5 my-md-5 text-center text-md-left">
        <div class="pb-md-5 mt-5 mb-md-5">
          <div class="d-inline-block h6 text-lg bg-white px-3 py-2 mt-md-4">UniSys</div>
          <h1 class="display-3 text-white"><span class="d-block break-word">University </span><span class="d-block break-word"> Management </span><span class="d-block break-word"> System</span></h1>
        </div>
      </div>
    </section>
    <div class="bg-dark" style="height: 250px;"></div>
    <!-- UniSys Details-->
    <section class="container" style="margin-top: -250px;">
      <div class="bg-white box-shadow py-5 px-4 px-sm-5">
        <div class="row">
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-info text-white px-2 py-1'>1</span> Light Weight Application</h5>
            <p class="text-muted pb-3">UniSys is a light weight web based application that will / won't consume your server resorces and also ensures fast execution. The best thing about UniSys is its compatibility because it works well on all devices</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-warning text-white px-2 py-1'>2</span> Flexible UI Components</h5>
            <p class="text-muted pb-3">DRY approach, modular design are the cornerstones of the modern web development. UniSys introduces many components  and modules each having diffrent variations. 
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-accent text-white px-3 py-1'>3</span>Highly Scalable</h5>
            <p class="text-muted pb-3">
                No matter the size of your university, if you need to digitize the needs of your institution, UniSys is what you ought to opt for. This is one single software which will allow you to manage administration, financial affair, student affairs and all other related issues in your university. </p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-success text-white px-2 py-1'>4</span> Security</h5>
            <p class="text-muted pb-3">UniSys is reliable enterprise software because it operates at a very high level of security which are pre-requisite for all universities. It can also be customized to suit the needs of your institution, therefore, you don’t have to get one designed specifically for your organization.</p>
            <hr>
          </div>
      </div>
    </section>
    
    <!-- Features-->
    <section class="container pt-2 pb-5 mb-3">
      <h2 class="h3 block-title text-center">Cool Features</h2>
      <div class="row pt-4">
        <div class="col-md-6">
          <dl class="dl-with-icon">
            <dt><i class="fe-icon-users text-success"></i>Students Information Management</dt>
            <dt><i class="fe-icon-book text-success"></i>Library Information Management</dt>
            <dt><i class="fe-icon-home text-success"></i>Hostel Information Management</dt>
            <dt><i class="fe-icon-shopping-bag text-success"></i>Mess Information Management</dt>
            <dt><i class="fe-icon-tag text-success"></i>Programe and Course Management</dt>
            <dt><i class="fe-icon-truck text-success"></i>Transport Management</dt>
          </dl>
        </div>
        <div class="col-md-6">
          <dl class="dl-with-icon">
            <dt><i class="fe-icon-user-check text-success"></i>HR Information Management</dt>
            <dt><i class="fe-icon-bookmark text-success"></i>Scholarships And Discounts</dt>
            <dt><i class="fe-icon-user-plus text-success"></i>Admission Information Management</dt>
            <dt><i class="fe-icon-award text-success"></i>Exam / Results Management</dt>
            <dt><i class="fe-icon-package text-success"></i>Inventory and Assets Informatgion Management</dt>
            <dt><i class="fe-icon-airplay text-success"></i>Students / Lecturers Portal</dt>
          </dl>
        </div>
      </div>
    </section>
    <!-- Footer + CTA-->
    @include('partials.footer')
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ url('js/vendor.min.js') }}"></script>
    <script src="{{ url('js/theme.min.js') }}"></script>
  </body>
</html>