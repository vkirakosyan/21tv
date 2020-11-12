@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Episode {{ $episode->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/episodes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/episodes/' . $episode->id . '/edit') }}" title="Edit Episode"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/episodes', $episode->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Episode',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $episode->id }}</td>
                                    </tr>
                                    <tr><th> Programme name in English</th><td> {{ $episode->prog_name }} </td></tr>
                                    <tr><th> Name in English </th><td> {{ $episode->name_en }} </td></tr>
                                    <tr><th> Name in Russian </th><td> {{ $episode->name_ru }} </td></tr>
                                    <tr><th> Name in Armenian </th><td> {{ $episode->name_am }} </td></tr>
                                    <tr><th> Anons or Episode </th><td> {{ $episode->status }} </td></tr>
                                    <tr><th> Date </th><td> {{ $episode->date }} </td></tr>
                                    <tr>
                                        
                                    </tr>
                                    @if($episode->video_url)
                                    <tr>
                                        <th> Video </th>
                                        <td> <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$episode->video_url}}" frameborder="0" allowfullscreen></iframe> </td>
                                    </tr>
                                    @endif
                                     @if($episode->photo)
                                    <tr>
                                        <th> Photo </th>
                                        <td> <img src="/images/Episodes/{{$episode->photo}}" width="100%" /></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
