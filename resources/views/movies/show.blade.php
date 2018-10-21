@extends('layouts.show')
@section('content')
    @if(!empty($movie))
        <div class="row"><div class="col-xs-12 col-sm-12 col-md-8">
                @include('layouts.single-movie')
            </div>
        </div>

    @endif
@endsection    