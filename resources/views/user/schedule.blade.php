@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="/css/schedule.css">
@endsection
<?php 
use Carbon\Carbon;
?>
@section('content')
<section id="schedule">
    <div class="container">
        <h3 class="page_title">@lang('navbar.schedule')</h3>
        <div class="cont">
          <!--   <div class="preloadWrap">
              <img src="{{asset('icons/preloader.gif')}}">
          </div> -->
            <div class="carousel">
                
                <div class="owl-carousel owl-theme" >
                    @foreach($data['date_time'] as $date_time)
                    <a href="javascript:void(0)" id="{{ $date_time == $data['activ_day'] ? 'now':''}}"   class='active-day' data-info="{{$date_time}}/{{ app()->getLocale() }}">
                        <div class="item {{$date_time == $data['activ_day']? 'selected' : '' }}" >
                            <span class="scheduleDate__dayOfWeek">{!! __('content.'.explode(' ',$date_time)[0]) !!}</span>
                            <span class="scheduleDate__monthAndDay">{!! __('archive.'.explode(' ',$date_time)[1]).' '.explode(' ',$date_time)[2] !!}</span>
                        </div>
                    </a> 
                   @endforeach
                </div>
            </div>        
        </div>
    </div>
    
    <div class="full_day">
    
        @foreach($data['schedule'] as $schedule)
        <?php 
        $nextScheduleTime = '';
            if ($loop->index != 0) {
                $nextScheduleTime = $data['schedule'][$loop->index-1];
            } else {
               $nextScheduleTime = $data['schedule'][$loop->index];
            }
         ?> 
            @if($schedule->status == 'anons' )
            <a href="/anons_more/{{$schedule->programme_id}}/{{ $schedule->id }}/{{ app()->getLocale() }}"  >
            @elseif($schedule->status == 'episode')
            <a href="/program_more/{{$schedule->programme_id}}/{{ $schedule->id }}/{{ app()->getLocale() }}">
            @else <a href="javascript:void(0)">
            @endif
              
            <div class="episode row {{ ($data['now'] >= $schedule->date && $data['now'] <= $nextScheduleTime->date) ? 'color_white' : ''}} "
                 data="{{ $nextScheduleTime->date }}"
                 style = "{{ ($data['now'] >= $schedule->date && $data['now'] <= $nextScheduleTime->date) ? 'background-color: #cd042d' : '' }}">
                <p class="time col-sm-12 col-md-12 col-lg-3">{{ (new Carbon($schedule->date))->format('H:i') }}</p>
                <div class="col-sm-12 col-md-12 col-lg-3">
                   
                    <img src="/images/Programmes/{{$schedule->photo}}"  >
                  
                </div>
                <h4 class="epis col-sm-12 col-md-12 col-lg-5" >{{ $schedule->prog_name }} </h4>
            </div> 
        </a>
        @endforeach
    </div>
    <div class="loader" style='display:none;'></div>
</section>
<div class="slider">
    <div class="video">
        <div >
            <iframe id="videoFream" width="100%" height="100%" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
    <div class="video-background"></div>
    <i class="material-icons close-button">close</i>
</div>

@endsection
@section('script')
      <script src="/js/schedule.js"></script>
<!--      <script type="text/javascript">
    window.onload=function(){
       var winWidth = window.matchMedia("(max-width:991px)"),
           countClick = 0;
       document.querySelectorAll(".owl-item").forEach((elm)=>{
           if(elm.classList.contains("active")){
               elm.classList.remove("active")
           }
       })
       document.querySelector("#now").parentNode.classList.add("active")
       if(winWidth.matches){
           console.log(991)
           countClick = <?php echo 6 - (Carbon::today()->format('w') - 1) ?>;
              console.log(countClick);
       document.getElementsByClassName("owl-dot")[1].click();
       setTimeout(()=>{
           document.querySelector(".preloadWrap").classList.add('hidePreloader')
       }, 1000)
       }
       else{
           console.log(1200)
               document.querySelector(".preloadWrap").classList.add('hidePreloader')
       }
    

       };
</script> -->   

@endsection
