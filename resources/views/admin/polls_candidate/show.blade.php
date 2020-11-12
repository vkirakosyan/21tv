@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Poll {{ $polls_candidate->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/polls_candidate') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/polls_candidate/' . $polls_candidate->id . '/edit') }}" title="Edit Poll"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/polls_candidate', $polls_candidate->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Poll',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $polls_candidate->id }}</td>
                                    </tr>
                                    <tr><th> Type </th><td> {{ $polls_candidate->type }} </td></tr>
                                    <tr><th> Options in English</th><td> {{ $polls_candidate->options_en }} </td></tr>
                                    <tr><th> Options in Russian</th><td> {{ $polls_candidate->options_ru }} </td></tr>
                                    <tr><th> Options in Armenian</th><td> {{ $polls_candidate->options_am }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
