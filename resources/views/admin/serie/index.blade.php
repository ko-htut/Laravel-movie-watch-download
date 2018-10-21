@extends('layouts.admin') 
@section('meta')
    <title>Manage Serie</title>
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
                @if ($series)
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">All Series</h3>
                            <a class="btn btn-outline-dark float-right" href="{{ route('serie.create') }}">Create</a>
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
                                @foreach($series as $serie)
                                    <tr>
                                        <td>{{ $serie->id }}</td>
                                        <td>{{ $serie->title }}</td>
                                        <td>{{ $serie->slug }}</td>
                                        <td>{{ $serie->created_at }}</td>
                                        <td><a href="{{ route('serie.edit', $serie->id) }}" class="btn btn-outline-info">Edit</a> </td>
                                        <td><form method="POSt" action="{{ route('serie.destroy', $serie->id) }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button> </form>
                                        </td>
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
