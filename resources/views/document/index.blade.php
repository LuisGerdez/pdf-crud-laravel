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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div id="container_documents">
                            <h2 class="text-center">Documents</h2>

                            @if($documents->count() > 0)
                                <table class="table table-bordered display compact nowrap" id="tabla_trabajadores" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10%">ID</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center" width="30%">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td class="text-center">{{ $document->id }}</th>
                                                <td class="text-left">
                                                    <a href="{{ route('view_document', ['id' => $document->id]) }}" class="link-primary">{{ $document->title }}</a>
                                                </th>
                                                <td class="text-center">
                                                    <a href="{{ route('pdf_document', ['id' => $document->id]) }}" target=”_blank” class="btn btn-primary btn-sm">Open</a>
                                                    
                                                    @if(Auth::check())
                                                        @if (Auth::user()->id == $document->created_by_user->id)
                                                            <a href="{{ route('edit_document', ['id' => $document->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="{{ route('delete_document', ['id' => $document->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                        @endif
                                                    @endif
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h5 class="text-center">No documents posted!</h5>
                            @endif
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {!! $documents->links() !!}
    </div>
@endsection
