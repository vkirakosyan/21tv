@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Episodes</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/episodes/create') }}" class="btn btn-success btn-sm" title="Add New Episode">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <a href="{{ url('/admin/episodes/create_new_week') }}" class="btn btn-success btn-sm {{!$show_botton? 'disabled' : ''}}" title="Add New Episode">
                            <i class="fa fa-plus" aria-hidden="true"></i> Copy New Week
                        </a>
                        @if(!$show_botton)
                        <span style="font-size: 13px;">Կարող եք ամբողջ շաբաթը կրկնօրինակել ամեն երկուշաբթի</span>
                        @endif

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/episodes', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th>
                                        <th>Programme </th>
                                        <th>Name in English</th>
                                        <th>Name in Russian</th>
                                        <th>Name in Armenian</th>
                                        <th>Anons or Episode</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($episodes as $item)
                                    <tr>
                                        @if(isset( $item->programme->name ))
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->programme->name }}</td>
                                        <td>{{ $item->name_en }}</td>
                                        <td>{{ $item->name_ru }}</td>
                                        <td>{{ $item->name_am }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/admin/episodes/' . $item->id) }}" title="View Episode"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/episodes/' . $item->id . '/edit') }}" title="Edit Episode"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/episodes', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Episode',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open([
                                                'method'=>'post',
                                                'url' => ['/admin/episodes/send_archive', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Send archive', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Send archive',
                                                        'onclick'=>'return confirm("Send archive?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                         @endif
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $episodes->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
