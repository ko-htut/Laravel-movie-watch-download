<div class="card bg-dark text-white mt-3">
    <div class="card-body">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="card bg-dark text-white mt-3">
    <div class="card-body">
        <h1 class="card-title border-bottom border-warning mb-2">{{ $movie->title }}</h1>
        <div class="row mt2">
            <div class="col-xs-12 col-sm-3">{{ $movie->runing_time }} Minuta</div>
            <div class="col-xs-12 col-sm-3">
                Cliesia HD
            </div>
            <div class="col-xs-12 col-sm-3">
                IMDB: {{ $movie->rating }} <i class="fa fa-star"></i>
            </div>
            <div class="col-xs-12 col-sm-3">
                Viti: {{ $movie->release_date }}
            </div>
        </div>
        <div class="row mt-3 mb-3">
            @foreach($movie->genres as $genre)
                <div class="col-s-12 col-md-3">
                    <a href="{{ route('genres.show', $genre->slug) }}">{{ $genre->name }}</a>
                </div>
            @endforeach</div>
        <p class="mt-3">{{ $movie->description }}</p>
    </div>
</div>
<div class="card bg-dark text-white mt-3">
    <div class="card-body">
        <h3 class="card-title border-bottom border-warning">Shikoni Trailerin Ketu</h3>
        @if($movie->trailerlinks)
            @foreach($movie->trailerlinks as $link)
                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
            @endforeach
        @endif
    </div>
</div>
<div class="card bg-dark text-white mt-3">
    <div class="card-body">
        <h3 class="card-title border-bottom border-warning">Shikoni filmin ne faqe te tjera Ketu</h3>
        @if($movie->watchlinks)
            @foreach($movie->watchlinks as $link)
                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
            @endforeach
        @endif
    </div>
</div>
<div class="card bg-dark text-white mt-3">
    <div class="card-body">
        <h3 class="card-title border-bottom border-warning">Shkarkoni filmin ne faqe te tjera Ketu</h3>
        @if($movie->downloadlinks)
            @foreach($movie->downloadlinks as $link)
                <a class="btn btn-outline-warning" href="{{ url($link->web_url) }}" target="_blank">{{ $link->web_name }}</a>
            @endforeach
        @endif
    </div>
</div>