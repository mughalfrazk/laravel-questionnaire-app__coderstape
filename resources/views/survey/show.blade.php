@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{ $questionnaire->title }}</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="POST">

                    @foreach ($questionnaire->questions as $key => $question)
                        <div class="card">
                            <div class="card-header">{{ __($question->question) }}</div>
                            <div class="card-body">

                                @error('responses.' . $key . '.answer_id')
                                    <small class="text-danger mb-2">{{ $message }}</small>
                                @enderror

                                @foreach ($question->answers as $answer)
                                    <ul class="list-group">
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="responses[{{ $key }}][answer_id]"
                                                    {{ old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : '' }}
                                                    id="answer{{ $answer->id }}" class="mr-3"
                                                    value="{{ $answer->id }}">
                                                <input type="hidden" name="responses[{{ $key }}][question_id]"
                                                    value="{{ $question->id }}">

                                                {{ $answer->answer }}
                                            </li>
                                        </label>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @endforeach



                    <div class="card mt-4">
                        <div class="card-header">User Information</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="survey[name]" class="form-control" id="name"
                                    value="{{ old('survey.name') }}" aria-describedby="nameHelp"
                                    placeholder="Enter Name...">
                                <div id="nameHelp" class="form-text">Hello, What's your name?
                                </div>

                                @error('survey.name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="survey[email]" class="form-control" id="email"
                                    value="{{ old('survey.email') }}" aria-describedby="emailHelp"
                                    placeholder="Enter Email...">
                                <div id="emailHelp" class="form-text">Please provide your email.
                                </div>

                                @error('survey.email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @csrf
                            <button type="submit" class="btn btn-primary">Complete Survey</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
