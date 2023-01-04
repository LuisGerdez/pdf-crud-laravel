@extends('layouts.app')

@section('content')
    <div class="container p-3 my-3 border">
        <h2 class="text-center">Are you sure you want to delete this document?</h2>

        <form action="{{ route('delete_document', ['id' => $document->id]) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}

            <div class="text-center">
                <button type="submit" class="btn btn-danger">Confirm</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection