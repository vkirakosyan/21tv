@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Photosession {{ $photosession->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/photosessions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/photosessions/' . $photosession->id . '/edit') }}" title="Edit Photosession"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/photosessions', $photosession->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Photosession',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $photosession->id }}</td>
                                    </tr>
                                    <tr><th> Title in English </th><td> {{ $photosession->title_en }} </td></tr>
                                    <tr><th> Title in Russian </th><td> {{ $photosession->title_ru }} </td></tr>
                                    <tr><th> Title in Armenian </th><td> {{ $photosession->title_am }} </td></tr>
                                    <tr>
                                        <th> Main picture </th>
                                        <td><img style="width: 100%" src="/images/Photosessions/{{ $photosession->mainpic }}"></td></tr>
                                        @if(isset($photosession))
                                            @php $photos = json_decode($photosession->photos); @endphp
                                            @foreach($photos as $key => $photo)
                                                <tr><td>Photo {{$loop->iteration}}</td>
                                                    <td><img style="width: 100%" src="{{asset('images/Photosessions/'.$photo)}}" />
                                                        {!! Form::open([
                                                        'method'=>'post',
                                                        'url' => ['admin/photosessions/image_delete', $photosession->id,$photo],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-sm',
                                                                'title' => 'Delete Image',
                                                                'onclick'=>'return confirm("Confirm delete image ?")'
                                                        ))!!}
                                                    {!! Form::close() !!}
                                                </td></tr>
                                            @endforeach
                                        @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
