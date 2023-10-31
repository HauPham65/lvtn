<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.widgets.head');
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.widgets.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.widgets.sidebar')
 <!-- End Sidebar-->

@yield('content');
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.widgets.footer')
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('admin.widgets.js')

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
