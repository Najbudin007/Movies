@extends('Frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="py-5 bg-white">
            {{-- <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" class="btn btn-sm btn-outline-dark mb-2" href="#home">Home</a></li>
                <li class="mx-3"><a data-toggle="tab" class="btn btn-sm btn-outline-dark mb-2" href="#menu1">Menu 1</a></li>
                <li><a data-toggle="tab" class="btn btn-sm btn-outline-dark mb-2" href="#menu2">Menu 2</a></li>
            </ul>

            <div class="tab-content mt-3">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Some content.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div> --}}
            <h1 class="text-center">Favourite Movies</h1>
            <hr>
            <div class="bg-light">
              
                @foreach ($favs as $fav)
                        
                <div class="alert alert-secondary" role="alert">
                   <div class="d-flex justify-content-between">
                    <div class="left d-flex ">
                        <img src="{{asset("images/".$fav->movie->poster)}}" alt="" style="height:60px;width:80px;object-fit:cover;">
                        <p class="strong my-auto ml-5">{{$fav->movie->title}}</p>
                    </div>
                    <div class="my-auto">
                        <form action="{{route("deleteFav",$fav->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Remove from Favourite</button>
                        </form>
                    </div>
                   </div>
                  </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
