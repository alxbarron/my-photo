@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Latest favorite Photos</div>

                <div class="card-body">
                    @foreach ($photos as $photo)
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mt-0">{{ $photo->title }}</h3>
                                <a href="{{ $photo->url }}">{{ $photo->url }}</a>
                                <h4>Favorite: {{ $photo->favorite }}</h4>
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
