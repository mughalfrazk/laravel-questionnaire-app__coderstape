<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire, $slug)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required'
        ]);
        
        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return 'Survey Response Submitted!';
    }
}
