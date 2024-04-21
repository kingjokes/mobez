<?php

namespace App\Services;

use App\Interfaces\ProductInterface;
use App\Models\CategoryModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProductService implements ProductInterface
{

    public function getProducts()
    {

        $query = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->get();


        return $query;
    }

    public function deleteProduct(int $id)
    {
        $query = ProductModel::findOrFail($id)->delete();
        $image = ProductImagesModel::where('id', $id)->delete();


        if ($query) return redirect()->route('admin.products')->with('status', 'Product deleted successfully');


        return back()->with('error', 'Unable to delete product');
    }
    public function deleteProductImage(int $id)
    {
        $query = ProductImagesModel::where('id', $id)->delete();


        if ($query) return back()->with('status', 'Product image deleted successfully');


        return back()->with('error', 'Unable to delete product image');
    }

    public function productDetails(int $id)
    {
        
    }

    public function updateProduct(array $details)
    {
    }

    public function addProduct(array $details, $image, $prodImages)
    {
        // dd($prodImages);
        $query = ProductModel::create([
            "name" => $details['name'],
            "slug" => strtolower(str_replace(' ', '-', $details['name'])),
            "short_description" => $details['short_description'],
            "full_description" => $details['full_description'],
            "price" => $details['price'],
            'status' => $details['status'],
            'category_id' => $details['category'],
        ]);
        $update = $upload = "";

        if ($image !== null) {
            $filename = Date::now() . $image->getClientOriginalName();
            $image->move(public_path("/product_images/"), $filename);

            $path = url('/product_images/' . $filename);

            $update = ProductModel::where('id', $query->id)
                ->update([
                    "image" => $path
                ]);
        }

        foreach ($prodImages as $image) {
            $filename = Date::now() . $image->getClientOriginalName();
            $image->move(public_path("/product_images/"), $filename);

            $path = url('/product_images/' . $filename);

            $upload = ProductImagesModel::create([
                "image" => $path,
                "product_id" => $query->id
            ]);
        }

        if ($query && $update && $upload) return redirect()->route('admin.products')->with('status', 'Product added successfully');


        return back()->with('error', 'Unable to add product');
    }
    public function editProduct(array $details, $image, $prodImages)
    {


        $query = ProductModel::where('id', $details['id'])->update([
            "name" => $details['name'],
            "slug" => strtolower(str_replace(' ', '-', $details['name'])),
            "short_description" => $details['short_description'],
            "full_description" => $details['full_description'],
            "price" => $details['price'],
            'status' => $details['status'],
            'category_id' => $details['category'],
        ]);
       

        if ($image !== null) {
            $filename = Date::now() . $image->getClientOriginalName();
            $image->move(public_path("/product_images/"), $filename);

            $path = url('/product_images/' . $filename);

            $update = ProductModel::where('id', $details['id'])
                ->update([
                    "image" => $path
                ]);
        }

        if (count($prodImages?? []) > 0) {
            foreach ($prodImages as $image) {
                $filename = Date::now() . $image->getClientOriginalName();
                $image->move(public_path("/product_images/"), $filename);

                $path = url('/product_images/' . $filename);

                $upload = ProductImagesModel::create([
                    "image" => $path,
                    "product_id" => $details['id']
                ]);
            }
        }



        if ($query ) return back()->with('status', 'Product updated successfully');


        return back()->with('error', 'Unable to update product');
    }

    public function productPage()
    {

        return view('admin.products', ["data" => $this->getProducts()]);
    }

    public function addProductPage()
    {
        $query = CategoryModel::all();
        return view('admin.add-products', ["categories" => $query]);
    }

    public function editProductPage(int $id)
    {
        $product = ProductModel::where('id', $id)->first();
        $prod_images = ProductImagesModel::where('product_id', $id)->get();
        $categories = CategoryModel::all();

        return view('admin.edit-product', ["details" => $product, 'product_images' => $prod_images, "categories" => $categories]);
    }
}
