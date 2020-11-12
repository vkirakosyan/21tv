@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Top Images</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/top_-images') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                           <a href="{{ url('/admin/top_-images/create') }}" title="Edit Top_Image"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/top_images', $top_image->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Top_Image',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $top_image->id }}</td>
                                    </tr>
                                    <tr><th> First Image </th><td> <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->first_img)}}" /> </td></tr><tr><th> Second Image </th><td> <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->second_img)}}" />  </td></tr><tr><th> Third Image </th><td>  <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->third_img)}}" />  </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
