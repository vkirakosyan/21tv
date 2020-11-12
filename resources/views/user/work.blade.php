@extends('layouts.front')
@section('style')
<meta property="og:url"      content="http://localhost" />
<meta property="og:type"     content="work" />
<meta property="og:title"    content="@lang('footer.workers')" />
<meta property="og:description" content="@lang('footer.workers')" />
<meta property="og:image"    content="/img/share.jpg" />
<link rel="stylesheet" href="/css/work.css">
<link rel="stylesheet" href="/css/facebook-share.css">
@endsection
@section('content')
<div id="fb-root"></div>
<section id="work">
    <div class="container">
        <h3 class="page_title">@lang('content.job_vacancies')</h3>
        <div class="row">
            @foreach($data['work'] as $work)
            <div class="works works-color-1 col-md-6 col-lg-6 col-xl-4" data-id="{{ $loop->index }}">
                <h4>{{ $work->header }}</h4>
                <div class="text-elipsis">
                    <p>
                        {{ $work->small_text }}
                    </p>
                </div>
                    <div class="work-more-button" data-id="{{ $loop->index }}">@lang('dashboard.view_more')</div>
                    <div class="rotate_div arrow" {{ $loop->index == 0 ? '': "data-id='-1'" }}></div>
            </div>
            <div class="toggle_container col-12 abs" data-id="{{ $loop->index }}">
                <div class="work-more" data-id="{{ $loop->index }}">
                    <!-- <h3></h3> -->
                    <p>
                        {{ $work->text }}
                    </p>
        <div class="form-group">
            <div class="text-center">
                <div class="fb-share-button"  data-layout="button" data-size="small" data-mobile-iframe="true">
                    <a onclick="shareOverrideOGMeta('{{asset('/')}}','@lang('footer.workers')','@lang('footer.workers')','http://localhost:8000/img/share.jpg' )" class="fb-xfbml-parse-ignore icon-button facebook">
                        <i class="icon-facebook fa fa-facebook"></i>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>

                </div>
            </div>  
           @endforeach 
        </div>        
    </div>
</section>
@endsection
@section('script')
  <script src="/js/work.js"></script> 
  @if(count($data['work'])==0)
  <script>
      $('footer').attr('style', 'position: fixed!important; bottom: 0px;width:100%');
  </script>
  @endif
@endsection