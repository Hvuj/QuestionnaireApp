@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/questionaires/{{$questionaire->id}}/questions" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="questionsid">questions</label>
                            <input type="text" class="form-control" name='question[question]' id="questionsid"
                                aria-describedby="questionshelp" placeholder="Enter question"
                                value="{{old('question.question')}}">
                            <small id="questionshelp" class="form-text text-muted">Enter your cool questions
                                here</small>
                            @error('question.question')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choiceshelp" class="form-text text-muted">give choices that give you the most
                                    insight into your question</small>

                                <div>
                                    <div class="form-group">
                                        <label for="answer1id">Choice 1</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer1id"
                                            aria-describedby="choicehelp" placeholder="Enter choice 1"
                                            value="{{old('answers.0.answer')}}">
                                        @error('answers.0.answer')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2id">Choice 2</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer2id"
                                            aria-describedby="choicehelp" placeholder="Enter choice 2"
                                            value="{{old('answers.1.answer')}}">
                                        @error('answers.1.answer')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3id">Choice 3</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer3id"
                                            aria-describedby="choicehelp" placeholder="Enter choice 3"
                                            value="{{old('answers.2.answer')}}">
                                        @error('answers.2.answer')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4id">Choice 4</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer4id"
                                            aria-describedby="choicehelp" placeholder="Enter choice 4"
                                            value="{{old('answers.3.answer')}}">
                                        @error('answers.3.answer')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
