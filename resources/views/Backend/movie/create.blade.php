@extends('Backend.layouts.master')
@section('content')
    <div class="container ">
        <div class="card card-light my-3">
            <div class="card-header">
                <h3 class="card-title">Create Movie</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
             @include("Backend.movie.partial")
            </form>
        </div>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#summernote1').summernote();
            });
        </script>
    @endsection
