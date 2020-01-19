<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionaire $questionaire){
        return view('question.create', compact('questionaire'));
    }

    public function store(Questionaire $questionaire){
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

            $question = $questionaire->questions()->create($data['question']);
            $question->answers()->createMany($data['answers']);

            return redirect('/questionaires/'.$questionaire->id);
    }
    public function destroy(Questionaire $questionaire, Question $question){
        $question->answers()->delete();
        $question->delete();

        return redirect($questionaire->path());
    }
}
