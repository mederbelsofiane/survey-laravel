@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Question</div>

                    <div class="card-body">
                        <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">

                            @csrf

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionhelp"
                                       value="{{old('question.question')}}" placeholder="Create Question">
                                <small id="questionhelp" class="form-text text-muted">Create a question that attracts attention.</small>
                                @error('question.question')
                                <small class="text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <fieldset>
                                <legend>answers</legend>
                                <small id="answerhelp" class="form-text text-muted">please insert your answers.</small>

                                <div class="form-group">
                                <label for="answer">Answer 1</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="answer" aria-describedby="answerhelp"
                                       value="{{old('answer.0.answer')}}" placeholder="Create answer">
                                @error('answer.0.answer')
                                <small class="text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer 2</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="answer1" aria-describedby="answerhelp"
                                       value="{{old('answer.1.answer')}}" placeholder="Create answer">
                                @error('answer.1.answer')
                                <small class="text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer 3</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="answer2" aria-describedby="answerhelp"
                                       value="{{old('answer.2.answer')}}" placeholder="Create answer">
                                @error('answer.2.answer')
                                <small class="text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer 4</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="answer3" aria-describedby="answerhelp"
                                       value="{{old('answer.3.answer')}}" placeholder="Create answer">
                                @error('answer.3.answer')
                                <small class="text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Create Question</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
