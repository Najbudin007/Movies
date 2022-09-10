@extends("Frontend.layouts.master")
@section("content")
@include('Frontend.pages.banner')
<!-- End Hero -->


  <!-- ======= Featured Services Section ======= -->
  @include('Frontend.pages.movie')
  <!-- End Featured Services Section -->

  <!-- ======= Contact Section ======= -->
  @include('Frontend.pages.contact')
@endsection