@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
    @endif
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if($document)
                        <div class="card-head"><h2 class="text-center p-2">{{ $document->title }}</h2></div>
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('pdf_document', ['id' => $document->id]) }}" target=”_blank” class="btn btn-primary btn-lg">Open</a>
                            </div>

                            <div class="text-center mt-3">
                                @if(Auth::check())
                                    @if (Auth::user()->id == $document->created_by_user->id)
                                        <a href="{{ route('edit_document', ['id' => $document->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('delete_document', ['id' => $document->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
                                @endif
                            </div>

                            <p class="mt-2" style="float: right;">Posted by {{ $document->created_by_user->name }} at {{ $document->created_at->format('Y-m-d') }}</p>
                        </div>
                    @else
                        <div class="card-head"><h2 class="text-center p-2">Error 404</h2></div>

                        <div class="card-body">
                            <h6 class="text-center">This document does not exist!</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 text-center"> <a href="{{ route('home') }}" class="btn btn-secondary">Go back</a> </div>
@endsection
