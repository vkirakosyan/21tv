<div class="form-group {{ $errors->has('name_en') ? 'has-error' : ''}}">
    {!! Form::label('name_en', 'Name in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_en', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name_ru') ? 'has-error' : ''}}">
    {!! Form::label('name_ru', 'Name in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_ru', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name_am') ? 'has-error' : ''}}">
    {!! Form::label('name_am', 'Name in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
 <div class="col-lg-12">
<!--         {!! Form::label('is_picture', 'Is_picture', ['class' => 'col-md-4 control-label']) !!}
{!! Form::checkbox('is_picture', 'is_picture', (isset($programme->is_picture) && $programme->is_picture == 1) ? ['class' => 'form-control'] : ['class' => 'form-control', 'required' => 'required']) !!} -->
        <label for="is_picture">Is Picture</label>
        <input type="checkbox" name="is_picture"<?php  if(isset($programme->is_picture) && $programme->is_picture == 1) echo "checked='checked'";?>>
    </div>
    </div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('mainpic', 'Photo of programme', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('mainpic', ('' == 'required') ? ['required' => 'required', 'id' => 'img_file'] : []) !!}
        {!! $errors->first('mainpic', '<p class="help-block">:message</p>') !!}
        @if(isset($programme))
            <img style="width: 100%" src="{{asset('images/Programmes/'.$programme->photo)}}" />
        @endif
    </div>

</div>

<div id="mainpic-preview">
    </div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

