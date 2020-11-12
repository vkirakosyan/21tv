<div class="form-group {{ $errors->has('program_id') ? 'has-error' : ''}}">
    {!! Form::label('programme_id', 'Programme', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('programme_id', $selects, isset($episode) ? $episode->programme_id : null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('programme_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
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
<div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
    {!! Form::label('video_url', 'YouTube video link', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('video_url', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('video_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    @php $theDate2 = isset($episode->date) ? date('Y-m-dTh:i',strtotime($episode->date)) : null; @endphp
    {!! Form::label('date', "Broadcast date", ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('datetime-local', 'date', isset($theDate2) ? str_replace('UTC','T',$theDate2) : null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', 'Photo of episodes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('photo', ('' == 'required') ? ['required' => 'required'] : []) !!}
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
        @if(isset($episodes))
            <img style="width: 100%" src="{{asset('images/Episodes/'.$episodes->photo)}}" />
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Anons or Episode', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-lg-6">
        {!! Form::label('status', 'Anons', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::radio('status', 'anons', ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-6">
        {!! Form::label('status', 'Episode', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::radio('status', 'episode', ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group row">
    <div class="col-lg-2">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

