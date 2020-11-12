<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type', ['yesno' => 'Yes/No question','multiplechoice' => 'Multiple choice question', 'text' => 'Text answer question'], null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    {!! Form::label('question_en', 'Question in English', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('question_en', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('question_en', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('question_ru', 'Question in Russian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('question_ru', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('question_ru', '<p class="help-block">:message</p>') !!}
    </div>
    {!! Form::label('question_am', 'Question in Armenian', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('question_am', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('question_am', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-offset-4 col-md-4 mb-4">
    <button class="btn btn-primary d-none" id="addChoice"><i class="fa fa-plus"></i> Add a choice</button>
</div>

<div id="dummyel">
    @if($formMode == 'edit')
        @foreach($question->choicesEdit as $key => $choice)
            <div class="form-group {{ $errors->has('choice') ? 'has-error' : ''}}">
                <label class="col-md-4 control-label"><h4>Choice {{$loop->iteration}}</h4></label><br>
                {!! Form::label('choice_en[]', 'Choice in English', ['class' => 'col-md-4 control-label']) !!}
                {!! Form::hidden('choice_id[]', $choice->id)!!}
                <div class="col-md-6" style="flex-direction: row; display: flex;">
                    {!! Form::text('choice_en[]', $choice->choice_en, ($loop->iteration <= 2) ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('choice', '<p class="help-block">:message</p>') !!}
                </div>
                {!! Form::label('choice_ru[]', 'Choice in Russian', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6" style="flex-direction: row; display: flex;">
                    {!! Form::text('choice_ru[]', $choice->choice_ru, ($loop->iteration <= 2) ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('choice', '<p class="help-block">:message</p>') !!}
                </div>
                {!! Form::label('choice_am[]', 'Choice in Armenian', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6" style="flex-direction: row; display: flex;">
                    {!! Form::text('choice_am[]', $choice->choice_am, ($loop->iteration <= 2) ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    @if($loop->iteration >= 3)
                        <button class="btn btn-danger d-inline deleteChoice" style="margin-left: 7px;"><i class="fa fa-trash"></i> Delete</button>
                    @endif
                    {!! $errors->first('choice', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        @endforeach
    @endif
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


<script>
    const formMode = "@php echo $formMode @endphp";
    const select = document.querySelector('select.form-control');
    const choiceBtn = document.getElementById('addChoice');
    const dummy = document.getElementById('dummyel');
    let numberOfChoices = document.getElementsByName('choice[]').length || 0;
    
    const generateTemplate = required => {
        return `
            <div class="form-group col-md-6">
                <label class="col-md-4 control-label">Choice ${numberOfChoices +1}</label><br>
                <label for="question_en" class="col-md-6 control-label">Question in English</label>
                <input class="form-control" name="choice_en[]" type="text" class="choice" ${required ? 'required' : ''}>
                <label for="question_ru" class="col-md-6 control-label">Question in Russian</label>
                <input class="form-control" name="choice_ru[]" type="text" class="choice" ${required ? 'required' : ''}>
                <label for="question_am" class="col-md-6 control-label">Question in Armenian</label>
                <input class="form-control" name="choice_am[]" type="text" class="choice" ${required ? 'required' : ''}>
                ${!required ? '<button class="btn btn-danger d-inline deleteChoice" style="margin-left: 7px;"><i class="fa fa-trash"></i> Delete</button>' : ''} 
            </div>
        `;
    }

    const attachDelete = () => {
        setTimeout(() => {
            const deleteBtns = document.getElementsByClassName('deleteChoice');
            const lastDelete = deleteBtns[deleteBtns.length - 1];
            const parent = lastDelete.closest('.choiceContainer');
            lastDelete.onclick = e => {
                e.preventDefault();
                parent.remove();
                numberOfChoices--;
                numberOfChoices == 6 ? choiceBtn.classList.add('d-none') : choiceBtn.classList.remove('d-none');
            }
        }, 0);
    }

    const generateChoiceField = (required = false) => {
        const elem = document.createElement('div');
        elem.className = "choiceContainer";
        if(required)
        {
            elem.innerHTML = generateTemplate(required);
        }
        else
        {
            elem.innerHTML = generateTemplate(required);
            attachDelete();
        }
        dummy.appendChild(elem);
        numberOfChoices++;
    }

    const setupFields = () => {
        if(select.value == 'multiplechoice' && numberOfChoices != 6){
            if(dummy.childElementCount == 0 && formMode != 'edit')
            {
                generateChoiceField(true);
                generateChoiceField(true);
            }
            choiceBtn.classList.remove('d-none')
        } else {
            choiceBtn.classList.add('d-none');
        }  
    }

    select.onchange = e => {
        setupFields();
        if(e.target.value == 'text' || e.target.value == 'yesno'){
            dummy.classList.add('d-none');
            dummy.innerHTML = ''; 
            numberOfChoices = 0;
        }
        else{
            dummy.classList.remove('d-none');
        }
    }
    
    choiceBtn.onclick = e => {
        e.preventDefault();
        generateChoiceField();
        numberOfChoices == 6 ? choiceBtn.classList.add('d-none') : choiceBtn.classList.remove('d-none');
    }

    setupFields();
</script>