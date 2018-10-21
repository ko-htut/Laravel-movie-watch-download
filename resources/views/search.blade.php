@extends('layouts.show')
@section('content')
<div class="container">
    <div class="row">
        @if(!empty($movies))
            @include('layouts.display-movies')
         @endif
    </div>
    <div class="row-flex">Series</div>
    <div class="row">
        @if(!empty($series))
            @include('layouts.display-series')
        @endif
    </div>
</div>
@endsection    