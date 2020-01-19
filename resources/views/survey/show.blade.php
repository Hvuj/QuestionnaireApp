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

                    <h1>{{$questionaire->title}}</h1>

                    <form action="/surveys/{{$questionaire->id}}-{{Str::slug($questionaire->title)}}" method="post">
                        @csrf

                        @foreach($questionaire->questions as $key => $question)
                        <div class="card">
                            <div class="card-header">
                                <strong>
                                    {{ $key+1 }}
                                </strong>
                                {{$question->question}}
                            </div>

                            <div class="card-body">
                                @error('responses.' . $key. '.answer_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{$key}}][answer_id]"
                                                id="answer{{$answer->id}}"
                                                {{ (old('responses.' . $key. '.answer_id') == $answer->id) ? "checked" : '' }}
                                                class="mr-2" value="{{$answer->id}}">
                                            {{ $answer->answer }}

                                            <input type="hidden" name="responses[{{$key}}][question_id]"
                                                value="{{$question->id}}">
                                        </li>
                                    </label>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <div class="card mt-4">
                            <div class="card-header">You information</div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="nameid">Name</label>
                                <input type="text" name="survey[name]" class="form-control" id="nameid"
                                    aria-describedby="namehelp" placeholder="Enter Name">
                                <small id="namehelp" class="form-text text-muted">What is your name</small>
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="emailid">Email</label>
                                <input type="email" name="survey[email]" class="form-control" id="emailid"
                                    aria-describedby="emailhelp" placeholder="Enter email">
                                <small id="emailhelp" class="form-text text-muted">What is your email</small>
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div>
                                <button type="submit" class="mt-2 btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
