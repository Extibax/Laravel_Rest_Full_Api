<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Se usa usualmente para mostrar todos los productos */
    public function index()
    {
        /* My way Extibax :) */
        /* echo json_encode(Product::all(), JSON_PRETTY_PRINT); */

        /* Other way */
        $products = Product::all();
        return json_encode($products, JSON_PRETTY_PRINT);
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

    /* Se usa usualmente para guardar un producto */
    public function store(Request $request)
    {
        /* Se hace uso del modelo Product el cual esta asociado directamente con la DB */
        $product = new Product();

        /* Se asignal los valores a la tabla con los datos recibidos en los parametros */
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        /* Se guarda el producto en la tabla */
        $product->save();

        /* Se da como respuesta un echo */
        echo "Product saved successfully :)";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* Se usa usualmente para mostrar un producto */
    public function show($id)
    {
        /* El id es pasado como parametro en la url del endpoint ej: localhost/api/products/1 */
        $product = Product::find($id);
        return $product;
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

    /* Se usa usualmente para actualizar un producto */
    public function update(Request $request, $id)
    {
        /* Se hace la busqueda del producto con el id de la url */
        $product = Product::find($id);

        /* Se actualizan los datos con los parametros pasados */
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        /* Se guarda le cambio */
        $product->save();

        /* Se avisa */
        echo "Product updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* Se usa usualmente para eliminar productos */
    public function destroy($id)
    {
        /* Se busca el producto */
        $product = Product::find($id);

        /* Se elimina el producto */
        $product->delete();

        /* Se notifica */
        echo "Product deleted successfully";
    }
}
