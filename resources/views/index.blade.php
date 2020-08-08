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
          <h1 class="display-3 text-white"><span class="d-block break-word">University </span><span class="d-block break-word">Information </span> <span class="d-block break-word"> Management </span><span class="d-block break-word"> System</span></h1>
        </div>
      </div>
    </section>
    <div class="bg-dark" style="height: 250px;"></div>
    <!-- UniSys Details-->
    <section class="container" style="margin-top: -250px;">
      <div class="bg-white box-shadow py-5 px-4 px-sm-5">
        <div class="row">
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-info text-white px-2 py-1'>12</span> Pre-designed Homepages</h5>
            <p class="text-muted pb-3">Initial release comes with 12 pre-designed Homepages (Landing pages) that target various business niches. More homepages will be added in future updates. Every future update will include at least one new homepage along with other improvements, fixes and added features.</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-warning text-white px-2 py-1'>45+</span> Flexible UI Components</h5>
            <p class="text-muted pb-3">DRY approach, modular design are the cornerstones of the modern web development. CreateX introduces 40+ components and each has 2 - 10 variations. They can be mixed together to produce more complex components. This gives you unlimited possibilities.</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-accent text-white px-3 py-1'>3</span> Modules: Portfolio, Blog, Shop</h5>
            <p class="text-muted pb-3">Most modern websites require News (Blog) section to engage with their visitors. Other would need E-commerce functionality because they want to sell products via the website. Yet another want to showcase their works. With CreateX you have them covered.</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-success text-white px-2 py-1'>9+</span> User Account Pages</h5>
            <p class="text-muted pb-3">Most online shops require users to create account to be able to manage their orders, edit shipping adresses, earn reward points etc. CreateX includes all crucial page templates to ensure your online shop will provide as smooth and engaging user experience as possible.</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-primary text-white px-2 py-1'>16</span> Hand-crafted Secondary Pages</h5>
            <p class="text-muted pb-3">The pages like About Us, Services, Pricing are one of the most important pages on the website. It is an opportunity where website visitors get to know the company, learn about services and pricing. CreateX also includes sepcialty pages like 404, search results, etc.</p>
            <hr>
          </div>
          <div class="col-md-6 pb-4 mb-3">
            <h5><span class='d-inline-block bg-danger text-white px-3 py-1'>7</span> Header Variations</h5>
            <p class="text-muted pb-3">More options is better. Especially when it comes to such important website element as main navigation. CreateX includes 7 variants of header layout and appearance. Choose the right one for your project. More variants will come in future updates.</p>
            <hr>
          </div>
        </div>
        <p class="text-lg text-center mb-0">...and much more</p>
      </div>
    </section>
    
    <!-- Fetures-->
    <section class="container pt-2 pb-5 mb-3">
      <h2 class="h3 block-title text-center"><span class='font-weight-normal'>And some</span> Cool Features</h2>
      <div class="row pt-4">
        <div class="col-md-6">
          <dl class="dl-with-icon">
            <dt><i class="fe-icon-check-circle text-success"></i>Kick-start your development</dt>
            <dd>Start your development process fast and easy with Node.js and Gulp setup. Configuration files are included in download package. Full tasks automation.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Easy To Customize With Sass</dt>
            <dd>CreateX is built using Sass. Easily change colors, typography and much more. It is the most mature, stable, and powerful CSS extension language in the world.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Pug - Node Templating Engine</dt>
            <dd>No need to write huge amount of HTML, if you don’t want to. Pug provides features not available in plain HTML like variables, includes, mixins, etc.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Built With Bootstrap 4</dt>
            <dd>CreateX is the ultimate website front-end solution based on Bootstrap 4 - the world's most popular responsive, mobile-first front-end component library.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>45+ Flexible Components</dt>
            <dd>Besides styling all default Bootstrap 4 components CreateX introduces lots of new flexible, customizable and reusable elements to use across the website.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Mobile Friendly Interface</dt>
            <dd>It's not a surprise that nowadays over 60% of users shop online using their mobile devices. CreateX is 100% responsive and optimized for small touch screens.</dd>
          </dl>
        </div>
        <div class="col-md-6">
          <dl class="dl-with-icon">
            <dt><i class="fe-icon-check-circle text-success"></i>Mobile Friendly Interface</dt>
            <dd>It's not a surprise that nowadays over 60% of users shop online using their mobile devices. CreateX is 100% responsive and optimized for touch screens.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Google Fonts</dt>
            <dd>CreateX uses Google fonts which are free, fast to load and of very high quality. Currently Google fonts library includes 870+ font families to choose from.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Touch-enabled Sliders</dt>
            <dd>In the era of touch screens it's important to ensure great user experience on handheld devices, especially when it comes to such importnat interface component as slider.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Vector Based HD Ready Icons</dt>
            <dd>CreateX uses font-based icon packs to ensure that infographics and interface icons look sharp on any device with any screen resolution and pixel density.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>Customizable Google Maps</dt>
            <dd>Thanks to Gmap3 plugin and Snazzy Maps collection of custom map styles you can create unique map design that fits perfectly overall look of your website.</dd>
            <dt><i class="fe-icon-check-circle text-success"></i>W3C Valid HTML Code</dt>
            <dd>All HTML files are checked via W3C validator to ensure 100% valid code. As you probably know invalid HTML limits innovation, but CreateX is innovative at its core.</dd>
          </dl>
        </div>
      </div>
    </section>
    <!-- Footer + CTA-->
    @include('partials.footer')
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ url('js/vendor.min.js') }}"></script>
    <script src="{{ url('js/theme.min.js') }}"></script>
  </body>
</html>