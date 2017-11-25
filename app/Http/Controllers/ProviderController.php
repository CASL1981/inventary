<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getLink()
    {
        return view('providers.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::paginate(5);       
        return response()->json($providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.add');
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

        $provider = Provider::create([
            'nit'         => $request->nit,
            'description' => $request->description,
            'address'     => $request->address,
            'phone'       => $request->phone,
            ]);
        
        return Redirect()->back();
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('providers.add', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $this->validacion($request);

        $provider->nit         = $request->nit;
        $provider->description = $request->description;
        $provider->address     = $request->address;
        $provider->phone       = $request->phone;
        
        $provider->update();

        $providers = Provider::paginate(5);
        
        return view('providers.list', compact('providers'));
    }

    public function validacion(Request $request)
    {
        return $this->validate($request, [
            'nit'         => 'required|numeric',
            'description' => 'required|string',
            'address'     => 'required|string|max:190',
            'phone'       => 'required|numeric',            
        ]);
    }
}
