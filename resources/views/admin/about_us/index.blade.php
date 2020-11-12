@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">About Us</div>
                    <div class="card-body">
                        @if($about_us->isEmpty())
                            <a href="{{ url('/admin/about_us/create') }}" class="btn btn-success btn-sm" title="Add New About us">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @endif
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/about_us', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>First Header</th><th>First Text</th><th>Last Header</th><th>Last Text</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($about_us as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->header1_en }}<br>
                                            {{ $item->header1_ru }}<br>
                                            {{ $item->header1_am }}
                                        </td>
                                        <td>{{ $item->text1_en }}<br>
                                            {{ $item->text1_ru }}<br>
                                            {{ $item->text1_am }}
                                        </td>
                                        <td>{{ $item->header2_en }}<br>
                                            {{ $item->header2_ru }}<br>
                                            {{ $item->header2_am }}
                                        </td>
                                            <td>{{ $item->text2_en }}<br>
                                            {{ $item->text2_ru }}<br>
                                            {{ $item->text2_am }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/about_us/' . $item->id) }}" title="View About us"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/about_us/' . $item->id . '/edit') }}" title="Edit About us"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <!-- {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/about_us', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete About us',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!} -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $about_us->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
