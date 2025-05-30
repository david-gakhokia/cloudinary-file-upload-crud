<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'sku'      => 'required|string|unique:products',
            'price'    => 'required|numeric',
            'quantity' => 'required|integer',
            'image'    => 'nullable|image|max:2048',
        ]);

        $imageFilename = null;
        $imageUrl = null;
        $publicId = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = $originalName . '_' . time();

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud.cloud_name'),
                    'api_key'    => config('cloudinary.cloud.api_key'),
                    'api_secret' => config('cloudinary.cloud.api_secret'),
                ],
            ]);

            $uploaded = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder'          => 'foodly/products',
                'public_id'       => $uniqueName,
                'overwrite'       => true,
                'resource_type'   => 'image',
                'use_filename'    => true,
                'unique_filename' => false,
            ]);

            $imageFilename = $uploaded['original_filename'] . '.' . $file->getClientOriginalExtension();
            $imageUrl = $uploaded['secure_url'];
            $publicId = $uploaded['public_id'];
        }

        $product = Product::create([
            'name'           => $request->input('name'),
            'status'         => 'active',
            'rank'           => 0,
            'price'          => $request->input('price'),
            'sku'            => $request->input('sku'),
            'quantity'       => $request->input('quantity'),
            'description'    => $request->input('description'),
            'image_filename' => $imageFilename,
            'image_url'      => $imageUrl,
            'public_id'      => $publicId,
        ]);

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'sku'      => 'required|string|unique:products,sku,' . $product->id,
            'price'    => 'required|numeric',
            'quantity' => 'required|integer',
            'image'    => 'nullable|image|max:2048',
        ]);

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete the old image from Cloudinary if it exists
            if ($product->public_id) {
                (new \Cloudinary\Cloudinary())->uploadApi()->destroy($product->public_id);
            }

            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = $originalName . '_' . time();

            $cloudinary = new \Cloudinary\Cloudinary([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud.cloud_name'),
                    'api_key'    => config('cloudinary.cloud.api_key'),
                    'api_secret' => config('cloudinary.cloud.api_secret'),
                ],
            ]);

            $uploaded = $cloudinary->uploadApi()->upload($file->getRealPath(), [
                'folder' => 'foodly/products',
                'public_id' => $uniqueName,
                'overwrite' => true,
                'resource_type' => 'image',
                'use_filename' => true,
                'unique_filename' => false,
            ]);

            $product->image_filename = $uploaded['original_filename'] . '.' . $file->getClientOriginalExtension();
            $product->image_url = $uploaded['secure_url'];
            $product->public_id = $uploaded['public_id'];
        }

        $product->save();

        return redirect()->route('products.show', $product->id)->with('success', 'Product updated!');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->public_id) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => config('cloudinary.cloud.cloud_name'),
                    'api_key'    => config('cloudinary.cloud.api_key'),
                    'api_secret' => config('cloudinary.cloud.api_secret'),
                ],
            ]);

            try {
                $cloudinary->uploadApi()->destroy($product->public_id);
            } catch (\Exception $e) {
                Log::error("Cloudinary delete failed: " . $e->getMessage());
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
