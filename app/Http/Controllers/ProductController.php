<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
		$products = $this->filter();
		$categories = Category::all();

		return view("products.index", compact("products", "categories"));
    }

    public function create()
    {
		$categories = Category::all();
		return view("products.create", compact("categories"));
    }

    public function store(StoreProductRequest $request)
    {
		$product = new Product();
		$product->name = $request->name;
		$product->description = $request->description;
		$product->category_id = $request->category;
		$product->uploadImage($request->image);
		$product->save();

		return redirect(route("product.index"));
    }

    public function edit(Product $product)
    {
		$categories = Category::all();
		return view("products.edit", compact("product", "categories"));

	}

    public function update(UpdateProductRequest $request, Product $product)
    {
		$product->name = $request->name;
		$product->description = $request->description;
		$product->category_id = $request->category;
		if (isset($request->image)) {
			$product->uploadImage($request->image);
		}
		$product->save();

		return redirect(route("product.index"));
    }

    public function destroy(Product $product)
    {
        $product->delete();
		return redirect(route("product.index"));
    }

	private function filter() {
		$request = request();
		$products = Product::query();

		$request->validate([
			"name" => "string"
		]);
		if (isset($request->name)) {
			$products = $products->where("name", "like", "%$request->name%");
		}

		if (isset($request->category)) {
			$products->where("category_id", "=", $request->category);
		}

		return $products->get();
	}
}
