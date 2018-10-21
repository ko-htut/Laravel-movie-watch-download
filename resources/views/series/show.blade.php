@extends('layouts.show')
@section('content')
    <div class="container">
        @if(count($serie->seasons))
            <div class="row">
                <h2>Seasons</h2>
            </div>
        <div class="row">
            @include('layouts.display-seasons')
        </div>

            @endif
    </div>


@endsection