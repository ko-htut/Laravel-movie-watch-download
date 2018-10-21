@foreach($series as $serie)
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 d-flex mt-3">
        <div class="card text-white bg-dark flex-fill elevation-4 mx-auto" style="max-width: 15rem">
            <a href="{{ route('series.show', $serie->slug)}}" class="filma24-hover">
                <img src="{{ $serie->getFirstMediaUrl('posterSerie') }}" class="img-fluid card-img-top" style="height: 265px" />
                <div class="card-img-overlay">
                    <span class="badge badge-pill badge-warning">Viti {{ $serie->created_year }}</span>
                </div>
            </a>
            <div class="card-body text-center">
                <div class="card-title"><a href="">{{ $serie->title }}</a> </div>
            </div>
        </div>
    </div>
@endforeach