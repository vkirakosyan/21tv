<div class="form-group {{ $errors->has('first_img') ? 'has-error' : ''}}">
    {!! Form::label('image', 'First Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
         <select class="form-control" name="image_type" >
        <option>first_img</option>
        <option>second_img</option>
        <option>third_img</option>
      </select>
        {!! Form::file('mainpic', ($formMode === 'create') ? ['required' => 'required','id'=>'mainpic'] : []) !!}
        {!! $errors->first('first_img', '<p class="help-block">:message</p>') !!}
        @if(isset($top_image))
            <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->first_img)}}" />
        @endif
    </div>

  <div id="mainpic-preview">
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('second_img') ? 'has-error' : ''}}">
    {!! Form::label('second_img', 'Second Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('second_img', ($formMode === 'create') ? ['required' => 'required'] : []) !!}
        {!! $errors->first('second_img', '<p class="help-block">:message</p>') !!}
        @if(isset($top_image))
            <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->second_img)}}" />
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('third_img') ? 'has-error' : ''}}">
    {!! Form::label('third_img', 'Third Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('third_img', ($formMode === 'create') ? ['required' => 'required'] : []) !!}
        {!! $errors->first('third_img', '<p class="help-block">:message</p>') !!}
        @if(isset($top_image))
            <img style="width: 100%" src="{{asset('images/Top_Images/'.$top_image->third_img)}}" />
        @endif
    </div>
</div> -->

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
