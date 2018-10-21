@extends('layouts.admin') 
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Movie</title>
@endsection
 
@section('content')
    <div class="content mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <!-- Horizontal Form -->
                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">Create New Movie</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('movie.store')}}" enctype="multipart/form-data">
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
                                <label for="runing_time" class="control-label">Runing Time</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control {{ $errors->has('runing_time') ? ' is-invalid' : '' }}" id="runing_time" name="runing_time" placeholder="60">
                                    @if ($errors->has('runing_time'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('runing_time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="release_date" class="control-label">Release Date</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}" id="release_date" name="release_date" placeholder="2018">
                                    @if ($errors->has('release_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rating" class="control-label">Rating</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" id="rating" name="rating" placeholder="5">
                                    @if ($errors->has('rating'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="3" name="description" placeholder="Enter description"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <!-- Select multiple-->
                            <div class="form-group">
                                <label>Select Multiple</label>
                                <select multiple class="form-control" name="genres[]">
                                    @foreach($genres as $key => $value)
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endforeach
                                </select>
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
