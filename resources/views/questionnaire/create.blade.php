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

                        <form action="/questionnaires" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    aria-describedby="titleHelp" placeholder="Enter Title...">
                                <div id="titleHelp" class="form-text">Give you questionnaire a title that attracts attention.
                                </div>

                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="purpose" class="form-label">Purpose</label>
                                <input type="text" name="purpose" class="form-control" id="purpose"
                                    aria-describedby="purposeHelp" placeholder="Enter Purpose...">
                                <div id="purposeHelp" class="form-text">Giving a purpose will increase responses.
                                </div>

                                @error('purpose')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
