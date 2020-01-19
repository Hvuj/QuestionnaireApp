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

                    <form action="/questionaires" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="titleid">Title</label>
                            <input type="text" class="form-control" name='title' id="titleid"
                                aria-describedby="titlehelp" placeholder="Enter Title" value="{{old('title')}}">
                            <small id="titlehelp" class="form-text text-muted">Enter your cool title here</small>
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purposeid">Purpose</label>
                            <input type="text" class="form-control" name="purpose" id="purposeid"
                                aria-describedby="purposehelp" placeholder="Enter Purpose" value="{{old('purpose')}}">
                            <small id="purposehelp" class="form-text text-muted">What is your purpose here?!</small>
                            @error('purpose')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
