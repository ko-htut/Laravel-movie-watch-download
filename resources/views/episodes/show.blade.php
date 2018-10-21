@extends('layouts.show')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="card bg-dark text-white mt-3">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="card bg-dark text-white mt-3">
                    <div class="card-body">
                        <h1 class="card-title border-bottom border-warning mb-2">{{ $episode->title }}</h1>
                    </div>
                </div>
                <div class="card bg-dark text-white mt-3">
                    <div class="card-body">
                        <h3 class="card-title border-bottom border-warning">Shikoni Trailerin Ketu</h3>
                        @if($episode->trailerlinks)
                            @foreach($episode->trailerlinks as $link)
                                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card bg-dark text-white mt-3">
                    <div class="card-body">
                        <h3 class="card-title border-bottom border-warning">Shikoni filmin ne faqe te tjera Ketu</h3>
                        @if($episode->watchlinks)
                            @foreach($episode->watchlinks as $link)
                                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card bg-dark text-white mt-3">
                    <div class="card-body">
                        <h3 class="card-title border-bottom border-warning">Shkarkoni filmin ne faqe te tjera Ketu</h3>
                        @if($episode->downloadlinks)
                            @foreach($episode->downloadlinks as $link)
                                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">

            </div>
        </div>
    </div>
    @endsection