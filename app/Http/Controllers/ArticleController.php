<?php

namespace App\Http\Controllers;

use App\Article;
use App\Provider;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getLink()
    {
        return view('articles.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);
        
        return [
            'pagination' => [
                'total'         => $articles->total(),
                'current_page'  => $articles->currentPage(),
                'per_page'      => $articles->perPage(),
                'last_page'     => $articles->lastPage(),
                'from'          => $articles->firstItem(),
                'to'            => $articles->lastItem(),
            ],
            'articles' => $articles
        ];  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $providers = article::pluck('description', 'id')->toArray();
    //     $providers  = ['Selecc. Proveedor'] + $providers;

    //     return view('articles.add', compact('providers'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validacion($request);

        $article = article::create([            
            'description' => $request->description,
            'make'        => $request->make,
            'provider_id' => $request->provider_id,
            'um'          => $request->um,
            'ABC'         => $request->ABC,
            'stockmin'    => $request->stockmin,
            'stockmax'    => $request->stockmax,
            'residue'     => 0,
            ]);
        
        //return Redirect()->back();
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validacion($request);

        $article->description = $request->description;
        $article->make        = $request->make;
        $article->provider_id = $request->provider_id;
        $article->um          = $request->um;
        $article->ABC         = $request->ABC;
        $article->stockmin    = $request->stockmin;
        $article->stockmax    = $request->stockmax;
        
        $article->update();

        // $articles = article::paginate(5);
        
        // return view('articles.list', compact('articles'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
    }

    public function validacion(Request $request)
    {
        return $this->validate($request, [
            'description' => 'required',
            'make'        => 'required',
            'provider_id' => 'required',
            'ABC'         => 'required|in:A,B,C',
            'stockmin'    => 'required|numeric',
            'stockmax'    => 'required|numeric',
            'um'          => 'required'
        ]);
    }
}
