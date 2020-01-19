@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionaire->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/questionaires/{{ $questionaire->id }}/questions/create" class="btn btn-primary">Add
                        Question</a>
                    <a href="/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}"
                        class="btn btn-primary">Take
                        Survey</a>
                    @foreach($questionaire->questions as $question)
                    <div class="card">
                        <div class="card-header">{{$question->question}}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{$answer->answer}}</div>
                                    @if($question->responses->count())
                                    <div>{{ intval(($answer->responses->count() *100)/$question->responses->count()) }}%</div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <form action="/questionaires/{{ $questionaire->id }}/questions/{{$question->id}}"
                                method="post">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sn btn-outline-danger">Delete question</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
