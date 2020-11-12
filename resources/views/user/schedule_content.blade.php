
        <?php 
        use Carbon\Carbon;
        ?>
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
        <!--  -->