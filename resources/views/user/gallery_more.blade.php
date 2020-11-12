@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
<link rel="stylesheet" href="/css/gallery_more.css">
@endsection
@section('content')
<div class="slider">
    <div class="container">
       <div id="carouselControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach(json_decode($data['photos']->photos) as $photo)
                <div class="carousel-item {{$loop->index == 0 ? 'active' : '' }}" data-type='{{ $loop->index }}'>
                    <img class="d-block w-100 " src="/images/Photosessions/{{$photo}}" >
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon " aria-hidden="true">
                </span>
                <span class="slide-count-prev">
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="slide-count-next">
                </span>
                <span class="carousel-control-next-icon " aria-hidden="true">
                   
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <i class="material-icons close-button">close</i>
</div>
<section id="gallery_more"> 
    <div class="container">
        @if($data['photos'])
        <h3 class="page_title">{{ $data['photos']->title }}</h3> 
        @endif
        <?php 
            $date = Carbon::createFromFormat('Y-m-d', $data['photos']->date)->format('j F \\, Y');
            $date = explode(' ',$date);
            $date[1] = __('archive.'.$date[1]);
        ?>
        <p>{{join(' ', $date)}}</p>
        <div class="row">
        @foreach(json_decode($data['photos']->photos) as $photo)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 ">                        
                <div class="all_photos" data-type='{{ $loop->index }}'>
                @if($loop->index > 0)
                    <img src="/images/Photosessions/{{ $photo }}">
                @else
                    <img class="photo-zoom" src="/images/Photosessions/{{ $photo }}">
                @endif
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection
@section('script')
    <script src="/js/gallery_more.js"></script>
@endsection
