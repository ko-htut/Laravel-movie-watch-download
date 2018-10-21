@extends('layouts.admin') 
@section('meta')
    <title>Edit Episode</title>
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
                        <h3 class="card-title">Edit Episode</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('episode.update', [$serie->id, $season->id, $episode->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="control-label">Title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $episode->title }}">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update</button> {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>                        --}}
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
                            @if($episode->embeds)
                                @foreach($episode->embeds as $embed)
                                    <ul>
                                        <li>{{ $embed->web_name }}</li>
                                        <form method="post" action="/embed/{{ $embed->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\EpisodeController@addEmbed', [$serie->id, $season->id, $episode->id]) }}">
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
                            @if($episode->watchlinks)
                                @foreach($episode->watchlinks as $watchlink)
                                    <ul>
                                        <li>{{ $watchlink->web_name }}</li>
                                        <form method="post" action="/watchlink/{{ $watchlink->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\EpisodeController@addWatchlink', [$serie->id, $season->id, $episode->id]) }}">
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
                            @if($episode->downloadlinks)
                                @foreach($episode->downloadlinks as $downloadlink)
                                    <ul>
                                        <li>{{ $downloadlink->web_name }}
                                            <form method="post" action="/downloadlink/{{ $downloadlink->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="close" aria-label="Close">
                                                    <button class="btn btn-danger">Delete</button>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\EpisodeController@addDownloadlink', [$serie->id, $season->id, $episode->id]) }}">
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
                            @if($episode->trailerlinks)
                                @foreach($episode->trailerlinks as $trailerlink)
                                    <ul>
                                        <li>{{ $trailerlink->web_name }}</li>
                                        <form method="post" action="/trailerlink/{{ $trailerlink->id }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                    </ul>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">

                            <form method="post" action="{{ action('Admin\EpisodeController@addTrailerlink', [$serie->id, $season->id, $episode->id]) }}">
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
