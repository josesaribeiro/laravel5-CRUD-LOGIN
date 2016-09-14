<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\PhpWord as PhpWord;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $documents = Document::orderBy('company')->get();

        return view('documents.index')->withDocuments($documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'owner' => 'required'
        ]);
        
        $input = $request->all();

        Document::create($input);

        Session::flash('flash_message', 'Document successfully added!');

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);

        return view('documents.show')->withDocument($document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);

        return view('documents.edit')->withDocument($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
    
        $this->validate($request, [
            'company' => 'required',
            'owner' => 'required'
        ]);
    
        $input = $request->all();
    
        $document->fill($input)->save();
    
        Session::flash('flash_message', 'Document successfully updated!');
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        $document->delete();
    
        Session::flash('flash_message', 'Document successfully deleted!');
    
        return redirect()->route('Documents.index');
    }
    
     /**
     * Generate doc and download.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $document = Document::findOrFail($id);
        $phpWord = new PhpWord();
        $template= public_path(). "/download/template.docx";
        $file= public_path(). "/download/result.docx";
        $download = $phpWord->loadTemplate($template);
        $download->setValue('COMPANY', $document->company);
        $download->setValue('OWNER', $document->owner);
        $download->saveAs($file);
        $headers = array('Content-Type: application/docx',
                );
        return response()->download($file, 'result.docx', $headers);
    }
}
