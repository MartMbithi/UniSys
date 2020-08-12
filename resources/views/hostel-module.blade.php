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
            <li class="breadcrumb-item"><a href="{{ url('/hostel') }}">Hostel Information Management Module</a>
            </li>
          </ol>
        </nav>
        <h1 class="">Hostel Information Management Module</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Hostel Information Management Module</h3>
          <p class="text-muted">
            This module has been intended to automate, oversee and care for the general handling of even enormous scale hostels. 
            <li>Reservations management </li>
            <li>Check-in and check-out functions </li>
            <li>Creation of guest profiles and recording of guest details </li>
            <li>Control over inventory, rates, and availability </li>
            <li>Housekeeping component </li>
            <li>Easy guest communications </li>
            <li>Property maintenance management </li>
            <li>Payments processing </li>
            <li>Performance reports </li>
            <li>Accounting </li>
            <li>View all of your reservations on a calendar page </li>
            <li>Add additional rooms and extra sale items to a booking </li>
            <li>Add new rate plans to existing rooms </li>
            <li>Close out specific rooms for a spring clean</li>
            <li>Move existing bookings around </li>
            <li>Produce invoices</li>
            <li>Easily check guests in and out</li>
            <li>Send pre-arrival and post-stay emails</li>
            <li>Remember your returning guests</li>
            <li>Manage your housekeeping schedule</li>
            <li>Keep track of repairs and refurbishments</li>
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
