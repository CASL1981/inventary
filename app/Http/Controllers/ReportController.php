<?php

namespace App\Http\Controllers;

use App\Article;
use App\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
	public function index()
	{
		$id = $_GET['id'];
        $kardex = Inventory::select('input', 'output', 'created_at')
        					->where('article_id', $id)
        					->where('status', 1)
        					->paginate(10);
		return [
            'pagination' => [
                'total'         => $kardex->total(),
                'current_page'  => $kardex->currentPage(),
                'per_page'      => $kardex->perPage(),
                'last_page'     => $kardex->lastPage(),
                'from'          => $kardex->firstItem(),
                'to'            => $kardex->lastItem(),
            ],
            'kardex'     => $kardex            
        ];          
	}

    public function linkKardex()
    {
    	return view('report.kardex');
    }

    public function kardexArticle($id)
    {
    	$saldo = DB::table('articles')
                        ->join('inventories', function($join){
                            $join->on('articles.id', '=', 'inventories.article_id')
                                ->where('inventories.status', 1);
                        })
                        ->where('article_id', $id)    
                        ->select('articles.id',
                            DB::raw('SUM(inventories.input) AS Entrada'), DB::raw('SUM(inventories.output) AS Salida'),
                            DB::raw('(articles.residue + SUM(inventories.input) - SUM(inventories.output)) AS saldoFinal'))
                        ->groupBy('articles.id', 'articles.stockmin', 'articles.stockmax', 'articles.residue')
                        ->get();


    	$article = Article::findOrFail($id);    	
        
        return [            
            'article'	 => $article,
            'saldo'		 => $saldo[0]
        ];          
    }
}
