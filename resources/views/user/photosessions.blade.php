@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="/css/gallery.css">
@endsection
@section('content')
<section id="gallery">
    <div class="container">
        <h3 class="page_title">@lang('navbar.photosessions')</h3>
        @for( $i = 0; $i <= 2; $i++ )
        <div class="row">
            @foreach($data['photos'] as $photo)
            @if(($i == 0 && $loop->index >= 3) || ($i == 1 && $loop->index < 3) || ($i == 2 && $loop->index < 5))
                @continue
            @endif
            @if(($i == 0 && $loop->index == 0) || ($i == 1 && $loop->index == 5) || ($i == 2 && $loop->index == 6 ))
            <div class="col-12 col-md-8">
                <a href="/gallery_more/{{ $photo->id }}/{{ app()->getLocale() }}">
                    <div class="galler-hovereffect big-size">                                                   
                        <img class="large" src="/images/Photosessions/{{ $photo->mainpic }}" alt="">
                        <div class="overlay">
                            <h2>{{ $photo->title }}</h2>
                        </div>                        
                    </div>
                </a>
            </div>
            @endif
            @if($loop->index == 1 || $loop->index == 3 || $loop->index == 7)
            <div class="col-12 col-md-4">
            @endif
            @if(($i == 0 && ($loop->index == 1 || $loop->index == 2)) || ($i == 1 && ($loop->index == 3 || $loop->index == 4)) || ($i == 2 && ($loop->index == 7 || $loop->index == 8)))
            <a href="/gallery_more/{{ $photo->id }}/{{ app()->getLocale() }}">
                <div class="galler-hovereffect small-size">
                    <img class="small" src="/images/Photosessions/{{ $photo->mainpic }}">
                    <div class="overlay">
                        <h2>{{ $photo->title }}</h2>
                    </div> 
                </div>
            </a> 
            @endif        
            @if($loop->index == 2 || $loop->index == 4 || $loop->index == 8)
            </div>
            @endif

            @endforeach
        </div>
        @endfor
        <nav aria-label="Page navigation example">
            @include('user.pagination', ['paginator' => $data['photos']])
        </nav>
    </div>
</section>
@endsection
@section('script')
    
@endsection