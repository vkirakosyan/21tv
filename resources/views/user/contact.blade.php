@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="/css/contact.css">
@endsection
@section('content')
<section id="contact">
    <div class="container">
        @if($data['contact'])
        <iframe src="https://www.google.com/maps/embed?pb={{$data['contact']->maps}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        @endif
    </div>
</section>
<section id="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-6 contact_box">
                @if($data['contact'])
                <ul>
                    <li><i class="fa fa-map-marker"></i>&nbsp; {{ $data['contact']->address }}</li>
                    <li><i class="fa fa-phone"></i> {{ $data['contact']->phone }}</li>
                    <li><i class="material-icons">email</i> {{ $data['contact']->email }}</li>
                    <li>   
                        <div class="social_icons">
                            <a href="{{ $data['contact']->facebook }}"><i class="icon_fb fa fa-facebook"></i></a>
                            <a href="{{ $data['contact']->instagram }}"><i class="icon_insta fa fa-instagram"></i></a>
                            <a href="{{ $data['contact']->youtube }}"><i class="icon_youtube fa fa-youtube-play"></i></a>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
            <div class="col-md-6 input_box">
                <div class="form-box">
                    <form action="/send_email" style="max-width:500px;margin:auto" method="post">
                        <div class="input-container">
                        <input class="input-field" type="text" placeholder="@lang('archive.name')" name="name">
                        </div>
                    
                        <div class="input-container">
                        <input class="input-field" type="text" placeholder="@lang('archive.email')" name="email">
                        </div>
                        
                        <div class="input-container">                   
                        <input class="input-field" type="number" placeholder="@lang('archive.phone')" name="number">
                        </div>

                        <div class="input-container">
                            <textarea class="message" placeholder="@lang('archive.message')" name="text"></textarea>
                        </div>       
                        {{ csrf_field() }}            
                        <button type="submit" class="btn_1 hvr-push">@lang('archive.send')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    
@endsection