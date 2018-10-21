@foreach($season->episodes as $episod)
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 d-flex">
        <div class="card text-white bg-dark flex-fill elevation-4 mx-auto" style="max-width: 15rem">
            <a href="{{ route('episodes.show',  $episod->slug)}}" class="filma24-hover">
                <img src="{{ $season->getFirstMediaUrl('posterSeason') }}" class="img-fluid"  style="height: 270px; width: 100%" />
                <div class="card-info text-center">
                    <div class="card-title">{{ $episod->title }}</div>
                </div>
            </a>
        </div>
    </div>
@endforeach