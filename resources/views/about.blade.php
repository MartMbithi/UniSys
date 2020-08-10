@include('partials.head')
  <!-- Body-->
  <body>
    
    <!-- Off-Canvas Menu-->
    @include('partials.mobile')
    <!-- Navbar: Default-->
    @include('partials.header')
    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url(img/page-title/blog-pattern.jpg);">
      <div class="container text-left align-self-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('/about') }}">About UniSys</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title-heading">About UniSys</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;">
        <img class="d-block w-100" src="{{ url('img/pages/about-icons/01.png') }}" alt="MartDevelopers"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">About MartDevelopers The UniSys Creators</h3>
          <p class="text-muted">
            MartDevelopers Inc is one of the leading enterprise application software development corporation that  helps companies of all sizes and industries innovate through simplification.
            From the back office to the boardroom, warehouse to storefront, on premise to cloud,desktop to mobile device MartDevelopers Inc empowers people and organizations to work together more efficiently
            and use business insight more effectively to stay ahead of the competition. 
            Our applications and services enable customers to operate profitably, adapt continuously, and grow sustainably
          </P>
        </div>
      </div>

      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;">
        <img class="d-block w-100" src="{{ url('img/pages/about-icons/03.png') }}" alt="About UniSys"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">UniSys</h3>
          <p class="text-muted">
            UniSys is a web based light weight University Information Management System. Its shipped as a web based application, 
            a desktop application, a mobile device application and a cloud application.
            UniSys is reliable enterprise software because it operates at a very high level of security that is
            a pre-requisite for all universities.
            It can also be customized to suit the needs of your institution, therefore, 
            you don’t have to get one designed specifically for your organization. It also supports multiple user access but keeps on strict security controls
            so that no data is lost and access is only provided to necessary data only.
            UniSys is user-friendly, customizable, secure and reliable which makes it one of the best enterprise software for your university systems.
          </P>
        </div>
      </div>

    </div>
    <!-- Footer-->
    @include('partials.footer')
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ url('js/vendor.min.js') }}"></script>
    <script src="{{ url('js/theme.min.js') }}"></script>
  </body>
</html>