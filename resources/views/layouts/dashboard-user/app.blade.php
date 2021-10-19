<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>MBS - Body Repair</title>
    @include('includes.style')
  </head>

  <body class="dashboard-color-fixed">
    <div id="myDiv" style="z-index: 99999"></div>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        @include('includes.dashboard-user.sidebar')
        <!--pgae content -->
        <div id="page-content-wrapper">
          <!-- navbar -->
          @include('includes.dashboard-user.navbar')
          <!-- section content -->
          @yield('content')
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @include('includes.dashboard-user.script')
  </body>
</html>
