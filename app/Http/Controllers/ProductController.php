<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prdocuts = Product::get();

        return view('product.index', ['products' => $prdocuts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->get('data');

        $newProduct = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        return response()->json(["status" => true, "message" => "Produto cadastrado", "data" => ['product' => $newProduct]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prdocut = Product::find($id);

        return view('product.product', ['product' => $prdocut]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prdocut = Product::findOrFail($id);

        return view('product.edit', ['product' => $prdocut]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prdocut = Product::findOrFail($id);

        $data = $request->get('data');

        $updateProduct = $prdocut->update([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        return response()->json(["status" => true, "message" => "Produto atualizado", "data" => ['product' => $updateProduct]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prdocut = Product::findOrFail($id);

        $prdocut->delete();

        $prdocuts = Product::get();

        return response()->json(["status" => true, "message" => "Produto Excluido", "data" => []]);
    }
}
