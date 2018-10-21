@extends('layouts.show')
@section('content')
<div class="container">
    <div class="row">
        @include('layouts.display-movies')
    </div>
    <div class="row-flex">
        <div class="img bg-dark text-warning px-3"><h2>Series</h2></div>
    </div>
    <div class="row">
        @include('layouts.display-series4')
    </div>
</div>
@endsection