@extends('layouts.backend')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
    .sortable li{
        margin-top: 10px;
       background-color: white;
        border: solid 1px #d9d9d9;
        box-shadow: 3px 3px 3px rgb(170, 170, 170);
        height: 100px; 
        overflow:hidden;
    }
    img{
        width: 150px;
        height: 90px;
    }
    .a{
        float: right;
    }
    .name{
        width: 25%;
    }
    td{
        float: left;
    }
    .id{
        width: 10%;
    } 
</style>
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Programmes</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/programmes/create') }}" class="btn btn-success btn-sm" title="Add New Programme">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/programmes', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Name</th><th>Photo</th><th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                              <ul type="none" class="sortable">
                               
                                @foreach($programmes as $item)
                                <li id="{{$item->id}}">
                                     <table>
                                         <tbody>
                                            <tr>
                                                <td class="id">{{ $loop->iteration or $item->id }}</td>
                                                <td class="name">
                                                    {{ $item->name_en }}<br />
                                                    {{ $item->name_ru }}<br />
                                                    {{ $item->name_am }}
                                                </td class='img'>
                                                    <td style="width: 20%;">
                                                        <img style="width: 100%;" src="{{asset('images/Programmes/'.$item->photo)}}" />
                                                    </td>
                                                <td class="a">
                                                    <a href="{{ url('/admin/programmes/' . $item->id) }}" title="View Programme">
                                                        <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button><br>
                                                    </a>
                                                    <a href="{{ url('/admin/programmes/' . $item->id . '/edit') }}" title="Edit Programme">
                                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button><br>
                                                    </a>
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/admin/programmes', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-sm',
                                                                'title' => 'Delete Programme',
                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                             </tbody>
                                       </table>
                                </li>
                                @endforeach
                           
                            </ul>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/admin_program.js"></script>>
@endsection

  