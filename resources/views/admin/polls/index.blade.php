@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Polls</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/polls/create') }}" class="btn btn-success btn-sm" title="Add New List">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New List
                        </a>
                        <a href="{{ url('admin/polls/save_polls') }}" class="btn btn-success btn-sm" title="Add Poll in archive">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Archive
                        </a>
                          <a href="{{ url('/admin/polls/create_items') }}" btn-success class="btn btn-success btn-sm" title="Add New Items">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Items
                        </a>
                        @if(isset($polls[0])) 
                        <?php $status = $polls[0]->status? 1 : 0 ;?>
                        <a href='<?php echo url('/admin/polls/status/'.(1-$status)); ?>' 
                            class="btn {{$status? 'btn-danger' : 'btn-success'}} btn-sm" title="Change status">
                            @if($status)
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                            @endif
                            {{$status? 'Disable' : 'Enable'}}
                        </a>
                        @endif

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/polls', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Type</th><th>Options</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($polls as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->options_en }}<br>
                                            {{ $item->options_ru }}<br>
                                            {{ $item->options_am }}</td>
                                        <td>
                                            <a href="{{ url('/admin/polls/' . $item->id) }}" title="View Poll"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/polls/' . $item->id . '/edit') }}" title="Edit Poll"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/polls', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Poll',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $polls->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
