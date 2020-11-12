
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('header_en', 'Header ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::label('header_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('header_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_en', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('header_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('header_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_ru', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('header_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('header_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('small_text_en', 'Short description ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::label('small_text_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('small_text_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('small_text_en', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('small_text_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('small_text_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('small_text_ru', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('small_text_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('small_text_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('small_text_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('text_en', 'Description ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::label('text_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('text_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_en', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('text_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('text_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_ru', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('text_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::textarea('text_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
