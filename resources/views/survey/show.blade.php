@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-2">
                <h1 class="p-2">{{$questionnaire->title}}</h1>
                <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                @csrf
                    <div class="card-header">Create new Questionnaire</div>

                @foreach($questionnaire->questions as $key=>$question)

                    <div class="card mt-4">
                        <div class="card-header"><strong>{{$key + 1 }} </strong>{{$question->question}}</div>

                        <div class="card-body">
                            @error('responses.'.$key.'.answer_id')
                                <small class="text-danger my-2"> {{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio" id="answer{{$answer->id}}" name="responses[{{ $key }}][answer_id]"
                                                   {{ (old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : '' }}
                                                   value="{{$answer->id}}" class="mr-2">
                                            {{$answer->answer}}
                                            <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                    <div class="card mt-4">
                        <div class="card-header"><strong>Thanks !!! </strong></div>
                        <div class="m-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="survey[name]" class="form-control" id="name"
                                    value="{{old('survey.name')}}"   placeholder="Name">
                            </div>
                            @error('survey[name]')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="survey[email]" class="form-control" id="email"
                                       aria-describedby="email" placeholder="Enter email"
                                       value="{{old('survey.email')}}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            @error('survey[email]')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success my-3 "> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

