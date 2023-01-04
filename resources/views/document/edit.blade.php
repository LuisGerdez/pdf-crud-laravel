@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 border">
        <h6 class="text-center">Edit document</h6>

        <form action="{{ route('edit_document', ['id' => $document->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ $document->title }}" required>
            </div>
            
            <div class="form-group">
                <label>File</label>
                <input type="file" class="form-control" name="file" accept="application/pdf">
            </div>

            <a href="{{ route('pdf_document', ['id' => $document->id]) }}" target=”_blank” class="link-primary">Current file</a>
        
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Go back</a>
        </form>
    </div>
@endsection