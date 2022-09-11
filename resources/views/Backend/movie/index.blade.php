@extends('Backend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <h3 class="card-title">Movies</h3>
                            <a href="{{ route('movies.create') }}" class="btn btn-sm btn-dark">Add Movie</a>
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
                                    @if (count($movies) > 0)
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        S.N</th>
                                                    <th>
                                                        Image</th>
                                                    <th>
                                                        Title</th>
                                                    <th>Release Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($movies as $key => $movie)
                                                    <tr>
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}
                                                        </td>
                                                        <td><img src="{{ asset('images/' . $movie->poster) }}" alt=""
                                                                width="80"></td>
                                                        <td>{{ $movie->title }}</td>
                                                        <td>{{ $movie->release_date }}</td>
                                                        <td>{{ $movie->status }}</td>
                                                        <td>
                                                            <a href="{{ route('movies.edit', $movie->id) }}"
                                                                class="btn btn-sm btn-outline-dark">Edit</a>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{ $movie->id }}">
                                                                Delete
                                                            </button>
                                                        </td>

                                                    </tr>
                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $movie->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure to delete <span
                                                                        class="text-red">{{ $movie->title }}</span> ?
                                                                    <p>Action cannot be undone.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <form action="{{ route('movies.destroy', $movie->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                            {{ $movies->links() }}
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
