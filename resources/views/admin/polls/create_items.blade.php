@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create Poll </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/polls') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form action="/admin/polls_add" method="post">
                             <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                            {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('type', ['hot10' => 'Hot 10', 'hay10' => 'Hay 10'],null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                       <div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
                            {!! Form::label('options', 'Participant ', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                            {!! Form::label('options_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
                                {!! Form::text('options_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('options_en', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::label('options_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
                                {!! Form::text('options_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('options_ru', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-6">
                            {!! Form::label('options_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
                                {!! Form::text('options_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('options_am', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection