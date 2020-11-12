@extends('layouts.backend')
<?php
use Carbon\Carbon;
?>
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Poll {{ Carbon::createFromFormat('Y-m-d H:i:s', $polls->date)->format('j F \\, Y') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/polls_save') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/polls_save', $polls->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Poll',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        @foreach($polls->polls_save as $poll)
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $poll->id }}</td>
                                    </tr>
                                    <tr><th> Type </th><td> {{ $poll->type }} </td></tr>
                                    <tr><th> Options in English</th><td> {{ $poll->options_en }} </td></tr>
                                    <tr><th> Options in Russian</th><td> {{ $poll->options_ru }} </td></tr>
                                    <tr><th> Options in Armenian</th><td> {{ $poll->options_am }} </td></tr>
                                    <tr><th> Answer count</th><td> {{ count($poll->polls_save_answer) }} </td></tr>
                                    <tr><th data-id="{{$poll->id}}" class="answer_table_event"> Answer</th>
                                        <td>
                                            <div class="table-responsive answers answer-table-{{$poll->id}}" >
                                                <table class="table">
                                                    <tbody>
                                                        @foreach($poll->polls_save_answer as $answer)
                                                        <tr><th>ID</th><td>{{ $answer->id }}</td></tr>
                                                        <tr> <th>facebook ID</th><td>{{ $answer->useruuid }}</td> </tr>
                                                        <tr><th>Name</th><td>{{ $answer->name }}</td></tr>
                                                        <tr><th></th><td></td></tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                         </td>
                                     </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
   $('.answers').hide();
    $(document).ready(function () {
        $(document).on('click', '.answer_table_event', function () {
            var id = $(this).attr('data-id');
                $('.answer-table-'+id).show(500);
            })
    })
</script>
@endsection
