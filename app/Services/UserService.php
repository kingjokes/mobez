<?php

namespace App\Services;

use App\Mail\ContactMailer;
use App\Models\CategoryModel;
use App\Models\OrdersModel;
use App\Models\ProductImagesModel;
use App\Models\ProductModel;
use App\Models\ProductRatingModel;
use Illuminate\Support\Facades\DB;
use App\Services\AdminService;
use Illuminate\Support\Facades\Mail;

class UserService
{

    public function trendyProducts()
    {
        $query = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.status', '=', 1)
            ->inRandomOrder()
            ->limit(6)->get();

        $data = [];

        foreach ($query as $result) {
            $images = ProductImagesModel::where('product_id', $result->id)->get();
            $data[] = [
                "id" => $result->id,
                "name" => $result->name,
                "slug" => $result->slug,
                "image" => $result->image,
                "category_id" => $result->category_id,
                "category_name" => $result->category_name,
                "short_description" => $result->short_description,
                "full_description" => $result->full_description,
                "price" => $result->price,
                "status" => $result->status,
                "created_at" => $result->created_at,
                "updated_at" => $result->updated_at,
                "product_images" => $images,
                "currency" => AdminService::getCurrency()
            ];
        }

        return $data;
    }

    public function relatedProducts(int $catId)
    {
        $query = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.status', '=', 1)
            ->where('products.category_id', $catId)
            ->inRandomOrder()
            ->limit(6)->get();

        $data = [];

        foreach ($query as $result) {
            $images = ProductImagesModel::where('product_id', $result->id)->get();
            $data[] = [
                "id" => $result->id,
                "name" => $result->name,
                "slug" => $result->slug,
                "image" => $result->image,
                "category_id" => $result->category_id,
                "category_name" => $result->category_name,
                "short_description" => $result->short_description,
                "full_description" => $result->full_description,
                "price" => $result->price,
                "status" => $result->status,
                "created_at" => $result->created_at,
                "updated_at" => $result->updated_at,
                "product_images" => $images,
                "currency" => AdminService::getCurrency()
            ];
        }

        return $data;
    }



    public function Products($catId = '')
    {
        $query = !!$catId ?  DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('categories.id', $catId)
            ->where('products.status', '=', 1)
            ->get()
            : DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.status', '=', 1)
            ->get();

        $data = [];

        foreach ($query as $result) {
            $images = ProductImagesModel::where('product_id', $result->id)->get();
            $data[] = [
                "id" => $result->id,
                "name" => $result->name,
                "slug" => $result->slug,
                "image" => $result->image,
                "category_id" => $result->category_id,
                "category_name" => $result->category_name,
                "short_description" => $result->short_description,
                "full_description" => $result->full_description,
                "price" => $result->price,
                "status" => $result->status,
                "created_at" => $result->created_at,
                "updated_at" => $result->updated_at,
                "product_images" => $images,
                "category_name" => $result->category_name,
                "currency" => AdminService::getCurrency()

            ];
        }

        return $data;
    }

    public function getCategories()
    {

        return CategoryModel::all()->sortBy('name');
    }

    public function productDetails(int $id)
    {
        $result =  DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();

        $images = ProductImagesModel::where('product_id', $id)->get();

        $reviews = ProductRatingModel::where('product_id', $id)->get();

        $averageRating =  ProductRatingModel::where('product_id', $id)->avg('rating');


        $data = [
            "id" => $result->id,
            "name" => $result->name,
            "slug" => $result->slug,
            "image" => $result->image,
            "category_id" => $result->category_id,
            "short_description" => $result->short_description,
            "full_description" => $result->full_description,
            "price" => $result->price,
            "status" => $result->status,
            "created_at" => $result->created_at,
            "updated_at" => $result->updated_at,
            "product_images" => $images,
            "category_name" => $result->category_name,
            "reviews" => $reviews,
            "average_rating" => $averageRating,

            "currency" => AdminService::getCurrency()

        ];

        return $data;
    }


    public function shopPage($catId = '')
    {
        return view('shop', [
            "products" => $this->Products($catId),
            "categories" => $this->getCategories(),
            "currency" => AdminService::getCurrency()
        ]);
    }

    public function productDetailsPage(int $id)
    {
        $details = $this->productDetails($id);
        return view('product', [
            "details" => $details,
            "related_products" => $this->relatedProducts($details['category_id'])
        ]);
    }

    public function homePage()
    {
        return view('home', [
            "trending_products" => $this->trendyProducts(),
            "currency" => AdminService::getCurrency()
        ]);
    }


    public function OrderCompletePage($order_id)
    {

        if (!$order_id) return redirect()->route('shop-checkout');


        $query = OrdersModel::where('order_id', $order_id)
            ->first();


        if (!$query) return abort(404);

        return view('order-complete', ["details" => $query, "currency" => AdminService::getCurrency()]);
    }

    public function sendMessage(array $details)
    {


        $query = Mail::send(new ContactMailer($details['messages'], $details['name'], $details['email']));


        if ($query) return back()->with('status', 'Message sent  successfully');


        return back()->with('error', 'Unable to send message, please try again');
    }
}
