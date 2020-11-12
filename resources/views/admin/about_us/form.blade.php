<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('header1_en', 'First Header in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header1_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header1_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('header1_ru', 'First Header in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header1_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header1_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('header1_am', 'First Header in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header1_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header1_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('text1_en', 'First Text in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text1_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text1_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text1_ru', 'First Text in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text1_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text1_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text1_am', 'First Text in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text1_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text1_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('header2_en', 'Last Header in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header2_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header2_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('header2_ru', 'Last Header in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header2_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header2_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('header2_am', 'Last Header in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header2_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header2_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('text2_en', 'Last Text in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text2_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text2_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text2_ru', 'Last Text in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text2_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text2_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text2_am', 'Last Text in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text2_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('text2_am', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('mainpic', $formMode === 'create' ? 'Main photo' : 'Main photo(optional in edit mode)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('mainpic', ($formMode === 'create') ? ['required' => 'required'] : []) !!}
        {!! $errors->first('mainpic', '<p class="help-block">:message</p>') !!}
        @if(isset($about_us))
            <img style="width: 100%" src="{{asset('images/AboutUs/'.$about_us->mainpic)}}" />
        @endif
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>