@section ('header')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="{{url()->current()}}"/>
    @if(isset($data['news'])&&isset($data['news']->header))
        <meta property="og:title" content="{{$data['news']->header}}"/>
        <meta property="og:image" content="{{url("/images/News/".$data["news"]->mainpic)}}"/>
        <meta property="og:description" content="{{str_replace(array("\n", "\r"), '', $data['news']->first_text)}}"/>
        <meta property="og:type" content="article" />
    @endif
    <title>21 TV</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
      <link href="https://fonts.googleapis.com/css?family=Noticia+Text" rel="stylesheet">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/media.css">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    @yield('style')
    <script type="text/javascript">
        window.cotegoryName = []
        window.cotegoryName['news'] = "@lang('navbar.news')"
        window.cotegoryName['programme'] = "@lang('navbar.programmes')"
        window.cotegoryName['photosession'] = "@lang('navbar.photosessions')"
        window.cotegoryName['schedule'] = "@lang('navbar.schedule')"
        window.cotegoryName['language'] = "{{ app()->getLocale() }}"
    </script>
    <script>
window.voting_text = `<div class='vote_thanks_div' style="margin:0px">
    <h5 class="vote_thanks" >@lang('dashboard.voting_text')</h5>
        <a  class="fb-xfbml-parse-ignore icon-button facebook">
            <i class="icon-facebook fa fa-facebook"></i>
            <span></span>
        </a>
    </div>`;
window.voting_text_error= `<div class='vote_thanks_div' style="margin:0px"><h5 class="vote_thanks" >@lang('dashboard.voting_text_error')</h5></div>`;
window.login_face = `<div class='vote_thanks_div'><h5 class="vote_thanks">@lang('dashboard.login_face')</h5></div>`;

    </script>

</head>

