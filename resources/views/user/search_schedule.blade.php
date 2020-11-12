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
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $schedule->date)->format('j F \\, Y H:i');
            $date = explode(' ',$date);
            $date[1] = __('archive.'.$date[1]);
         ?> 
        <a href="/program_more/{{$schedule->programme_id}}/{{ $schedule->id }}/{{ app()->getLocale() }}">
            <div class="episode row"
                 data="{{ $nextScheduleTime->date }}">
                <p class="time col-sm-12 col-md-12 col-lg-3">{{ join(' ', $date) }}</p>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <img src="/images/Programmes/{{ $schedule->programme->photo }}" >
                </div>
                <h4 class="epis col-sm-12 col-md-12 col-lg-5" >{{ $schedule->name }} </h4>
            </div> 
        </a>
        @endforeach
    </div>
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
@endsection