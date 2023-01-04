@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 border">
        <h6 class="text-center">Post a new document</h6>

        <form action="{{ route('create_document') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label>File</label>
                <input type="file" class="form-control" name="file" accept="application/pdf" required>
            </div>
            <input type="hidden" name="creator" value="{{ Auth::user()->id }}">
        
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Go back</a>
        </form>
    </div>
@endsection