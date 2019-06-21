<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function get($id = null)
    {
        $product = [];
        if (!is_null($id)) {
            $product = $this->product->show($id)->toArray();
        }
        return view('addProduct')
            ->with('product', $product)
            ->with('id', $id);
    }

    public function all()
    {
        $products = $this->product->all();
        return view('products')->with('products' , $products->toArray());
    }

    public function create(Request $request)
    {
        $data = [
            "code" => $request->input("code"),
            "name" => $request->input("name"),
            "price" => $request->input("price"),
        ];

        if ($this->product->create($data)) {
            return redirect()->back()->with('message', 'Product created successfully!');
        }
        return redirect()->back()->with('message', 'Something went wrong!');
    }

    public function update(Request $request)
    {
        $data = [
            "code" => $request->input("code"),
            "name" => $request->input("name"),
            "price" => $request->input("price"),
        ];

        if ($this->product->update($data, $request->input("id"))) {
            return redirect()->back()->with('message', 'Product updated successfully!');
        }
        return redirect()->back()->with('message', 'Something went wrong!');
    }

    public function delete($id)
    {
        if ($this->product->delete($id)) {
            return redirect()->back()->with('message', 'Product deleted successfully!');
        }
        return redirect()->back()->with('message', 'Something went wrong!');
    }
}
