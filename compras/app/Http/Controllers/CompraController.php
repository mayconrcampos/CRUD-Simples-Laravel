<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Resources\Compra as CompraResource;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate(15);
        return CompraResource::collection($compras);
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
        $compra = new Compra;
        $compra->nome = $request->input('nome');
        $compra->valor = $request->input('valor');
        $compra->quantidade = $request->input("quantidade");

        if( $compra->save() ){
          return new CompraResource( $compra );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compras = Compra::findOrFail( $id );
        return new CompraResource( $compras );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        $compra = Compra::findOrFail( $request->id );
        $compra->nome = $request->input('nome');
        $compra->valor = $request->input('valor');
        $compra->quantidade = $request->input("quantidade");

        if( $compra->save() ){
          return new CompraResource( $compra );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail( $id );
        if( $compra->delete() ){
            return new CompraResource( $compra );
        }
    }
}