<body >
<header>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-scroll">
        <a class="navbar-brand" href="/index/{{ app()->getLocale() }}"><img src="/img/21tv.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-id="0" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto nav-menu header-hover">
                @switch(app()->getLocale())
                    @case('am')
                <li class="only_for_mobile"><a href="am"><img src="/img/hy.png"></a>
                    <a href="{{$data['lang_url']}}/ru"><img src="/img/ru.png"></a>
                    <a href="{{$data['lang_url']}}/en"><img src="/img/en.png"></a>
                </li>
                        @break

                    @case('ru')
                <li class="only_for_mobile"><a href="ru"><img src="/img/ru.png"></a>
                    <a href="{{$data['lang_url']}}/am"><img src="/img/hy.png"></a>
                    <a href="{{$data['lang_url']}}/en"><img src="/img/en.png"></a>
                </li>
                        @break

                    @default
                <li class="only_for_mobile"><a href="en"><img src="/img/en.png"></a>
                    <a href="{{$data['lang_url']}}/am"><img src="/img/hy.png"></a>
                    <a href="{{$data['lang_url']}}/ru"><img src="/img/ru.png"></a>
                </li>
                @endswitch
                    
                <li class="nav-item only_for_mobile">
                    <a class="nav-link" href="/news/{{ app()->getLocale() }}">@lang('navbar.live')</a>
                </li>                   
                <li class="nav-item header-hover-child">
                    <a class="nav-link header-hover-link header-hover-link-2 
                            {{strpos($data['lang_url'],'news')? 'selected-nav-menu' : ''}}" 
                    href="/news/{{ app()->getLocale() }}">@lang('navbar.news')</a>
                </li>            
                <li class="nav-item header-hover-child">
                    <a class="nav-link header-hover-link header-hover-link-2  
                            {{strpos($data['lang_url'],'programme')? 'selected-nav-menu' : ''}}" 
                    href="/programme/{{ app()->getLocale() }}">@lang('navbar.programmes')</a>
                </li>
                <li class="nav-item header-hover-child">
                <a class="nav-link header-hover-link header-hover-link-2  
                            {{strpos($data['lang_url'],'photosession')? 'selected-nav-menu' : ''}}" 
                    href="/photosession/{{ app()->getLocale() }}">@lang('navbar.photosessions')</a>
                </li>
                <li class="nav-item header-hover-child">
                <a class="nav-link header-hover-link header-hover-link-2 
                            {{strpos($data['lang_url'],'schedule')? 'selected-nav-menu' : ''}}" 
                    href="/schedule/{{ app()->getLocale() }}">@lang('navbar.schedule')</a>
                </li>
                <li class="nav-item header-hover-child ">
                <a class="nav-link header-hover-link header-hover-link-2  
                            {{strpos($data['lang_url'],'about_us')? 'selected-nav-menu' : ''}}" 
                    href="/about_us/{{ app()->getLocale() }}">@lang('navbar.about_us')</a>
                </li>
                <li class="nav-item language_mobile">
                    <a class="nav-link" href="{{$data['lang_url']}}/am"><img src="/img/hy.png"></a>
                    <a class="nav-link" href="{{$data['lang_url']}}/ru"><img src="/img/ru.png"></a>
                    <a class="nav-link" href="{{$data['lang_url']}}/en"><img src="/img/en.png"></a>
                </li>
                <li  class="live hvr-bounce-out live_{{app()->getLocale()}}">
                    <a href="#"><div>@lang('navbar.live')</div></a>
                </li>  
                @if(isset($dashboard))
                <li  class="voting hvr-push"><a href="#bottom"><div>@lang('dashboard.voting')</div></a></li>
                @endif
            </ul>                    
                <div class="search-box">
                    {{ csrf_field() }}
                    <?php 
                    $search_page = 'dashboard';
                    if(strpos($data['lang_url'],'news')){
                        $search_page = 'news';
                    } else if(strpos($data['lang_url'],'programme')){
                        $search_page = 'programme';
                    } else if(strpos($data['lang_url'],'photosession')){
                        $search_page = 'photosession';
                    }else if (strpos($data['lang_url'],'schedule')){
                        $search_page = 'schedule';
                    }

                    ?>
                    <input type="text" placeholder="@lang('navbar.search')" search-page="{{ $search_page }}" class="input" id="txtSearch1" >
                    <div class="btn">
                        <i class="material-icons">search</i>
                    </div>
                </div>            
            <ul class="navbar-nav mr-auto language">
                <li class="nav-item dropdown">
                    @switch(app()->getLocale())
                    @case('am')
                        <a class="nav-link dropdown-toggle" href="{{$data['lang_url']}}/am" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/img/hy.png"> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{$data['lang_url']}}/ru"><img src="/img/ru.png"></a>
                            <a class="dropdown-item" href="{{$data['lang_url']}}/en"><img src="/img/en.png"></a>
                        </div>
                        @break

                    @case('ru')
                    <a class="nav-link dropdown-toggle" href="{{$data['lang_url']}}/ru" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/img/ru.png"> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{$data['lang_url']}}/am"><img src="/img/hy.png"></a>
                        <a class="dropdown-item" href="{{$data['lang_url']}}/en"><img src="/img/en.png"></a>
                    </div>
                        @break

                    @default
                     <a class="nav-link dropdown-toggle" href="{{$data['lang_url']}}/ru" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/img/en.png"> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{$data['lang_url']}}/am"><img src="/img/hy.png"></a>
                        <a class="dropdown-item" href="{{$data['lang_url']}}/ru"><img src="/img/ru.png"></a>
                    </div>
                @endswitch
                    

                </li>
            </ul>            
        </div>           
    </nav>
        <div class="row mobile_search">
        <!-- <div class="col-xl-4 col-lg-4 col-sm-12">   -->      
        <div class="col-xl-12 col-lg-12 col-sm-12">      
            <div class="input-group pull-right">
                <input type="text" class="form-control" placeholder="@lang('navbar.search')" search-page="{{ $search_page }}" id="txtSearch2"/>
                <div class="input-group-btn pull-right">
                    <button class="btn btn-danger" type="button" id="search_B">
                        <span class="glyphicon glyphicon-search"><i class="material-icons">search</i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="live-and-pool">
        @if(isset($dashboard))
        <div class="live-mobile hvr-bounce-out"> <a href="#"><div>@lang('navbar.live')</div></a></div>
        <div  class="voting-mobile hvr-push"><a href="#bottom"><div>@lang('dashboard.voting')</div></a></div>
        @endif
    </div>
