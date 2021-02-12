@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Latest favorite Photos</div>

                <div class="card-body">
                    @foreach ($photos as $photo)
                        <div class="media mb-3">
                            <div class="media-body">
                                <h3 class="mt-0">{{ $photo->title }}</h3>
                                <img class="mx-auto d-block" src="{{ $photo->url }}" alt="{{ $photo->slug}}">                                
                            </div>
                        </div>
                    @endforeach

                    {{ $photos->links() }}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
