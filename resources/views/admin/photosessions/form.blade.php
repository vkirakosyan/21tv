<div class="form-group {{ $errors->has('title_en') ? 'has-error' : ''}}">
    {!! Form::label('title_en', 'Title in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title_en', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title_ru') ? 'has-error' : ''}}">
    {!! Form::label('title_ru', 'Title in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title_ru', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title_am') ? 'has-error' : ''}}">
    {!! Form::label('title_am', 'Title in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title_am', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title_am') ? 'has-error' : ''}}">
    {!! Form::label('mainpic', 'Photo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('mainpic', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('mainpic', '<p class="help-block">:message</p>') !!}
        @if(isset($photosession))
            <img style="width: 100%" src="{{asset('images/Photosessions/'.$photosession->mainpic)}}" />
        @endif
    </div>
     <div id="mainpic-preview">
    </div>
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photos', $formMode === 'create' ? 'Photos' : 'Photos(optional in edit mode)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('photo[]', ($formMode === 'create') ? ['required' => 'required', 'multiple' => 'multiple','id' => 'photo'] : ['multiple' => 'multiple','id' => 'photo']) !!}
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
        @if(isset($photosession))
            @php $photos = json_decode($photosession->photos); @endphp
            @foreach($photos as $key => $photo)
                <img style="width: 100%" src="{{asset('images/Photosessions/'.$photo)}}" />
            @endforeach
        @endif
    </div>
    <div id="img-preview">
    </div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('date', 'date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
