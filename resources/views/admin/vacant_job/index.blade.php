@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Vacant job</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/vacant_jobs/create') }}" class="btn btn-success btn-sm" title="Add New vacant jobs">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/vacant_jobs', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Header</th><th>Short description </th><th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vacant_job as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>
                                            {{ $item->header_en }}<br>
                                            {{ $item->header_ru }}<br>
                                            {{ $item->header_am }}
                                        </td>
                                        <td>
                                            {{ $item->small_text_en }}<br>
                                            {{ $item->small_text_ru }}<br>
                                            {{ $item->small_text_am }}
                                        </td>
                                        <td>
                                            {{ $item->text_en }}<br>
                                            {{ $item->text_ru }}<br>
                                            {{ $item->text_am }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/vacant_jobs/' . $item->id) }}" title="View vacant jobs"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/vacant_jobs/' . $item->id . '/edit') }}" title="Edit vacant jobs"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/vacant_jobs', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete vacant jobs',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $vacant_job->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
