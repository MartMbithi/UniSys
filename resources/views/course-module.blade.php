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
            <li class="breadcrumb-item"><a href="{{ url('/course') }}">Course And Programe Information Management Module</a>
            </li>
          </ol>
        </nav>
        <h1 class="">Course And Programe Information Management Module</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="d-md-table w-100 p-4 p-lg-5 mb-30 box-shadow">
        <div class="d-md-table-cell align-middle pl-md-4 pl-lg-5 text-center text-md-left">
          <h3 class="h4">Course And Programe Information Management Module</h3>
          <p class="text-muted">
            <li>Automatic enrollment: Logic within an LMS which registers and reminds employees about mandatory courses.</li>
            <li>Enhanced Security: Many corporate LMS solutions have single sign in, advanced authentication, and firewalls to ensure data security.</li>
            <li>A digital roll-call sheet for tracking attendance and for sending invitations to class participants.</li>
            <li>Distributed instructor and student base: Remote participation by the instructor or pupil allows courseware to feature multiple teachers or experts from across the globe.</li>
            <li>Course calendars: Creation and publication of important dates related to the course schedules, including project deadlines and tests.</li>
            <li>Engagement: Interaction between and among students, such as instant messaging, email, and discussion forums.</li>
            <li>Assessment and testing: Creation of knowledge retention exercises such as short quizzes and comprehensive exams.</li>
            <li>Grading and Scoring: Advanced tracking and charting of student performance over time. </li>

            <b><li>Advanced LMS features</li></b>

            <p>In addition to these basic features, there are many advanced features an LMS may include, such as:</p>

            <li>eCommerce: The ability to sell courses to third parties, and integrate with payment processors such as PayPal and Stripe.</li>
            <li>eConferencing: The ability to organize and hold e-conference sessions, with multiple students participating through audio and video.</li>
            <li>Excel Uploader: Using MS Excel, administrators can easily create multiple users accounts, upload hundreds of classroom and training records, and download training reports within minutes.</li>
            <li>Whiteboard: Online whiteboard functionality, so instructors and students can create and share writings and drawings in real time.</li>
            <li>Mobile friendly: The ability to use the LMS with mobile devices (smartphones and tablets), including being able to study when offline.</li>
            <li>Custom branding: Many LMS systems have the ability to use a company’s own branding and/or can create custom themes for the LMS user interface.</li>        
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