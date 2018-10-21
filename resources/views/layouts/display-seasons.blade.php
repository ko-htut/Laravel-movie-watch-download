@foreach($serie->seasons  as $season)
    <div class="col-xs-12 col-sm-6 col-md-3 d-flex mt-3">
        <div class="card text-white bg-dark flex-fill elevation-4 mx-auto" style="max-width: 15rem">
            <a href="{{ route('seasons.show', [$serie->slug ,$season->season_nr]) }}" class="filma24-hover">
                <img src="{{ $season->getFirstMediaUrl('posterSeason') }}" class="img-fluid"  style="height: 270px; width: 100%" />
            </a>
            <div class="card-info text-center">
                <div class="card-title">{{ $season->season_nr}}</div>
            </div>
        </div>
    </div>
@endforeach