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
            <li class="breadcrumb-item"><a href="{{ url('/transport') }}">Transport</a>
            </li>
          </ol>
        </nav>
        <h1 class="">Transport Information Management Module</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Transport Information Management Module Features</h3>
          <p class="text-muted">
                <li> Manage Transport Data
                Set vehicle information including vehicle type, model, number, registration, capacity, etc. The college transport management system allows you to track passenger information accurately.</li>
                <li> Allocate Vehicles for Students
                Manage vehicle allocation during the academic year with proper allotment of vehicles to students including the boarding points and destinations in particular routes.   </li>
                <li> Route Management
                Create, edit or delete vehicle routes along with bus stops and pick/drop timings using high quality digital mapping. Assign multiple routes to students at different timings. </li>
                <li> Fleet Management
                Plan optimum routes, efficient route scheduling, fuel management, and enhanced safety. Optimize bus routes and the vehicle capacity to reduce vehicle maintenance expenses, fuel costs and avoid unauthorized trips.
                    Manage vehicle schedules efficiently. </li>
                <li> Real-time Vehicle Tracking
                Accurately track vehicle location from anywhere, anytime using RFID, GPS and geofencing to provide real-time visibility of vehicles and entry/exit of students.  </li> 
                <li>Advanced Mapping
                Meet the expectations of parents with instant messaging and also allow real-time tracking of routes through the advanced mapping feature.</li>
                <li>Automatic Alerts and Notifications
                Create geofencing alerts and email notifications for effective school transportation management including student’s entry/exit, vehicle movement, delays, speed violations, and more.</li>
                <li>Track Fee Collection
                Configure transport fee structure for different routes. Track status of student fee payments in real-time and print receipts. </li>
                <li>Customized Reports
                Create customized reports of vehicle utilization, fee payments, violations, over speed, excessive stoppage time, and idle time etc. </li> 
                <li> Ensure safe transportation
                Provide safety and security to vehicles and students and respond faster to vehicle breakdowns, accidents and emergencies.
                Smart schools that implement the transport management solution perform better in terms of safety, service levels and cost savings</li>
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