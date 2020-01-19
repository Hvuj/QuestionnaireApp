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

                    <h1>Welcome</h1>
                    <a href="/questionaires/create" class="btn btn-primary">Create New Questionaire</a>
                </div>


                <div class="card-body mt-4">
                    <div class="card-header">my questionaires</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questionaires as $questionaire)
                            <li class="list-group-item">
                                <a href="{{$questionaire->path()}}">{{$questionaire->title}}</a>

                                <div class="mt-2">
                                    <small class="font-weight-bold">Share Url</small>
                                    <p>
                                        <a href="{{$questionaire->publicPath()}}">
                                            {{$questionaire->publicPath()}}
                                        </a>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
