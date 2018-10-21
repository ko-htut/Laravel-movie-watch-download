@extends('layouts.admin') 
@section('meta')
    <title>Managae Movies</title>
@endsection
 
@section('content')
    <div class="content">
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-8 offset-2">
                @if ($movies)
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">All Movies</h3>
                            <a class="btn btn-outline-dark float-right" href="{{ route('movie.create') }}">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{ $movie->id }}</td>
                                        <td>{{ $movie->title }}</td>
                                        <td>{{ $movie->slug }}</td>
                                        <td>{{ $movie->created_at }}</td>
                                        <td><a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-outline-info">Edit</a> </td>
                                        <td><form method="POSt" action="{{ route('movie.destroy', $movie->id) }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button> </form></td>
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
        </div>
    </div>
@endsection
