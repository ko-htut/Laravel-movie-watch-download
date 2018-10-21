@extends('layouts.show')
@section('content')
<div class="container">
    <div class="row">
        @if(!empty($movies))
        @include('layouts.display-movies')
        @endif
    </div>
</div>
@endsection