<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Auth;
use DB;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       

        if(Auth::check()){
            $etudiants = Etudiant::select()->paginate(5);
            return view('etudiant.liste', ['etudiants' => $etudiants]);
        }
        return redirect(route('login'))->withErrors('Vous devez vous connecté pour acceder a la liste des etudiants');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.createetudiant', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        exit($request->dateDeNaissance);
        $request->validate([
          
                'nom' => 'required',
                'prenom' => 'required',
                'adresse' => 'required',
                'phone' => 'required|numeric|digits:10',
                'dateDeNaissance' => 'required|date_format:m/d/Y',
                'ville_id' => 'required',
                'email' => 'required|email|unique:etudiants',
                
        ]);


        $newEtudiant = Etudiant::create([

            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' =>  $request->email,
            'ville_id' => $request->ville_id,
            'dateDeNaissance' => $request->dateDeNaissance   
        ]); 

        
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'phone' => $request->phone,
            'dateDeNaissance' => $request->dateDeNaissance,
            'email' => $request->email,
            'ville_id' => $request->ville_id
        ]);
        return redirect(route('liste.etudiant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect(route('liste.etudiant'));

    }

    public function about()
    {
        return view('etudiant.about');

    }
}
