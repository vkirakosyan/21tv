@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact</div>
                    <div class="card-body">
                        @if($about->isEmpty())
                            <a href="{{ url('/admin/about/create') }}" class="btn btn-success btn-sm" title="Add New About">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @endif
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/about', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Address</th><th>Phone</th><th>Email</th><th>Links</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($about as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->address_en }}<br>
                                            {{ $item->address_ru }}<br>
                                            {{ $item->address_am }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td><a href="{{ $item->facebook }}">Facebook link</a> <br>
                                                <a href="{{ $item->instagram }}">Instagram link</a><br>
                                                <a href="{{ $item->youtube }}">Youtube link</a>
                                            </td>
                                        <td>
                                            <a href="{{ url('/admin/about/' . $item->id) }}" title="View About"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/about/' . $item->id . '/edit') }}" title="Edit About"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <!-- {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/about', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete About',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!} -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $about->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
