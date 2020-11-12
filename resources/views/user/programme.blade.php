@extends('layouts.front')
@section('style')
<link rel="stylesheet" href="/css/programs.css">
@endsection
@section('content')
<section id="programs">
    <div class="programs_bg">
    <div class="container">
        <h3 class="page_title">@lang('dashboard.programs')</h3>
        <div class="row">
            @foreach($data['programme'] as $programe)
            <div class="program_distance col-12 col-md-6 col-xl-4 ">
                <div class="program">


                
                @if($programe->is_picture)
                <a href="javascript:void(0)">
                @else
                    <a href="/program_more/{{ $programe->id }}/null/{{ app()->getLocale() }}"> 
                    @endif           
                        <div class="program_hover">
                            <figure>  <img src="/images/Programmes/{{ $programe->photo }}" alt=""></figure>
                        </div>
                        <h2>{{$programe->name}}</h2>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
           @include('user.pagination', ['paginator' => $data['programme']])
        </nav>
    </div>      
    </div>
</section>
@endsection
@section('script')
    
@endsection