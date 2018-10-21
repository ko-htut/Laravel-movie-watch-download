@extends('layouts.admin') 
@section('meta')
    <title>Create Serie</title>
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
                    <form class="form-horizontal" method="POST" action="{{ route('serie.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Name">
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
                                    <input type="number" class="form-control {{ $errors->has('created_year') ? ' is-invalid' : '' }}" id="created_year" name="created_year" placeholder="60">
                                    @if ($errors->has('created_year'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('created_year') }}</strong>
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
