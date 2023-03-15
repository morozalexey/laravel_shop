<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('product.create', compact('tags', 'colors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            if (isset($data['tags'])) {
                $tagIds = $data['tags'];
                unset($data['tags']);
            }
            if (isset($data['colors'])) {
                $colors = $data['colors'];
                unset($data['colors']);
            }
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $product = Product::firstOrCreate($data);
            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }
            if (isset($colors)) {
                $product->colors()->sync($colors);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            if (isset($data['tags'])) {
                $tagIds = $data['tags'];
                unset($data['tags']);
            }
            if (isset($data['colors'])) {
                $colors = $data['colors'];
                unset($data['colors']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            $product->update($data);
            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }
            if (isset($colors)) {
                $product->colors()->sync($colors);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return view('product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
