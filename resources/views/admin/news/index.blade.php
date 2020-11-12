@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">News</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/news/create') }}" class="btn btn-success btn-sm" title="Add New News">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/news', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Header</th><th>First text</th><th>Text</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>
                                            {{ $item->header_en }}<br>
                                            {{ $item->header_ru }}<br>
                                            {{ $item->header_am }}
                                        </td>
                                        <td>
                                            {{ $item->first_text_en }}
                                            {{ $item->first_text_ru }}
                                            {{ $item->first_text_am }}
                                        </td>
                                        <td>
                                            {{ $item->text_en }}
                                            {{ $item->text_ru }}
                                            {{ $item->text_am }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/news/' . $item->id) }}" title="View News"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/news/' . $item->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/news', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete News',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => ['/admin/news/face_status', $item->id, $item->type == 'text'],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::hidden('fasc_status', !$item->fasc_status) !!}
                                            @if(!$item->fasc_status)
                                            {!! Form::button('<i class="fa " aria-hidden="true"></i> Activet', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-primary btn-sm',
                                                        'title' => 'Activet facebook comment'
                                                )) 
                                                 !!}
                                              @else
                                              {!!  Form::button('<i class="fa " aria-hidden="true"></i> Deactivate', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Deactivate facebook comment'
                                                )) 
                                                !!}
                                                @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
