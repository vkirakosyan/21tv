<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type', ['hot10' => 'Hot 10', 'hay10' => 'Hay 10'],null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if (!isset($poll))
    @for ($i = 1; $i <= 10; $i++)
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('options', 'Participant '.$i, ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::label('options_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_en[]', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_en', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('options_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_ru[]', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_ru', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('options_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_am[]', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    @endfor
@else
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('options', 'Participant ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    {!! Form::label('options_en', 'In English', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_en', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('options_ru', 'In Russian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_ru', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6">
    {!! Form::label('options_am', 'In Armenian', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('options_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('options_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
