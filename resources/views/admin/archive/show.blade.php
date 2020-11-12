@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Episode archive {{ $episode->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/archive') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/episodes/' . $episode->id . '/edit') }}" title="Edit Episode"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/archive', $episode->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Episode',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        {!! Form::open([
                            'method'=>'post',
                            'url' => ['/admin/archive/send_archive', $episode->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Send episode', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Send archive',
                                    'onclick'=>'return confirm("Send episode?")'
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $episode->id }}</td>
                                    </tr>
                                    <tr><th> Programme </th><td> {{ $episode->prog_name }} </td></tr>
                                    <tr><th> Name in English </th><td> {{ $episode->name_en }} </td></tr>
                                    <tr><th> Name in Russian </th><td> {{ $episode->name_ru }} </td></tr>
                                    <tr><th> Name in Armenian </th><td> {{ $episode->name_am }} </td></tr>
                                    <tr><th> Anons or Episode </th><td> {{ $episode->status }} </td></tr>
                                    <tr>
                                        <th> Photo </th>
                                        <td> <img style="width: 100%" src="{{asset('images/Episodes/'.$episode->photo)}}" /> </td>
                                    </tr>
                                    <tr>
                                        <th> Video </th>
                                        <td> <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$episode->video_url}}" frameborder="0" allowfullscreen></iframe> </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
