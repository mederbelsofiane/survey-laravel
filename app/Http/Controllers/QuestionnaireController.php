<?php

namespace App\Http\Controllers;
use App\Questionnaire;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create()
    {
        return(view('questionnaire.create'));
    }
    public function store()
    {
        $data= request()->validate([
           'title' => 'required',
           'purpose' => 'required'
        ]);
        //$data['user_id']=auth()->user()->id;
        $questionnaire = auth()->user()->questionnaires()->create($data);
        return(redirect('/questionnaires/'.$questionnaire->id));
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');

    return(view('questionnaire.show',compact('questionnaire')));
    }

    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect('/home');
    }



}

