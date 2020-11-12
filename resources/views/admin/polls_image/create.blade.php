@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Image For Polls</div>
                        <div class="card-body">
                            <form action="{{ url('admin/upload_image') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <select name='type' class="form-control" required>
                                    <option value='yes_no'>Yes/No Questions</option>
                                    <option value='text'>Text Questions</option>
                                    <option value='hayhot'>Hay10</option>
                                </select>
                                <input type="file" name="mainpic" id="mainpic">
                                <div id="mainpic-preview"></div>
                                <input type="submit" name="" value="Upload" class="btn btn-primary pull-right">
                            </form>
                        </div>
                    </div>
                    @foreach($images as $image)
                    <div class="">
                     {{$image->type}}
                        <img style="max-width: 100%;" src='{{ asset("/images/Polls/$image->image") }}'>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
    @endsection