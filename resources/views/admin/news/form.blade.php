<?php /*
<div class="form-group {{ $errors->has('program_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category_id', $selects, isset($news) ? $news->category_id : null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
*/
?> 
<div class="form-group {{ $errors->has('header_en') ? 'has-error' : ''}}">
    {!! Form::label('header_en', 'Header in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_en', '<p class="help-block">:message</p>') !!}
    </div>
     {!! Form::label('header_ru', 'Header in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_ru', '<p class="help-block">:message</p>') !!}
    </div>
     {!! Form::label('header_am', 'Header in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('header_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('header_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mainpic') ? 'has-error' : ''}}">
    {!! Form::label('mainpic', $formMode === 'create' ? 'Main photo' : 'Main photo(optional in edit mode)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('mainpic', ($formMode === 'create') ? ['required' => 'required'] : []) !!}
        {!! $errors->first('mainpic', '<p class="help-block">:message</p>') !!}
        @if(isset($news))
            <img style="width: 100%" src="{{asset('images/News/'.$news->mainpic)}}" />
        @endif
    </div>
    <div id="mainpic-preview">
    </div>
</div>
<div class="form-group {{ $errors->has('first_text_en') ? 'has-error' : ''}}">
    {!! Form::label('first_text_en', 'News Text in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('first_text_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('first_text_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('first_text_ru', 'News Text in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('first_text_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('first_text_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('first_text_am', 'News Text in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('first_text_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('first_text_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', 'Photos inside the news page(optional)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('photo[]', ('' == 'required') ? ['required' => 'required', 'multiple' => 'multiple'] : ['multiple' => 'multiple', 'id' => 'photo']) !!}
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
        @if(isset($news) && !is_null($news->photo))
            @php $photos = json_decode($news->photo); @endphp
            @foreach($photos as $key => $photo)
                <img style="width: 100%" src="{{asset('images/News/'.$photo)}}" />
            @endforeach
        @endif
    </div>
</div>

<div id="img-preview">
</div>

<div class="form-group {{ $errors->has('text_en') ? 'has-error' : ''}}">
    {!! Form::label('text_en', 'News Text in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text_en', null, ('required' == 'required') ? ['class' => 'form-control' ] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text_ru', 'News Text in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text_ru', null, ('required' == 'required') ? ['class' => 'form-control' ] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('text_am', 'News Text in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('text_am', null, ('required' == 'required') ? ['class' => 'form-control' ] : ['class' => 'form-control']) !!}
        {!! $errors->first('text_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
    {!! Form::label('video_url', 'YouTube video link(optional)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('video_url', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('video_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
