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
      <!-- Buy Online-->
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="img/pages/about-icons/01.png" alt="Buy Online"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Search, Select, Buy Online.</h3>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.</p><a class="font-weight-medium text-decoration-none" href="shop-boxed-ls.html">View Products<i class="fe-icon-arrow-right d-inline-block align-middle ml-1"></i></a>
        </div>
      </div>
      <!-- Delivery Worldwide-->
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="img/pages/about-icons/02.png" alt="Delivery Worldwide"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Fast Delivery Worldwide.</h3>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.</p><a class="font-weight-medium text-decoration-none" href="#">Shipping Details<i class="fe-icon-arrow-right d-inline-block align-middle ml-1"></i></a>
        </div>
      </div>
      <!-- Mobile App-->
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="img/pages/about-icons/03.png" alt="Mobile App"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Great Mobile App. Shop On The Go.</h3>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat.</p><a class="market-btn apple-btn mr-3 mt-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-btn google-btn mr-3 mt-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-btn windows-btn mr-3 mt-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
        </div>
      </div>
      <!-- Outlet Stores-->
      <div class="d-md-table w-100 p-4 p-lg-5 box-shadow">
        <div class="d-md-table-cell align-middle mx-auto mb-4 mb-md-0" style="width: 150px;"><img class="d-block w-100" src="img/pages/about-icons/04.png" alt="Outlet Stores"></div>
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Shop Offline. Cozy Outlet Stores.</h3>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.</p><a class="font-weight-medium text-decoration-none" href="contacts-v2.html">See Outlet Stores<i class="fe-icon-arrow-right d-inline-block align-middle ml-1"></i></a>
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