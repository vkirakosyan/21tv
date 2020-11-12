@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">News {{ $news->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/news/' . $news->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/news', $news->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete News',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $news->id }}</td></tr>
                                    <tr><th> English header </th><td> {{ $news->header_en }} </td></tr>
                                    <tr><th> Russian header </th><td> {{ $news->header_ru }} </td></tr>
                                    <tr><th> Armenian header </th><td> {{ $news->header_am }} </td></tr>
                                    <tr><th> English first text </th><td> {{ $news->first_text_en }} </td></tr>
                                    <tr><th> Russian text </th><td> {{ $news->first_text_ru }} </td></tr>
                                    <tr><th> Armenian text </th><td> {{ $news->first_text_am }} </td></tr>
                                    <tr><th> English text </th><td> {{ $news->text_en }} </td></tr>
                                    <tr><th> Russian text </th><td> {{ $news->text_ru }} </td></tr>
                                    <tr><th> Armenian text </th><td> {{ $news->text_am }} </td></tr>
                                </tbody>
                            </table>
                            <div class="container-fluid row">
                                <img width="100%" src="/images/News/{{$news->mainpic}}">
                            </div>
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$news->video_url}}" frameborder="0" allowfullscreen></iframe>
                            <div class="container-fluid row">
                            @if(isset($news->photo))
                                @foreach (json_decode($news->photo) as $photo)
                                    <div class="col-sm-6">
                                        <div >
                                            <img width="100%" src="/images/News/{{$photo}}">
                                            {!! Form::open([
                                                'method'=>'post',
                                                'url' => ['admin/news/image_delete', $news->id,$photo],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Image',
                                                        'onclick'=>'return confirm("Confirm delete image ?")'
                                                ))!!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
