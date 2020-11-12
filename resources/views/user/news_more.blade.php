@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
    <link rel="stylesheet" href="/css/news.css">
    <link rel="stylesheet" href="/css/news_more.css">
    <link rel="stylesheet" href="/css/gallery_more.css">
     <link rel="stylesheet" href="/css/facebook-share.css">
@endsection

@section('content')
@if($data['news']->fasc_status)
    <div id="fb-root"></div>
@endif
<section id="news_more">
    <div class="container">
        <h2>{{$data['news']->header}}</h2>
        <?php 
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $data['news']->updated_at)->format('j F \\, Y');
            $date = explode(' ',$date);
            $date[1] = __('archive.'.$date[1]);
        ?>
        <span>{{join(' ', $date)}}</span>
        <img src="/images/News/{{$data['news']->mainpic}}">
        <p>
            {{$data['news']->first_text}}
        </p>
        @if(isset($data['news']->photo))
        <div class="all_photos" data-type="0">
            <div class="photo-number">
            
                <span>{{count(json_decode($data['news']->photo))}} @lang('content.pic')</span>
              
                <div class="slide-icon">
                    <div class="icon-1"></div>
                    <div class="icon-2"></div>
                </div>
            </div>
            <img src="/images/News/{{(json_decode($data['news']->photo))[0]}}">


        </div>
          @endif
            <p>
                {{$data['news']->text}}
            </p>
        @if($data['news']->video_url)
            <iframe width="100%" height="515" src="https://www.youtube.com/embed/{{$data['news']->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        @endif
       @if($data['news']->fasc_status)
    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
        @endif
</div>
    <div class="form-group">
        <div class="text-center">
            <div class="fb-share-button"  data-layout="button" data-size="small" data-mobile-iframe="true">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="fb-xfbml-parse-ignore icon-button facebook">
                    <i class="icon-facebook fa fa-facebook"></i>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</section>
@if(isset($data['news']->photo))
<div class="slider">
    <div class="container">
       <div id="carouselControls" data-interval="false" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            
                @foreach(json_decode($data['news']->photo) as $photo)

                <div class="carousel-item {{$loop->index == 0 ? 'active' : '' }}" data-type='{{ $loop->index }}'>
                    <img class="d-block w-100 " src="/images/News/{{$photo}}" >
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
  @endif
@endsection
@section('script')

    <script>

function shareOverrideOGMeta(overrideLink, overrideTitle, overrideDescription, overrideImage)
{
    FB.ui({
        method: 'share_open_graph',
        action_type: 'og.likes',
        action_properties: JSON.stringify({
            object: {
                'og:url': overrideLink,
                'og:title': overrideTitle,
                'og:description': overrideDescription,
                'og:image': overrideImage
            }
        })
    },
    function (response) {
    // Action after response
    });
}


        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script src="/js/gallery_more.js"></script>
@endsection