@extends('layouts.show')
@section('content')
    <div class="row">
        @if(count($movies))
            @include('layouts.display-genre-movies')
            @endif
    </div>
    @endsection
