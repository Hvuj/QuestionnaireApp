<?php

namespace App\Http\Controllers;

use App\Questionaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionaire $questionaire, $slug){
        $questionaire->load('questions.answers');
        return view('survey.show', compact('questionaire'));
    }

    public function store(Questionaire $questionaire){
        $data= request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return 'thankk you';
    }
}
