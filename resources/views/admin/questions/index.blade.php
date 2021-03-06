@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Questions</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/questions/create') }}" class="btn btn-success btn-sm" title="Add New Question">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/questions', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Type</th><th>Question</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->question_en }}<br>
                                            {{ $item->question_ru }}<br>
                                            {{ $item->question_am }}</td>
                                        <td>
                                            <a href="{{ url('/admin/questions/' . $item->id) }}" title="View Question"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/questions/' . $item->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/questions', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Question',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => ['/admin/questions/active', $item->id, $item->type == 'text'],
                                                'style' => 'display:inline',
                                                'data' => !$item->active
                                            ]) !!}
                                            {!! Form::hidden('active', !$item->active) !!}
                                            @if(!$item->active)
                                            {!! Form::button('<i class="fa " aria-hidden="true"></i> Activet', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-primary btn-sm',
                                                        'title' => 'Activet Question'
                                                )) 
                                                 !!}
                                              @else
                                              {!!  Form::button('<i class="fa " aria-hidden="true"></i> Deactivate', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Deactivate Question'
                                                )) 
                                                !!}
                                                @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $questions->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
