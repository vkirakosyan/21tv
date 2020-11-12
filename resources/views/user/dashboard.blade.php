@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
<link rel="stylesheet" href="/css/facebook-share.css">
@endsection
@section('content')
<section id="pictures">
    <div class="container-fluid">
        <div class="row">
            @if($data['top_image'])
            <div class="col-4">
                <img src="/images/Top_Images/{{$data['top_image']->first_img}}">
            </div>
            <div class="col-4">
                <img src="/images/Top_Images/{{$data['top_image']->second_img}}">
            </div>
            <div class="col-4">
                <img src="/images/Top_Images/{{$data['top_image']->third_img}}">
            </div>
            @endif
        </div>
    </div>
</section>
<section id="news">
    <div class="container">
    <a href="/news"><h3 class="page_title">@lang('dashboard.news')</h3></a>
        <div class="row">
            @foreach ($data['news'] as $news)
            <div class=" col-md-6 col-sm-6 col-xs-12 col-lg-4 col-xl-3 image-heigth-control">
                <a href="/news_more/{{$news->id}}/{{ app()->getLocale() }}">
                    <div class="height-100">                    
                        <div class="hovereffect">
                            <img class="img-responsive" src="/images/News/{{$news->mainpic}}" alt="">
                            <div class="overlay">
                                <?php 
                                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $news->updated_at)->format('j F \\, Y');
                                    $date = explode(' ',$date);
                                    $date[1] = __('archive.'.$date[1]);
                                ?>
                                <h2>{{join(' ', $date)}}</h2>
                            </div>
                        </div>
                    </div>
                    <h4 class="news-margin">{{$news->header}}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>    
