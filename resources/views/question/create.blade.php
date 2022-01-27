@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Questionnaire') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="POST">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <input type="text" name="question[question]" class="form-control" id="question"
                                    value="{{ old('question.question') }}"
                                    aria-describedby="questionHelp" placeholder="Enter Question...">
                                <div id="questionHelp" class="form-text">Write an easy and to-the-point question.
                                </div>

                                @error('question.question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>Choices</legend>
                                    <div id="questionHelp" class="form-text">Give choices for above answer.
                                    </div>
                                </fieldset>

                                <div>
                                    <div class="mb-3">
                                        <label for="answer1" class="form-label">Choice no. 1</label>
                                        <input type="text" name="answer[][answer]" class="form-control" id="answer1"
                                            value="{{ old('answer.0.answer') }}"
                                            aria-describedby="answerHelp" placeholder="Enter Answer 01...">
        
                                        @error('answer.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer2" class="form-label">Choice no. 1</label>
                                        <input type="text" name="answer[][answer]" class="form-control" id="answer2"
                                            value="{{ old('answer.1.answer') }}"
                                            aria-describedby="answerHelp" placeholder="Enter Answer 02...">
        
                                        @error('answer.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer3" class="form-label">Choice no. 1</label>
                                        <input type="text" name="answer[][answer]" class="form-control" id="answer3"
                                            value="{{ old('answer.2.answer') }}"
                                            aria-describedby="answerHelp" placeholder="Enter Answer 03...">
        
                                        @error('answer.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="answer4" class="form-label">Choice no. 1</label>
                                        <input type="text" name="answer[][answer]" class="form-control" id="answer4"
                                            value="{{ old('answer.3.answer') }}"
                                            aria-describedby="answerHelp" placeholder="Enter Answer 04...">
        
                                        @error('answer.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @csrf
                            <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
