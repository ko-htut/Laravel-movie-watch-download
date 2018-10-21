@foreach($series as $serie)
    <div class="col-xs-12 col-sm-6 col-md-3 d-flex mt-3">
        <div class="card text-white bg-dark flex-fill elevation-4 mx-auto" style="max-width: 15rem">
            <a href="{{ route('series.show', $serie->slug)}}" class="filma24-hover">
                <img src="{{ $serie->getFirstMediaUrl('posterSerie') }}" class="img-fluid"  style="height: 270px; width: 100%" />
                <div class="card-img-overlay">
                    <span class="badge badge-pill badge-warning">Viti {{ $serie->created_year }}</span>
                </div>
            </a>
            <div class="card-info text-center">
                    <div class="card-title">{{ $serie->title}}</div>
            </div>
        </div>
    </div>
@endforeach
<div class="container mt-3 d-flex justify-content-center">
    {{ $series->links() }}
</div>