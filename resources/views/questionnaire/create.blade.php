@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titlehelp" placeholder="Create Title">
                            <small id="titlehelp" class="form-text text-muted">Create a title that attracts attention.</small>
                            @error('title')
                            <small class="text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">purpose</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposehelp" placeholder="Create  Purpose">
                            <small id="purposehelp" class="form-text text-muted">Give me a purpose.</small>
                            @error('purpose')
                            <small class="text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
