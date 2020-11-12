@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
    <link rel="stylesheet" href="/css/view-all-time.css">
@endsection
@section('content')
<section id="programs">
    <div class="programs_bg">
    <div class="container">
        @if($data['episodes'])
        <h3 class="page_title">{{$data['episodes'][0]->programme->name}}</h3>
        @endif
        <div class="row">
            @foreach($data['episodes'] as $episode)
            @if($episode->status != 'picture')
            <div class="program_distance col-12 col-md-6 col-xl-4">
    <?php 
    if(isset($episode->date)){
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $episode->date)->format('j F \\, Y');
        $date = explode(' ',$date);
        $date[1] = __('archive.'.$date[1]);
        echo "<span>". join(' ', $date) ."</span>";
    }
    else{
        echo "<span style='opacity:0'>.</span>";
    }
    ?>

            
            <!--     <div class="program">
            <a href="/program_more/{{$episode->programme_id}}/{{$episode->id}}">                
                <i class="play-video-icon material-icons">&#xe039;</i>
                    <div class="program_hover">
                        <figure>
                            @if($episode->video_url)
                            <img src="https://img.youtube.com/vi/{{$episode->video_url}}/mqdefault.jpg" data-videoindex='0'  >
                            @else
                            <img src="/images/Episodes/{{$episode->photo}}">
                            @endif
                        </figure>
                    </div>
                <h2>{{$episode->name}}</h2>
            </a>
            </div> -->
             <div class="program">
                           
                         <!--        @if($episode->video_url) -->

                                @if( $data['page']=='episode')
                                <a href="/program_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                               
                                @elseif( $data['page']=='archive')
                                 <a href="/archive_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                                 @elseif($data['page']=='anons')
                                 <a href="/anons_more/{{$episode->programme_id}}/{{$episode->id}}/{{ app()->getLocale() }}">
                                @endif                
                                    <i class="play-video-icon material-icons">&#xe039;</i>
                                        <div class="program_hover">
                                            <figure>       
                                                <img src="https://img.youtube.com/vi/{{$episode->video_url}}/mqdefault.jpg" data-videoindex='0'  >
                                            </figure>
                                        </div>
                                    <h2>{{$episode->name}}</h2>
                                </a>
                             <!--    @else
                              <div class="program_hover">
                                         <figure>
                                             <img src="/images/Episodes/{{$episode->photo}}">
                                         </figure>
                                     </div>
                                 <h2>{{$episode->name}}</h2>
                                 @endif -->
                                </div>
            </div>
            @endif
           @endforeach
          
        </div>  

    </div> 
             <nav aria-label="Page navigation example" class="pagination">
            @include('user.pagination', ['paginator' => $data['episodes']])
 </nav>
</section>


 
@endsection
@section('script')
    
@endsection


