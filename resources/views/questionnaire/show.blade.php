@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($questionnaire->title) }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-dark">Add
                            Question</a>
                        <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}"
                            class="btn btn-dark">Take Survey</a>

                    </div>
                </div>

                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong class="me-1">{{ $key + 1 }}.</strong>{{ $question->question }}</div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="mb-0 pb-0">{{ $answer->answer }}</div>
                                        @if ($question->responses->count())
                                            <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-sm btn-outline-danger">Delete Question</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
