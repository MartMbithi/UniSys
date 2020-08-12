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
            <li class="breadcrumb-item"><a href="{{ url('/modules') }}">Modules</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('/library') }}">Library Information Management Module</a>
            </li>
          </ol>
        </nav>
        <h1 class="">Library Information Management Module</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Library Information Management Module</h3>
          <p class="text-muted">
            This module has been intended to automate, oversee and care for the general handling of even enormous scale libraries. 
            This module is fit for overseeing Book Issues, Returns, Magazine/Newspaper Subscriptions, Calculating/Managing Fine and Balances of installments due from Members,
            creating different Reports for Record-Keeping and Review purposes, as per end university prerequisites.
            Increasingly over this product is completely good with Bar Code based management Utilization of Bar Codes
            for Library Management facilitates the ordinary assignments of huge Libraries,
            where the No. of exchanges surpass a few thousands in number. 
            Also, the product can work even without Bar Codes consistently. 
            The Bar-Code age and printing procedure is a Built-In highlight of this Software. These are some of features of the module
            <li>A modern integrated library management system (LMS).</li>
            <li>Can be scalable to Windows, Linux and Mac OS platform.</li>
            <li>Print your own barcodes.</li>
            <li>Full catalog, circulation and acquisitions system for library stock management.</li>
            <li>Web based OPAC (Online Public Access Catalog) system</li>
            <li>Simple, clear search interface for all users</li>
            <li>Multilingual and multi-user support</li>
            <li>Export and import records</li>
            <li>Easy way to enter new books</li>
            <li>Keep record of complete info of a book like title, author name, publisher name etc.</li>
            <li> Easy way to check-in and check-out</li>
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