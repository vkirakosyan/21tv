@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Question {{ $question->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/questions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/questions/' . $question->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/questions', $question->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Question',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $question->id }}</td>
                                    </tr>
                                    <tr><th> Type </th><td> {{ $question->type }} </td></tr>
                                    <tr><th> Question in English</th><td> {{ $question->question_en }} </td></tr>
                                    <tr><th> Question in Russian</th><td> {{ $question->question_ru }} </td></tr>
                                    <tr><th> Question in Armenian</th><td> {{ $question->question_am }} </td></tr>
                                    @if($question->choices)
                                        @foreach($question->choicesEdit as $choice)
                                    <tr>
                                        <th> choice {{$loop->iteration}}</th>
                                        <td>English: {{ $choice->choice_en }}<br>
                                            Russian: {{ $choice->choice_ru }}<br>
                                            Armenian: {{ $choice->choice_am }} </td>
                                    </tr>
                                        @endforeach
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
