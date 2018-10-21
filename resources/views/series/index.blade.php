@extends('layouts.show')
@section('content')
    <div class="container">
        @if(count($series))
            <div class="row">
                @include('layouts.display-series')
            </div>
        @endif
    </div>

@endsection    