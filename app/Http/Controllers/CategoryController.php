<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
		return view("categories.index", compact("categories"));
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(StoreCategoryRequest $request)
    {
		$category = new Category();

		$category->name = $request->name;
		$category->save();

		return redirect(route("category.index"));
    }

    public function edit(Category $category)
    {
        return view("categories.edit", compact("category"));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
		$category->name = $request->name;

		return redirect(route("category.index"));

    }

    public function destroy(Category $category)
    {
        $category->delete();

		return redirect(route("category.index"));
    }
}
