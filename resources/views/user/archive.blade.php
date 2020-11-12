@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
<link rel="stylesheet" href="/css/archive.css">
<link rel="stylesheet" href="/css/programs.css">
<link rel="stylesheet" href="/css/view-all-time.css">
@endsection
@section('content')
<section id="filter">
    <!-- Archive filter    -->
    <div class="container">
            <h3 class="page_title">@lang('archive.archive')</h3>
        <div class="row">
            <div class="filter-type col-md-3">
                <div class="autocomplete">
                    @if(isset($data['episodes']->programme))
                    <input type="text" placeholder="@lang('archive.search')" id="programme_text" value="{{$data['episodes']->programme}}">
                    @else
                    <input type="text" placeholder="@lang('archive.search')" id="programme_text">
                    @endif
                    <div class="dialog"></div>
                </div>
            </div>
            <div class="filter-type col-md-3">
                <div class="dropdown-1">
                    <div class="caption">
                     @if(isset($data['episodes']->day))
                            {{$data['episodes']->day}}

                       @else

                        @lang('archive.day')
                     @endif
                        <i class="arrow_bottom material-icons">keyboard_arrow_down</i>
                    </div>
                        <div class="list" id = "day">
                            @for($i = 1; $i <= 31; $i++)
                                <div class="item">{{$i}}</div>
                            @endfor
                        </div>
                </div>
            </div>
            <div class="filter-type col-md-3">
                <div class="dropdown-2">
                    <div class="caption" data-type="0">

                        @if(isset($data['episodes']->month) && ($data['episodes']->month != null))
                        <?php 
                            $month=$data['episodes']->month;
                        ?>
                            @lang("archive.$month")
                             @else 
                            @lang('archive.month')
                        @endif
                        <i class="arrow_bottom material-icons">keyboard_arrow_down</i>
                    </div>
                        <div class="list" id="month">
                            <div class="item" data-type="1">@lang('archive.January')</div>
                            <div class="item" data-type="2">@lang('archive.February')</div>
                            <div class="item" data-type="3">@lang('archive.March')</div>
                            <div class="item" data-type="4">@lang('archive.April')</div>
                            <div class="item" data-type="5">@lang('archive.May')</div>
                            <div class="item" data-type="6">@lang('archive.June')</div>
                            <div class="item" data-type="7">@lang('archive.July')</div>
                            <div class="item" data-type="8">@lang('archive.August')</div>
                            <div class="item" data-type="9">@lang('archive.September')</div>
                            <div class="item" data-type="10">@lang('archive.October')</div>
                            <div class="item" data-type="11">@lang('archive.November')</div>
                            <div class="item" data-type="12">@lang('archive.December')</div>
                        </div>
                </div>
            </div>
            <div class="filter-type col-md-3">
                <div class="dropdown-3">
                    <div class="caption">
                        @if(isset($data['episodes']->year))
                            {{$data['episodes']->year}}
                            @else
                        @lang('archive.year')
                        @endif
                        <i class="arrow_bottom material-icons">keyboard_arrow_down</i>
                    </div>
                        <div class="list" id="year">
                        @for($i=Carbon::today()->format('Y'); $i > (Carbon::today()->format('Y')-5); $i--)
                            <div class="item">{{$i}}</div>
                        @endfor
                        </div>
                </div>
            </div>
        </div>
        <form action="/archive/{{ app()->getLocale() }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="programme" id="programme">
            <input type="hidden" name="day" id="day">
            <input type="hidden" name="month" id="month">
            <input type="hidden" name="year" id="year">
            <button type="submit" class="filter-button hvr-push">@lang('archive.search')</button>
        </form>
    </div>
</section>
<section id="programs">
    <div class="programs_bg">
    <div class="container">      
        <div class="row">
           @foreach($data['episodes'] as $episode) 
            <div class="program_distance col-12 col-md-6 col-xl-4 ">
                <div class="program">
                    @if(isset($data['type']))
                    <a href="/archive_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                                         
                                <i class="play-video-icon material-icons">&#xe039;</i>
                                    <div class="program_hover">
                                        <figure>       
                                            <img src="https://img.youtube.com/vi/{{$episode->video_url}}/mqdefault.jpg" data-videoindex='0'  >
                                        </figure>
                                    </div>
                                <h2>{{$episode->name}}</h2>
                            </a>
                            @else
  <a href="/archive_more/{{$episode->programme_id}}/{{ app()->getLocale() }}">                
                        <div class="program_hover">
                            <figure>  <img src="/images/Programmes/{{ $episode->photo }}" alt=""></figure>
                        </div>
                        <h2>{{$episode->name}}</h2>
                    </a>
                            @endif
                  
                </div>
            </div>
            @endforeach
            <div class="danger">
                @if(isset($data['type']) &&  $data['episodes'][0] == '')
                    <p>@lang('archive.nothing')</p>
                    </div>
            @endif

        </div>
        <nav aria-label="Page navigation example">
            @include('user.pagination', ['paginator' => $data['episodes']])
        </nav>
    </div>      
    </div>
</section>
@endsection
@section('script')
    <script src="/js/archive-filter.js"></script>
@endsection