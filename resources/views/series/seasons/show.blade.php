@extends('layouts.show')
@section('content')
    @if(!empty($season))
    <div class="container">
        @if(count($season->episodes))
            <div class="row">
                <h2>Episodes</h2>
            </div>
            <div class="row">
                @include('layouts.display-episodes')
            </div>

        @endif
    </div>
@endif

@endsection