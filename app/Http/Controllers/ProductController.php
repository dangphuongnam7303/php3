<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const OBJECT = 'products';
    const DOT = '.';
    public function index(): View
    {
        //show products
        $products = Product::query()->orderByDesc('id')->get();
        return view (self::OBJECT . self::DOT . __FUNCTION__) -> with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view (self::OBJECT . self::DOT . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //option 1
//        $name = $request->input('name');
//        $quality = $request->input('quality');
//        $category = $request -> input('category');

        //option 2
        $model = new Product();
//        $product->name = $name;
//        $product->quality = $quality;
//        $product->category = $category;
        $model -> fillable($request->all());

        $model->save();

        // Add any additional logic or redirections as needed

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $products = Product::find($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__)->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__)->with('product', $product);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $product = Product::query()->findOrFail($id);

        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->quality = $request->input('quality');

        // Update other product properties as needed

        $product->save();

        // Add any additional logic or redirections as needed

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        //option 1
//        $product = Product::findOrFail($id);
//        $product->delete();

        //option 2
        $product->delete();


        // Add any additional logic or redirections as needed
        return back();
    }
}
