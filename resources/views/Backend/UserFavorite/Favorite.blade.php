@extends('Backend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">User Faviorate Movies Table</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if (count($favorite) > 0)
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        S.N</th>
                                                    <th>
                                                        User Name 
                                                    </th>
                                                    <th>
                                                        Favorite Movies
                                                    </th>
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($favorite as $key => $fav)
                                                @if(count($fav['favourites']) > 0)
                                                    <tr>
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}
                                                        </td>
                                                        <td>{{ $fav->name }}</td>
                                                        <td>
                                                            <ul>
                                                            @foreach ($fav['favourites'] as $mov=> $movie)
                                                                <li> <span style="font-weight: bold">{{$mov+1}}.</span> {{$movie->movie["title"]}}</li>
                                                            @endforeach
                                                        </ul>
                                                        </td>
                                                    
                        
                                                    </tr>
                                                    <!-- Button trigger modal -->
@endif
                                                @endforeach

                                            </tbody>

                                        </table>
                                    @else
                                        <div class="alert alert-light text-center text-bold" role="alert">
                                            No Movies
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            {{-- {{ $favorite->links() }} --}}
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
