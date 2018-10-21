@extends('layouts.admin') 
@section('meta')
    <title>Create Season</title>
@endsection
 
@section('content')
    <div class="content mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <!-- Horizontal Form -->
                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">Create New Serie</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('season.store', $serie->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="season_nr" class="control-label">Season Nr</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control {{ $errors->has('season_nr') ? ' is-invalid' : '' }}" id="season_nr" name="season_nr" placeholder="60">
                                    @if ($errors->has('season_nr'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('season_nr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Poster:</label>
                                <input type="file" class="form-control"
                                       id="poster_path" name="poster_path"
                                       accept="image/*" />
                                @if ($errors->has('poster_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('poster_path') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer card-info">
                            <button type="submit" class="btn btn-info">Create</button> {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>                        --}}
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
