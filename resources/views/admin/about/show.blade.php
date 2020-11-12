@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact {{ $about->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/about') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/about/' . $about->id . '/edit') }}" title="Edit About"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/about', $about->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete About',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $about->id }}</td>
                                    </tr>
                                    <tr><th> Address in English</th><td> {{ $about->address_en }} </td></tr>
                                    <tr><th> Address in Russian</th><td> {{ $about->address_ru }} </td></tr>
                                    <tr><th> Address in Armenian</th><td> {{ $about->address_am }} </td></tr>
                                    <tr><th> Facebook</th><td> <a href="{{ $about->facebook }}">Facebook link</a> </td></tr>
                                    <tr><th> Instagram</th><td> <a href="{{ $about->instagram }}">Instagram link</a> </td></tr>
                                    <tr><th> Youtube</th><td> <a href="{{ $about->youtube }}">Youtube link</a> </td></tr>
                                    <tr><th> Phone </th><td> {{ $about->phone }} </td></tr>
                                    <tr><th> Email </th><td> {{ $about->email }} </td></tr>
                                </tbody>
                            </table>
                            <iframe src="https://www.google.com/maps/embed?pb={{$about->maps}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
