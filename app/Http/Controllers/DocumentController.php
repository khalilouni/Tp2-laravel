<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::select()->paginate(5);
        return view('document.liste' , ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([

            'document' => 'required|mimes:pdf,zip|max:2048',
            'titre' => 'required|unique:documents',
            'titre_fr' => 'required|unique:documents',

        ]);
        

        $document = $request->document;


        $Documentname=$request->titre.'.'.$document->getClientOriginalExtension();
        $request->document->move('assets/document',$Documentname);

        $request->document = $Documentname;
        
       
        $newDocument = Document::create([

            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'document' => $request->document,
            'user_id' => $request->user_id,
             
        ]); 

        
        return redirect(route('create.document'))->with('message', 'IT WORKS!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('document.edit' , ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'titre' => 'required|unique:documents',
            'titre_fr' => 'required|unique:documents',

        ]);
        $document = Document::find($id);

        $document->update([

            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
             
        ]);

        return view('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(route('document.liste'));
    }


    public function download(Request $request,$document) 
    {
        return response()->download(public_path('assets/document/'.$document));
    }


}
