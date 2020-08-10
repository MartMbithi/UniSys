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
            <li class="breadcrumb-item"><a href="{{ url('/user-manual') }}">Documentation</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title-heading">UniSys Documentation</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;">
        <img class="d-block w-100" src="{{ url('img/pages/about-icons/02.png') }}" alt="Buy Online"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Required Packages</h3>
          <p class="text-muted">
          </p>
        </div>
      </div>
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;">
        <img class="d-block w-100" src="{{ url('img/pages/about-icons/01.png') }}" alt="Delivery Worldwide"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">How To Install</h3>
          <p class="text-muted">

          </p>
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