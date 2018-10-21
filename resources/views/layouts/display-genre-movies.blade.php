@foreach($movies as $movie)
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 d-flex mt-3">
        <div class="card text-white bg-dark flex-fill elevation-4 mx-auto" style="max-width: 15rem">
            <a href="{{ route('movies.show', $movie->slug)}}" class="filma24-hover">
                <img src="{{ $movie->getFirstMediaUrl('poster') }}" class="img-fluid card-img-top" style="height: 265px" />
                <div class="card-img-overlay">
                    <span class="badge badge-pill badge-warning">Viti {{ $movie->release_date }}</span>
                </div>
            </a>
            <div class="card-info text-center">
                <div class="card-title"><a href="">{{ str_limit($movie->title, 22) }}</a> </div>
            </div>
            <div class="card-footer">
                @foreach($movie->genres as $genre)
                    <span class="badge badge-pill badge-warning">{{ $genre->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
<div class="container mt-3 d-flex justify-content-center">
    {{ $movies->links() }}
</div>