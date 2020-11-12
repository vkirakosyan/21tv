@extends('layouts.front')
<?php 
use Carbon\Carbon;
?>
@section('style')
    <link rel="stylesheet" href="/css/news.css">
@endsection
@section('content')
<section id="news_2">
    <div class="container">
    <h3 class="page_title">@lang('dashboard.news')</h3>
        <div class="row">
            @foreach($data['news'] as $news)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="color">
                    <?php 
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $news->updated_at)->format('j F \\, Y');
                        $date = explode(' ',$date);
                        $date[1] = __('archive.'.$date[1]);
                    ?>
                    <span class="news_date">{{join(' ', $date)}}</span>
                    <a href="/news_more/{{$news->id}}/{{ app()->getLocale() }}"> 
                        <img src="/images/News/{{$news->mainpic}}">
                        <div class="news-header">
                        <h4>{{$news->header }}</h4>
                    </div>
                    </a>
                    <p>{{$news->first_text}} <a href="/news_more/{{$news->id}}"> <span class="dots">...</span>
                    </a> 
                    </p>
                </div>
            </div>
           @endforeach
        </div>
        <nav aria-label="Page navigation example">
            @include('user.pagination', ['paginator' => $data['news']])
        </nav>
</section>
@endsection
@section('script')
@endsection