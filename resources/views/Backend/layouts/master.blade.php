<!DOCTYPE html>
<html lang="en">
<head>
@include("Backend.layouts.header")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
 @include("Backend.layouts.navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include("Backend.layouts.sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
@yield("content")
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include("Backend.layouts.scripts")
</body>
</html>
