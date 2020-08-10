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
          <h3 class="h4">System Requirements</h3>
          <p class="text-muted">
              The UniSys Ecosystem has a few system requirements.
              All of these requirements are satisfied by the UniSys virtual machine,
              so it's highly recommended that you use UniSys virtual machine as your local Deployment  environment.
              However, if you are not using UniSys VM, you will need to make sure your server meets the following requirements:
              <ul>
                <li>PHP >= 7.2.5 </li>
                <li>BCMath PHP Extension </li>
                <li>Ctype PHP Extension </li>
                <li>Fileinfo PHP extension </li>
                <li>JSON PHP Extension </li>
                <li>Mbstring PHP Extension </li>
                <li>OpenSSL PHP Extension </li>
                <li>PDO PHP Extension </li>
                <li>Tokenizer PHP Extension </li>
                <li>XML PHP Extension </li>
              <ul>
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