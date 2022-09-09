<!DOCTYPE html>
<html lang="en">

@include('Frontend.layouts.header')

<body>

  <!-- ======= Header ======= -->
    @include('Frontend.layouts.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    @include('Frontend.pages.banner')
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    @include('Frontend.pages.movie')
    <!-- End Featured Services Section -->

    <!-- ======= Contact Section ======= -->
    @include('Frontend.pages.contact')
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->

 @include('Frontend.layouts.footer')
</body>

</html>