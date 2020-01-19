<?php

namespace App\Http\Controllers;

use App\Questionaire;
use App\SurveyResponse;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('questionaire.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

        $questionaire = auth()->user()->questionaires()->create($data);
        // $data['user_id'] = auth()->user()->id;
        // $questionaire = Questionaire::create($data);

        return redirect('/questionaires/'.$questionaire->id);
    }

    public function show(Questionaire $questionaire){

        $questionaire->load('questions.answers.responses');

        return view('questionaire.show', compact('questionaire'));
    }
}
