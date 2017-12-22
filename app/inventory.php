<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class inventory extends Model
{
    
    protected $Tr = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'input', 'output','status', 'user_id', 'article_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function article()
    {        
        return $this->belongsTo(Article::class);
    }

    // devuelve el consumo minimo diario de un item
    public function getCMN($id)
    {
        $cmn = DB::table('inventories')
                ->select(DB::raw('MIN(output) AS CMN'))
                ->where('article_id', '=', $id)
                ->where('output', '<>', 0)
                ->where('created_at', '>=', 'date_sub(curdate(), interval 2 month)')
                ->get();

        return $cmn[0]->CMN;
    }

    // devuelve el consumo maximo diario de un item
    public function getCMX($id)
    {
        $cmn = DB::table('inventories')
                ->select(DB::raw('Max(output) AS CMX'))
                ->where('article_id', '=', $id)
                ->where('output', '<>', 0)
                ->where('created_at', '>=', 'date_sub(curdate(), interval 2 month)')
                ->get();

        return $cmn[0]->CMX;
    }

    // devuelve el consumo promedio diario de un item
    public function getCPr($id)
    {
        $cmn = DB::table('inventories')
                ->select(DB::raw('AVG(output) AS CPr'))
                ->where('article_id', '=', $id)
                ->where('output', '<>', 0)
                ->where('created_at', '>=', 'date_sub(curdate(), interval 2 month)')
                ->get();

        return $cmn[0]->CPr;
    }

    // devuelve la existencia minimo de un item
    public function getEMN($id)
    {
        return $this->getCMN($id)*$this->Tr;
    }

    // devuelve el punto de pedido
    public function getPP($id)
    {
        return ($this->getCPr($id) * $this->Tr) + $this->getEMN($id);
    }

    //devuelve la existencias maximas
    public function getEMX($id)
    {
        return ($this->getCMX($id) * $this->Tr) + $this->getEMN($id);
    }

    public function getSaldo($id = 1)
    {
        // return Article::select('residue')
        //                 ->where('id', $id)
        //                 ->get()[0]->residue;
        $saldo = DB::table('articles')
                        ->join('inventories', 'articles.id', '=', 'inventories.article_id')                        
                        ->select('articles.residue',
                            DB::raw('(articles.residue + SUM(inventories.input) - SUM(inventories.output)) AS Saldo'))
                        ->groupBy('articles.residue')
                        ->where('articles.id', $id)                        
                        ->get();

        return $saldo[0]->Saldo;
    }

    //cantidad a pedir
    public function getCP($id)
    {
        return ($this->getEMX($id) - $this->getSaldo($id));
    }
}
