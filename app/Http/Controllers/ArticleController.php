<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App;
use Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::selectArticles();
        return view('article.index', ['article' => $articles]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //exit($request);

        $request->validate([
          
            'titre' => 'required|unique:articles',
            'contenu' => 'required',
            'titre_fr' => 'required|unique:articles',
            'contenu_fr' => 'required',
            

        ]);

        $newArticle = Article::create([

            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'user_id' => $request->user_id,

        ]); 
        
        return redirect(route('liste.article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $user_id = Auth::user()->id;
        if ($article['user_id'] === $user_id) {

            return view('article.edit', ['article' => $article]);

        }else {

            $articles = Article::selectArticles();
            return view('article.index', ['article' => $articles]);
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
          
            'titre' => 'required|unique:articles',
            'titre_fr' => 'required|unique:articles',

        ]);
        $article = Article::find($id);
        $article->update([

            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'user_id' => $request->user_id,
          
        ]);
        return redirect(route('liste.article'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $article->delete();
        return redirect(route('liste.article'));

    }
}
