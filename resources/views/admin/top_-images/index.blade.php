@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Top Images</div>
                    <div class="card-body">
                   <!--      @if($top_images->isEmpty()) -->
                            <a href="{{ url('/admin/top_-images/create') }}" class="btn btn-success btn-sm" title="Add New Top_Image">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                     <!--    @endif -->
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/top_-images', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>First Image</th><th>Second Image</th><th>Third Image</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($top_images as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td><img style="width: 100%" src="{{asset('images/Top_Images/'.$item->first_img)}}" /></td><td><img style="width: 100%" src="{{asset('images/Top_Images/'.$item->second_img)}}" /></td><td><img style="width: 100%" src="{{asset('images/Top_Images/'.$item->third_img)}}" /></td>
                                        <td>
                                            <a href="{{ url('/admin/top_-images/' . $item->id) }}" title="View Top_Image"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/top_-images/create') }}" title="Edit Top_Image"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                          
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/top_-images', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Top_Image',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $top_images->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
