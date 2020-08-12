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
            <li class="breadcrumb-item"><a href="{{ url('/admission') }}">Admissions Information Management </a>
            </li>
          </ol>
        </nav>
        <h1 class="">Admission Information Management Module</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Admission Information Management  Module Features</h3>
          <p class="text-muted">
            <li>Manage Students details </li>
            <li>Unique username to students </li>
            <li>Saved contact details to send immediate alerts to parents</li>
            <li>Automate attendance</li>
            <li>Customize the admission forms</li>
            <li>Students Documents Management </li>
            <li>Batch Allotment - Automatic allotment of batches every academic year reduces the burden on the administrative teams </li>
            <li>Academic year records- UniSys can also be used to store the academic records of all the students including alumni. </li>
            <li>Admission Application Enquiry - The Enquiry module with the Analytic dashboard, where admin can view all the applications regarding new admission, enquiries of parents/students about courses, also linked the academic year to get a complete admission flow for the year.</li>
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