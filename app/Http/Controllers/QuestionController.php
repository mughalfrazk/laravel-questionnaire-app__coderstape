<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        // dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answer.*.answer' => 'required',
        ]);

        // dd($data);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answer']);

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
