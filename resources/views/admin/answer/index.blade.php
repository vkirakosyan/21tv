@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
                <div class="col-md-9">
                <div class="card">
                    <div class="card-header">All answers</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu0">Yes Or No</a></li>
                          <li class="nav-item" ><a class="nav-link" data-toggle="tab" href="#menu1">Polls answer</a></li>
                          <li class="nav-item" ><a class="nav-link" data-toggle="tab" href="#menu2">Text answer</a></li>
                        </ul>
                                
                        <div class="tab-content">
                          <div id="menu0" class="tab-pane fade show active">
                            <h3>Yes Or No answers</h3>
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            @if($data['yesno']['answer'])
                                            <a data-toggle="collapse" href="#collapse1">
                                                {{$data['yesno']['answer']->question_en}}<br>
                                                {{$data['yesno']['answer']->question_ru}}<br>
                                                {{$data['yesno']['answer']->question_am}}
                                            </a>
                                            @endif

                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <ul class="list-group">
                                            @if($data['yesno']['answers'])
                                                @foreach($data['yesno']['answers'] as $key => $answer)
                                                    <li class="list-group-item">
                                                        <div class="container row">
                                                            <div class="col-8">
                                                            {{ $answer->answer }} 
                                                            </div>
                                                            <div class="col-4">
                                                                {{ count($answer) }}
                                                            </div>
                                                        </div>
                                                            <a data-toggle="collapse" href="#collapse2">
                                                                <input type="button" name="" class='btn btn-primary' value="See the voters">
                                                            </a>
                                                        <div id="collapse2" class="panel-collapse collapse">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <div class="container row">
                                                                        <div class="col-8">
                                                                        <?php $m=json_decode($answer);
                                                                        ?>
                                                                       <!--  foreach? -->
                                                                        {{$m->name}}
                                                                        </div>
                                                                        <div class="col-4">{{$m->answer}}</div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                              </div>
                          </div>
                          <div id="menu1" class="tab-pane fade">
                            <h3>Polls answer</h3>
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#poll0">hay10</a></li>
                                <li class="nav-item" ><a class="nav-link" data-toggle="tab" href="#poll1">hot10</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="poll0" class="tab-pane fade show active">
                                    @foreach($data['hay10'] as $key => $hay10)
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#collapse1{{$loop->index}}">
                                                        {{$key}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse1{{$loop->index}}" class="panel-collapse collapse">
                                                <ul class="list-group">
                                                    @foreach ($hay10 as  $value)
                                                    <li class="list-group-item">
                                                        <div class="container row">
                                                            <div class="col-8">
                                                                {{ $value->options_en }} <br>
                                                                {{ $value->options_ru }} <br>
                                                                {{ $value->options_am }} 
                                                            </div>
                                                            <div class="col-4">
                                                                {{count  ($value->answer) }}
                                                            </div>
                                                        </div>
                                                        <a data-toggle="collapse" href="#collapse2{{$loop->index}}">
                                                            <input type="button" name="" class='btn btn-primary' value="See the voters"></a>
                                                        <div id="collapse2{{$loop->index}}" class="panel-collapse collapse">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <div class="container row">
                                                                        @foreach($value->answer as $value)
                                                                        <?php
                                                                            $m=json_decode($value) 
                                                                        ?>
                                                                        <div class="col-4"> {{$m->name}} </div>
                                                                        <div class="col-4">{{$m->useruuid}}</div>
                                                                        <div class="col-4"> {{$m->created_at}}</div>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                      </div>
                                      @endforeach
                                  </div>
                                  <div id="poll1" class="tab-pane fade">
                                    @foreach($data['hot10'] as $key => $hot10)
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" href="#collapse{{$loop->index}}">
                                                        {{$key}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{$loop->index}}" class="panel-collapse collapse">
                                                <ul class="list-group">
                                                    @foreach ($hot10 as  $value)
                                                    <li class="list-group-item">
                                                        <div class="container row">
                                                            <div class="col-8">
                                                                {{ $value->options_en }} <br>
                                                                {{ $value->options_ru }} <br>
                                                                {{ $value->options_am }} 
                                                            </div>
                                                            <div class="col-4">
                                                                {{count  ($value->answer) }}
                                                            </div>
                                                        </div>
                                                        <a data-toggle="collapse" href="#collapse3{{$loop->index}}">
                                                            <input type="button" name="" class='btn btn-primary' value="See the voters">
                                                        </a>
                                                        <div id="collapse3{{$loop->index}}" class="panel-collapse collapse">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <div class="container row">
                                                                        @foreach($value->answer as $value)
                                                                        <?php
                                                                            $m=json_decode($value) 
                                                                        ?>
                                                                        <div class="col-4"> {{$m->name}} </div>
                                                                       <div class="col-4">{{$m->useruuid}}</div>
                                                                       <div class="col-4"> {{$m->created_at}}</div>
                                                                       @endforeach
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                      </div>
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                          <div id="menu2" class="tab-pane fade">
                            @if(count($data['text']['ansvers']) > 0)
                            <h3>The answer to {{$data['text']['question']->question_en}}</h3>
                                <ul class="list-group ">
                                    @foreach ($data['text']['ansvers'] as  $value)
                                    <li class="list-group-item">
                                        <div class="container row">
                                            <div class="col-4"> {{$m->name}} </div>
                                            <div class="col-4">{{$m->useruuid}}</div>
                                            <div class="col-4" style="margin-bottom: 10px;"> {{$value->created_at}}</div>
                                            <div class="col-12"> {{$value->answer}}</div>
                                       </div>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
