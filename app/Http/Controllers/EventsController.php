<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function produit()
    {
        return view('pages.produit');
    }

    public function PostProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|min6'
        ]);

        $pro = new Product();

        $pro->name = $request->name;
        $pro->save();

        flashy()->success("Enregistrement afectuez avec succes");
        return redirect()->route('index');
    }

    public function list()
    {
        $lists = Product::all();
        return view('pages.list', compact('lists'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.edit', compact('produit'));
    }

    public function delete_product($id)
    {
        Product::destroy($id);
        
        flashy()->success("supression avec succes");
        return redirect()->route('list');
    }
}
