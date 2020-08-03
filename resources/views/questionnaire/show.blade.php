@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="card-body">
                        <p>{{$questionnaire->purpose}}</p>
                        <hr>


                        <hr>
                        <a href="{{$questionnaire->createQuestion()}}" class="btn btn-primary">Add questions</a>
                        <a href="{{$questionnaire->surveyPath()}}" class="btn btn-success">Take survey</a>

                    </div>
                </div>
                @foreach($questionnaire->questions as $question)

                    <div class="card mt-4">
                        <div class="card-header">{{$question->question}}</div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{$answer->answer}}</div>
                                        @if($question->responses->count()>0)
                                        <div>{{intval($answer->responses->count()*100/$question->responses->count())}}%</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
