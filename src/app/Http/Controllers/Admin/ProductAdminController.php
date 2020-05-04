<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Helper\Image;

class ProductAdminController extends Controller
{
    use Image;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $request)
    {
        if ($request->hasFile('image')) {
            $imgName = $this->uploadImage($request->file('image'));
        }
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imgName,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('list.product');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $data = [
            'categories' => $categories,
            'product' => $product
        ];
        return view('admin.product.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestProduct $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        if ($request->hasFile('image')) {
            $imgName = $this->uploadImage($request->file('image'));
            $product->image = $imgName;
            $product->save();
        }
        return redirect()->route('list.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['id' => $id], 200);
    }
}
