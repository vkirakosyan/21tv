@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="/css/about_us.css">
@endsection
@section('content')
<section id="about_us">
    @if($data['about_us']) 
    <div class="image_div">
        <img src="/images/AboutUs/{{$data['about_us']->mainpic}}">
    </div>
     <div class="container"> 
    <h2>
        {{ $data['about_us']->header1 }}
    </h2>
    @endif
     
    @if($data['about_us'])     
        <p>
            {{ $data['about_us']->text1 }}
        </p>

        <h2>{{ $data['about_us']->header2 }}</h2>
        <p>
            {{ $data['about_us']->text2 }}
        </p>
        @endif
    </div>
</section>
@endsection
@section('script')
    
@endsection