@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vacant job {{ $vacant_job->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/vacant_jobs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/vacant_jobs/' . $vacant_job->id . '/edit') }}" title="Edit vacant jobs"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/vacant_jobs', $vacant_job->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete vacant job',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $vacant_job->id }}</td></tr>
                                    <tr><th> Header in English</th><td> {{ $vacant_job->header_en }} </td></tr>
                                    <tr><th> Header in Russian</th><td> {{ $vacant_job->header_ru }} </td></tr>
                                    <tr><th> Header in Armenian</th><td> {{ $vacant_job->header_am }} </td></tr>
                                    <tr><th> Short description in English</th><td> {{ $vacant_job->small_text_en }} </td></tr>
                                    <tr><th> Short description in Russian</th><td> {{ $vacant_job->small_text_ru }} </td></tr>
                                    <tr><th> Short description in Armenian</th><td> {{ $vacant_job->small_text_am }} </td></tr>
                                    <tr><th> Description in English</th><td> {{ $vacant_job->text_en }} </td></tr>
                                    <tr><th> Description in Russian</th><td> {{ $vacant_job->text_ru }} </td></tr>
                                    <tr><th> Description in Armenian</th><td> {{ $vacant_job->text_am }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
