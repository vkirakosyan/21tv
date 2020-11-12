@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
<link rel="stylesheet" href="/css/programs_more.css">

    <link rel="stylesheet" href="/css/view-all-time.css">
<!-- <meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="When Great Minds Don’t Think Alike" />
<meta property="og:description"        content="How much does culture influence creative thinking?" />
<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" /> -->
@endsection
@section('content')
<section id="programs_more">
      <div id="fb-root"></div>
       
    <div class="container">
        @if($data['page'] !== 'archive')
       <div>
            
                    <a class="episode" href="/program_more/{{$data['programme_id']}}/{{ app()->getLocale() }}">
                        <button class='episode-btn' type="button" <?php if($data['page'] == 'episode'){echo "disabled"; echo " id='anons-btn'";};?>>@lang('dashboard.episode')</button>
                    </a>
           
                    <a class="episode" href="/anons_more/{{$data['programme_id']}}/{{ app()->getLocale() }}">
                        <button class=" episode-btn" type="button" <?php if($data['page'] == 'anons'){echo "disabled"; echo " id='anons-btn'";};?>>@lang('dashboard.anons')
                        </button>
                    </a>
        </div><hr>
                    @endif
        @if($data['this_episode'])
        <h4 class="episode-title">{{$data['this_episode']->name}}</h4>
    <?php 
    if(isset($episode->date)){
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $data['this_episode']->date)->format('j F \\, Y');
        $date = explode(' ',$date);
        $date[1] = __('archive.'.$date[1]);
         echo "<p>". join(' ', $date) ."</p>";
     }

    ?>
       
        <iframe width="100%" height="515" src="https://www.youtube.com/embed/{{$data['this_episode']->video_url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
       
<div class="form-group">
            <div class="text-center">
                <div class="fb-share-button"  data-layout="button" data-size="small" data-mobile-iframe="true">
                    <a  onclick="shareOverrideOGMeta('/','{{$data['this_episode']->programme->name}}')" class="fb-xfbml-parse-ignore icon-button facebook">
                        <i class="icon-facebook fa fa-facebook"></i>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>


 @endif 
    </div>
    <div class="container-fluid">
        <div class="main">
            <div class="carousel">        
                <div class="content">
                    <div class="owl-carousel owl-theme">
                        @foreach($data['episode'] as $episode)
                        @if($episode->status != 'picture')
                            <div class="program">
                                <?php 
                                if(isset($episode->date)){
                                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $episode->date)->format('j F \\, Y');
                                    $date = explode(' ',$date);
                                    $date[1] = __('archive.'.$date[1]);
                                    echo "<p>". join(' ', $date) ."</p>";

                                    }
                                     else{
                                        echo "<p style='opacity:0'>.</p>";
                                                    }
                                ?>
                                
                                @if($episode->video_url)
                                @if($data['page']=='anons')
                                <a href="/anons_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                                @endif
                               @if($data['page']=='episode')
                                <a href="/program_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">  
                                @endif

                                @if($data['page']=='archive') 
                                 <a href="/archive_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                                 @endif            
                                    <i class="play-video-icon material-icons">&#xe039;</i>
                                        <div class="program_hover">
                                            <figure>
                                                
                                                <img src="https://img.youtube.com/vi/{{$episode->video_url}}/mqdefault.jpg" data-videoindex='0'  >
                                           
                                            </figure>
                                        </div>
                                    <h2>{{$episode->name}}</h2>
                                </a>
                                @else
                                 <div class="program_hover">
                                            <figure>
                                          
                                                
                                                <img src="/images/Episodes/{{$episode->photo}}">
                                                
                                            </figure>
                                        </div>
                                    <h2>{{$episode->name}}</h2>
                                    @endif
                                </div>
                                @endif
                       
                        
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
         @if($data['this_episode'] && $data['page']=='anons')
            <a class="show_full_day" href="/anons_view/{{ $data['this_episode']->programme_id }}/{{ app()->getLocale() }}">
                <div >
                    @lang('dashboard.all')
                </div>
            </a> 
        @endif     
        @if($data['this_episode'] && $data['page']=='episode')
            <a class="show_full_day" href="/episods_view/{{ $data['this_episode']->programme_id }}/{{ app()->getLocale() }}">
                <div >
                    @lang('dashboard.all')
                </div>
            </a> 
        @endif 
          @if($data['this_episode'] && $data['page']=='archive')
            <a class="show_full_day" href="/archive_view/{{ $data['this_episode']->programme_id }}/{{ app()->getLocale() }}">
                <div >
                    @lang('dashboard.all')
                </div>
            </a> 
        @endif 
    </div>        
</section>
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
  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.1&appId=984667291631226&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</script>
  
    <script src="/js/programs_more.js"></script>
@endsection