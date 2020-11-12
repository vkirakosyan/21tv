@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">About {{ $about_us->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/about_us') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/about_us/' . $about_us->id . '/edit') }}" title="Edit About us"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/about_us', $about_us->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete About us',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $about_us->id }}</td>
                                    </tr>
                                    <tr><th> First Header in English</th><td> {{ $about_us->header1_en }} </td></tr>
                                    <tr><th> First Header in Russian</th><td> {{ $about_us->header1_ru }} </td></tr>
                                    <tr><th> First Header in Armenian</th><td> {{ $about_us->header1_am }} </td></tr>
                                    <tr><th> First Text in English</th><td> {{ $about_us->text1_en }} </td></tr>
                                    <tr><th> First Text in Russian</th><td> {{ $about_us->text1_ru }} </td></tr>
                                    <tr><th> First Text in Armenian</th><td> {{ $about_us->text1_am }} </td></tr>
                                    <tr><th> Last Header in English</th><td> {{ $about_us->header2_en }} </td></tr>
                                    <tr><th> Last Header in Russian</th><td> {{ $about_us->header2_ru }} </td></tr>
                                    <tr><th> Last Header in Armenian</th><td> {{ $about_us->header2_am }} </td></tr>
                                    <tr><th> Last Text in English</th><td> {{ $about_us->text2_en }} </td></tr>
                                    <tr><th> Last Text in Russian</th><td> {{ $about_us->text2_ru }} </td></tr>
                                    <tr><th> Last Text in Armenian</th><td> {{ $about_us->text2_am }} </td></tr>
                                    <tr><th> Photo </th><td> <img style="width: 100%" src="/images/AboutUs/{{ $about_us->mainpic }}" </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
