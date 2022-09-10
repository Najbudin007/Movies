<!DOCTYPE html>
<html lang="en">

@include('Frontend.layouts.header')

<body>

  <!-- ======= Header ======= -->
    @include('Frontend.layouts.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
@yield("content")
    <!-- End Contact Section -->

  <!-- End #main -->

 @include('Frontend.layouts.footer')
</body>

</html>