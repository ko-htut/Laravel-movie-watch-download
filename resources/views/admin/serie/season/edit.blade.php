@extends('layouts.admin') 
@section('meta')
    <title>Edit Season</title>
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
                        <h3 class="card-title">Update Season</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('season.update', [$serie->id, $season->id])}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="season_nr" class="control-label">Season Nr</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control {{ $errors->has('season_nr') ? ' is-invalid' : '' }}" id="season_nr" name="season_nr" value="{{ $season->season_nr }}">
                                    @if ($errors->has('season_nr'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('season_nr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                @if($season->getMedia('posterSeason'))
                                    <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                        <img class="img-fluid"  src="{{ $season->getFirstMediaUrl('posterSeason') }}">
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
                        <h3 class="card-title mr-auto">All Season Episodes</h3>
                        <a class="btn btn-outline-dark float-right" href="{{ route('episode.create', [$serie->id, $season->id]) }}">Create</a>
                    </div><!-- /.card-header -->
                    @if ($season->episodes)
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>title</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($season->episodes as $episode)
                                    <tr>
                                        <td>{{ $episode->id }}</td>
                                        <td>{{ $episode->title }}</td>
                                        <td>{{ $episode->created_at }}</td>
                                        <td><a href="{{ route('episode.edit', [$serie->id,  $season->id, $episode->id]) }}" class="btn btn-outline-info">Edit</a> </td>
                                        <td><form method="POSt" action="{{ route('episode.destroy',[$serie->id, $season->id, $episode->id]) }}">
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
