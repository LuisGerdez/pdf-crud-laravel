<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'view', 'open_pdf']]);
    }

    public function index()
    {
        $data['documents'] = Document::paginate(5);
        return view('document.index', $data);
    }

    public function create()
    {
        return view('document.create');
    }

    public function store(Request $request)
    {
        $document = new Document();
        $document->title = $request->title;
        $document->created_by = $request->creator;
        if($request->hasFile('file')) {
            $document->file = $request->file('file')->store('uploads', 'public');
        }
        $document->save();

        return redirect()->route('view_document', $document->id)->with('success', 'Document posted successfully');
    }

    public function view($id)
    {
        return view('document.view', ['document' => Document::find($id)]);
    }

    public function open_pdf($id)
    {
        $document = Document::find($id);

        if(!$document) {
            return 'ERROR 404: This document does not exist!';
        }

        //$path = storage_path('public/' . $document->file);
        $path = storage_path('app/public/' . $document->file);
        return response()->file($path);
    }

    public function edit($id)
    {
        $document = Document::find($id);

        if(!$document) {
            return redirect()->route('home')->with('error', 'This document does not exist');
        }

        if(!(Auth::user()->id == $document->created_by_user->id)) {
            return redirect()->route('home')->with('error', 'You can only edit documents posted by you');
        }
    
        return view('document.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Document::find($id);

        if(!$document) {
            return redirect()->route('home')->with('error', 'This document does not exist');
        }

        if(!(Auth::user()->id == $document->created_by_user->id)) {
            return redirect()->route('home')->with('error', 'You can only edit documents posted by you');
        }

        $document->title = $request->title;
        if($request->hasFile('file')) {
            Storage::delete('public/' . $document->file);
            $document->file = $request->file('file')->store('uploads', 'public');
        }
        $document->save();

        return redirect()->route('home')->with('success', 'Document edited successfully');
    }

    public function delete($id)
    {
        $document = Document::find($id);

        if(!$document) {
            return redirect()->route('home')->with('error', 'This document does not exist');
        }

        if(!(Auth::user()->id == $document->created_by_user->id)) {
            return redirect()->route('home')->with('error', 'You can only delete documents posted by you');
        }

        return view('document.delete', compact('document'));
    }

    public function destroy($id)
    {
        $document = Document::find($id);

        if(!$document) {
            return redirect()->route('home')->with('error', 'This document does not exist');
        }

        if(!(Auth::user()->id == $document->created_by_user->id)) {
            return redirect()->route('home')->with('error', 'You can only delete documents posted by you');
        }

        Storage::delete('public/' . $document->file);
        $document->delete();
        
        return redirect()->route('home')->with('success', 'Document deleted successfully');
    }
}