<section id="programs">
    <div class="programs_bg" style="
    background-color: #EEE;">
    <div class="container">        
        <a href="/programme"> <h3 class="page_title">@lang('dashboard.programs')</h3></a>
            <div class="row">
                @foreach($data['programme'] as $programme)
                    <div class="program_distance col-sm-6 col-md-6 col-lg-6 col-xl-4 ">            
                        <div class="program">
                        @if($programme->is_picture)
                                <a href="javascript:void(0)">
                            @else
                            <a href="/program_more/{{ $programme->id }}/null/{{ app()->getLocale() }}">
                             @endif
                                <div class="program_hover">
                                    <figure>  <img src="/images/Programmes/{{$programme->photo}}" alt=""></figure>
                                </div>
                                <h2>{{$programme->name}}</h2>
                            </a>
                       
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </div>
</section>
<section id="voting_1">
    <a name="bottom"></a>
    <div class="container">   
        <h3 class="page_title">@lang('dashboard.voting')</h3></a>
        <div class="row">

            <div class="col-12 col-lg-12 col-xl-4">
                 @if($data['questions_first']) 
                <div class="zoom">
                    <div class="remove_div">   
                        <h4 id="yes_no_question" data-type="{{$data['questions_first']->id}}">{{$data['questions_first']->question}}</h4>
                        <div class="yes_or_no">
                            @if(!isset($data['questions_first']->choices[0]))

                                <a class="hvr-push button_enable_yes_or_no" data-type="1"><span>@lang('dashboard.yes')</span></a>
                                <a class="hvr-push button_enable_yes_or_no" data-type="2"><span>@lang('dashboard.no')</span></a>
                            @else
                                @foreach($data['questions_first']->choices as $choice)

                                    <a class="hvr-push button_enable_yes_or_no" data-type="{{$choice->id}}"><span>{{$choice->choice}}</span></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="facebookStatus yes_no">
                        <div class="facebookBlock">
                            <fb:login-button scope="public_profile,email" onlogin="checkLoginState()">
                            </fb:login-button>
                        </div>
                    </div>
                </div>
                @else
                <div class="zoom" style="overflow: hidden;">
                    <img src="{{!empty($data['polls_image_yesno'])?'/images/Polls/'.$data['polls_image_yesno']->image : ''}}" width="100%">
                </div>
                @endif
            </div>
            <div class="col-12 col-lg-12 col-xl-4">
                @if(isset($data['polls_hot10']) && isset($data['polls_hot10'][0]) && $data['polls_hot10'][0]->status == 0)
                <div class="zoom" style="overflow: hidden;">
                    <img src="{{!empty($data['polls_image'])?'/images/Polls/'.$data['polls_image']->image : ''}}" width="100%">
                </div>
                @else
                <div class="zoom">
                <div class="tabs">              
                    <ul class="tab-links">
                        <li class="active"><a class="tablinks hvr-sweep-to-left" href="#tab1">@lang('dashboard.top10')</a></li>
                        <li><a class="tablinks hvr-sweep-to-right" href="#tab2">@lang('dashboard.hot10')</a></li>                        
                    </ul>
                        <div class="tab-content">
                            <div  id="tab1" class="tab active">
                            <div  class="remove_div ">
                                <form id="tab_first">
                                    {{ csrf_field() }} 
                                    @foreach ($data['polls_hot10'] as $polls)
                                    <div class="pool_text custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="defaultGroupExample{{$loop->index}}" name="groupOfDefaultRadios1" candidate=0 data-id="{{$polls->id}}">
                                        <label class="custom-control-label button-top11" for="defaultGroupExample{{$loop->index}}">
                                            <span>{{$loop->iteration}}.</span>&ensp;&#160;  {{$polls->options}}
                                        </label>
                                    </div>                
                                     @endforeach       
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          @lang('dashboard.conditate')
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($data['candidate_hot10'] as $candidate)
                                            <li><div class="pool_text custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample1{{$loop->index}}" candidate=1 data-id="{{$candidate->id}}"  name="groupOfDefaultRadios1">
                                                <label class="custom-control-label button-top11" for="defaultGroupExample1{{$loop->index}}">
                                                    <span>{{$loop->iteration}}.</span>&#160; {{$candidate->options}}</label>
                                            </div></li>
                                            @endforeach                             
                                        </ul>
                                      </div>
                                    <button type="button" class="hvr-push button_enable_top11 pool_button btn btn-danger" disabled>@lang('dashboard.vote')</button> 
                                </form> 
                            </div>
                                <div class="facebookStatus facebookStatus_top11 top11">
                                    <div class="facebookBlock">
                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState()">
                                        </fb:login-button>
                                    </div>
                                </div>        
                            </div>

                            <div id="tab2" class="tab">
                                 <div  class="remove_div ">
                                    <form id="tab_last" >
                                        {{ csrf_field() }} 
                                    @foreach ($data['polls_hat10'] as $polls)
                                    <div class="pool_text custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="1defaultGroupExample2{{$loop->index}}" name="groupOfDefaultRadios2" candidate=0 data-id="{{$polls->id}}">
                                        <label class="custom-control-label button-top10" for="1defaultGroupExample2{{$loop->index}}">
                                            <span>{{$loop->iteration}}.</span>&ensp;&#160;  {{$polls->options}}
                                        </label>
                                    </div>                
                                    @endforeach 

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          @lang('dashboard.conditate')
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            @foreach ($data['candidate_hat10'] as $candidate)
                                            <div class="pool_text custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample12{{$loop->index}}" name="groupOfDefaultRadios2" candidate=1 data-id="{{$candidate->id}}">
                                                <label class="custom-control-label button-top10" for="defaultGroupExample12{{$loop->index}}">
                                                    <span>{{$loop->iteration}}.</span>&#160; {{$candidate->options}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                      </div>

                                    <button type="button" class="hvr-push button_enable_top10 pool_button btn btn-danger" disabled >@lang('dashboard.vote')</button>     
                                    </form>           
                            </div> 
                            <div class="facebookStatus facebookStatus_top10 top10">
                                    <div class="facebookBlock">
                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState()">
                                        </fb:login-button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="remove_div col-12 col-lg-12 col-xl-4">
                @if($data['questions_text'])
                <div class="zoom">
                    <div class="remove_div">
                        <h4 id="question_text">
                            
                                {{$data['questions_text']->question}}
                           
                        </h4>
                        <div class="third-poll">
                            <textarea name="" id="answer_text" ></textarea>
                            {{ csrf_field() }}   
                            <button type="button" data-type="{{$data['questions_text']->id}}" class="hvr-push answer-btn btn btn-danger" disabled>@lang('dashboard.send')</button>
                        </div>
                    </div>
                    <div class="facebookStatus facebookStatus_text_answer text_answer">
                        <div class="facebookBlock">
                            <fb:login-button class='fb' scope="public_profile,email" onlogin="checkLoginState()">
                            </fb:login-button>
                        </div>
                    </div>
                </div>

            </div>
            
             @else
             <div class="zoom" style="overflow: hidden;">
                    <img src="{{!empty($data['polls_image_text'])? '/images/Polls/'.$data['polls_image_text']->image : ''}}" width="100%">
                </div>
                 @endif
        </div>
    </div>
</section>
@endsection
@section('script')
    
@endsection