@extends('layouts.admin') 
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Manage Genre</title>
@endsection
 
@section('content')
<div class="container-fluid mt-3" id="app">
    <div class="row">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-6">
            @if ($genres)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">All Genres</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{ $genre->id }}</td>
                                    <td>{{ $genre->name }}</td>
                                    <td>{{ $genre->slug }}</td>
                                    <td>{{ $genre->created_at }}</td>
                                    <td><a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-outline-info">Edit</a> </td>
                                    <td><form method="POSt" action="{{ route('genre.destroy', $genre->id) }}">
                                            <input name="_method" type="hidden" value="DELETE">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button> </form> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            @endif
        </div>
        <div class="col-sm-6">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Create New Genre</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('genre.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create</button> {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>                        --}}
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

