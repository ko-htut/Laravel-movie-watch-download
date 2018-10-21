@extends('layouts.admin') 
@section('meta')
    <title>Edit Serie</title>
@endsection
 
@section('content')
    <div class="content mt-3">
        <div class="row">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <!-- Horizontal Form -->
                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">Update Serie</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('serie.update', $serie->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $serie->title }}">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="created_year" class="control-label">Created Year</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control {{ $errors->has('created_year') ? ' is-invalid' : '' }}" id="created_year" name="created_year" value="{{ $serie->created_year }}">
                                    @if ($errors->has('created_year'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('created_year') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                @if($serie->getMedia('posterSerie'))
                                    <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                        <img class="img-fluid"  src="{{ $serie->getFirstMediaUrl('posterSerie') }}">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div>
                                        <label for="avatar">picture:</label>
                                        <input type="file"
                                               id="poster_path" name="poster_path"
                                               accept="image/*" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer card-info">
                            <button type="submit" class="btn btn-info">Update</button> {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>                        --}}
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title mr-auto">All Serie Seasons</h3>
                            <a class="btn btn-outline-dark float-right" href="{{ route('season.create', $serie->id) }}">Create</a>
                        </div><!-- /.card-header -->
                    @if ($serie->seasons)
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Season Nr</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serie->seasons as $season)
                                    <tr>
                                        <td>{{ $season->id }}</td>
                                        <td>{{ $season->season_nr }}</td>
                                        <td>{{ $season->created_at }}</td>
                                        <td><a href="{{ route('season.edit', [$serie->id, $season->id]) }}" class="btn btn-outline-info">Edit</a> </td>
                                        <td><form method="POSt" action="{{ route('season.destroy',[$serie->id, $season->id]) }}">
                                                <input name="_method" type="hidden" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button> </form></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
