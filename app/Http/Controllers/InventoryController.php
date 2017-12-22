<?php

namespace App\Http\Controllers;

use App\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function createSalida()
    {
        return view('inventory.output.index');        
    }

    public function createEntrada()
    {
        return view('inventory.input.index');        
    }

    public function getLink()
    {
        return view('inventory.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = DB::table('articles')
                        ->join('inventories', 'articles.id', '=', 'inventories.article_id')                        
                        ->select('articles.description', 'articles.id', 'articles.residue', 'articles.status',
                            DB::raw('SUM(inventories.input) AS Entrada'), DB::raw('SUM(inventories.output) AS Salida'),
                            DB::raw('(articles.residue + SUM(inventories.input) - SUM(inventories.output)) AS saldoFinal'))
                        ->groupBy('articles.id', 'articles.description', 'articles.stockmin', 'articles.stockmax', 'articles.residue',
                            'articles.status')
                        ->orderBy('articles.description', 'ASC')
                        ->paginate(10);
        
        return [
            'pagination' => [
                'total'         => $inventory->total(),
                'current_page'  => $inventory->currentPage(),
                'per_page'      => $inventory->perPage(),
                'last_page'     => $inventory->lastPage(),
                'from'          => $inventory->firstItem(),
                'to'            => $inventory->lastItem(),
            ],
            'inventory' => $inventory
        ];  
        // return response()->json($inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validacion($request);
        $user_id = Auth()->user()->id;
        
        $inventory = Inventory::create([            
            'input'      => $request->input,
            'output'     => $request->output,
            'user_id'    => $user_id,
            'article_id' => $request->article_id,            
            ]);
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $this->validacion($request);

        $inventory->input  = $request->input;
        $inventory->output = $request->output;        
        
        $inventory->update(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
    }

    public function validacion(Request $request)
    {
        return $this->validate($request, [
            'input'      => 'required|numeric',
            'output'     => 'required|numeric',            
            'article_id' => 'required',            
        ]);
    }

    public function getSalida()
    {
        $inventory = Inventory::where('output', '>', '0')
                    ->orderBy('id', 'DESC')
                    ->with('article')
                    ->where('status', 0)
                    ->paginate(10);        
        
        return [
            'pagination' => [
                'total'         => $inventory->total(),
                'current_page'  => $inventory->currentPage(),
                'per_page'      => $inventory->perPage(),
                'last_page'     => $inventory->lastPage(),
                'from'          => $inventory->firstItem(),
                'to'            => $inventory->lastItem(),
            ],
            'inventory' => $inventory
        ];  
    }

    

    public function getEntrada()
    {
        $inventory = Inventory::where('input', '>', '0')
                    ->orderBy('id', 'DESC')
                    ->with('article')
                    ->paginate(10);        
        
        return [
            'pagination' => [
                'total'         => $inventory->total(),
                'current_page'  => $inventory->currentPage(),
                'per_page'      => $inventory->perPage(),
                'last_page'     => $inventory->lastPage(),
                'from'          => $inventory->firstItem(),
                'to'            => $inventory->lastItem(),
            ],
            'inventory' => $inventory
        ];  
    }

    public function prueba()
    {
        $inventario = new Inventory();
        echo("CMN =".$inventario->getCMN(4)."<br>");
        echo("CPr =".$inventario->getCPr(4)."<br>");
        echo("EMN =".$inventario->getEMN(4)."<br>");
        echo("PP =".$inventario->getPP(4)."<br>");
        echo("CMX =".$inventario->getCMX(4)."<br>");
        echo("EMX =".$inventario->getEMX(4)."<br>");
        echo("CP =".$inventario->getCP(4)."<br>");
    }

    public function getSaldoArticle()
    {
        $inventario = new Inventory();
        return $inventario->getSaldo();
    }

}
