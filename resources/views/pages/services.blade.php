@extends('layouts.main')

@section('pageTitle')
    Services
@endsection

@section('content')

    <div class="landing-page-services">
        <img src="../../../storage/page_cover/services.png" class="landing-image-services" alt="">
    </div>

    <div class="row text-center">
        
        @if ( $services ?? '')

            @forelse ($services as $service)
                <div class="col-md-3 col-sm-3">{{ $service }}</div>   
            @empty
                No Services Found
            @endforelse   
        
        @else 
            <h3 class="text text-danger">Undefined</h3>
        @endif
        
    </div>

@endsection