</header>
    @show
    @yield('content')
    @section('footbar')
    <div class="search_pages">
        <div id="search_result">

        </div>
    </div>
    <footer id="footer-web" class="{{isset($data['schedule']) && count($data['schedule']) == 0 ? 'footer_fix' : ''}}">    
    <div class="foot-width">
        <div class="row">            
            <div class="col-xs-1 col-md-6">
                <div class="foot_logo">
                    <img class="footer_logo" src="/img/21tv.png">
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="/contact/{{ app()->getLocale() }}">@lang('footer.contact')</a> 
                            </li>
                            <li>
                                <a href="/work/{{ app()->getLocale() }}">@lang('footer.workers')
                            </a>     
                            </li>
                            <li>
                                <a href="/archive/{{ app()->getLocale() }}">@lang('footer.arxiv') </a>      
                            </li>
                        </ul>
                    </div>                    
                </div>
            </div>
            <div class="col-xs-1 col-md-2">
                <div class="social_icons">
                    @if($data['contact'])
                    <a href="{{  $data['contact']->facebook }}" target="_blank"><i class="icon_fb fa fa-facebook"></i></a>
                    <a href="{{  $data['contact']->instagram  }}" target="_blank"><i class="icon_insta fa fa-instagram"></i></a>
                    <a href="{{  $data['contact']->youtube  }}" target="_blank"><i class="icon_youtube fa fa-youtube-play"></i></a>
                    @endif
                </div>                                 
            </div>
            <div class="col-xs-1 col-md-4">
                <div class="footer-end">
                    <p> @lang('footer.rights') </p>
                    <a target="_blank" href="http://arssystems.am/"> @lang('footer.company') </a>
                </div>
            </div>            
        </div>
    </div> 
</footer>
<footer id="footer-mobile" class="{{isset($data['schedule']) && count($data['schedule']) == 0 ? 'footer_fix' : ''}}">
    <div class="foot-width">
        <div class="menu-mobile">
            <ul>
                <li>
                    <a href="/contact/{{ app()->getLocale() }}"> @lang('footer.contact') </a> 
                </li>
                <li>
                    <a href="/archive/{{ app()->getLocale() }}"> @lang('footer.arxiv')  </a>     
                </li>
                <li>
                    <a href="/work/{{ app()->getLocale() }}">@lang('footer.workers') </a>      
                </li>
            </ul>
        </div>                    
    </div>    
    <div class="social_icons">
        @if(isset($data['contact']))
        <a href="{{  $data['contact']->facebook }}" target="_blank"><i class="icon_fb fa fa-facebook"></i></a>
        <a href="{{  $data['contact']->instagram }}" target="_blank"><i class="icon_insta fa fa-instagram"></i></a>
        <a href="{{  $data['contact']->youtube }}" target="_blank"><i class="icon_youtube fa fa-youtube-play"></i></a>
        @endif
    </div>    
    <div class="foot-logo-mobile">
        <img class="footer-logo-mobile" src="/img/21tv.png">
        <div class="footer-end-mobile">
            <p>@lang('footer.rights')</p>
            <a href="http://arssystems.am/"> @lang('footer.company') </a>
        </div>
    </div>    
</footer >
    <script src="/js/owl.carousel.min.js"> </script>
    @yield('script')
  
        <script src="/js/script.js"></script> 
</body>
</html>
    @show