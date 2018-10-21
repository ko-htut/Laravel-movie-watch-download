@extends('layouts.admin')
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
                        <h3 class="card-title">Edit Movie</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('movie.update', $movie->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $movie->title }}">
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
                                    <input type="number" class="form-control {{ $errors->has('runing_time') ? ' is-invalid' : '' }}" id="runing_time" name="runing_time" value="{{ $movie->runing_time }}">
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
                                    <input type="number" class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}" id="release_date" name="release_date" value="{{ $movie->release_date }}">
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
                                    <input type="number" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" id="rating" name="rating" value="{{ $movie->rating }}">
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
                                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="3" name="description" placeholder="Enter description">{{ $movie->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Select multiple-->
                            <div class="form-group">
                                <label>Select Multiple</label>
                                @foreach($movie->genres as $genre)
                                    <span class="text-info">{{ $genre->name }}</span>
                                @endforeach
                                <select multiple class="form-control" id="genres" name="genres[]">
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->id}}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                @if($movie->getMedia('poster'))
                                    <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                        <img class="img-fluid"  src="{{ $movie->getFirstMediaUrl('poster') }}">
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Create</button> {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>                        --}}
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <div class="card card-info">
                    <div class="card-header">Add Embed</div>
                    <div class="card-body">
                        <div class="row">
                            @if($movie->embeds)
                                @foreach($movie->embeds as $embed)
                                    <ul>
                                        <li>{{ $embed->web_name }}</li>
                                        <form method="post" action="/embed/{{ $embed->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\MovieController@addEmbed', $movie->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="web_name" class="control-label">Web Name</label>
                                    <input type="text" class="form-control" name="web_name">
                                </div>
                                <div class="form-group">
                                    <label for="web_url" class="control-label">Web Url</label>
                                    <input type="text" class="form-control" name="web_url">
                                </div>

                                <button type="submit" class="btn btn-info">Add Embed</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">Add Watchlinks</div>
                    <div class="card-body">
                        <div class="row">
                            @if($movie->watchlinks)
                                @foreach($movie->watchlinks as $watchlink)
                                    <ul>
                                        <li>{{ $watchlink->web_name }}</li>
                                        <form method="post" action="/watchlink/{{ $watchlink->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <form method="post" action="{{ action('Admin\MovieController@addWatchlink', $movie->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="web_name" class="control-label">Web Name</label>
                                    <input type="text" class="form-control" name="web_name">
                                </div>
                                <div class="form-group">
                                    <label for="web_url" class="control-label">Web Url</label>
                                    <input type="text" class="form-control" name="web_url">
                                </div>
                                <button type="submit" class="btn btn-info">Add Watchlink</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">Add Downloadlinks</div>
                    <div class="card-body">
                        <div class="row">
                            @if($movie->downloadlinks)
                                @foreach($movie->downloadlinks as $downloadlink)
                                    <ul>
                                        <li>{{ $downloadlink->web_name }}
                                            <form method="post" action="/downloadlink/{{ $downloadlink->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\MovieController@addDownloadlink', $movie->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="web_name" class="control-label">Web Name</label>
                                    <input type="text" class="form-control" name="web_name">
                                </div>
                                <div class="form-group">
                                    <label for="web_url" class="control-label">Web Url</label>
                                    <input type="text" name="web_url" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-info">Add Downloadlink</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">Add Trailerlinks</div>
                    <div class="card-body">
                        <div class="row">
                            @if($movie->trailerlinks)
                                @foreach($movie->trailerlinks as $trailerlink)
                                    <ul>
                                        <li>{{ $trailerlink->web_name }}</li>
                                        <form method="post" action="/trailerlink/{{ $trailerlink->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\MovieController@addTrailerlink', $movie->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="web_name" class="control-label">Web Name</label>
                                    <input type="text" name="web_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="web_url" class="control-label">Web Url</label>
                                    <input type="text" name="web_url" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-info">Add Trailerlink</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
