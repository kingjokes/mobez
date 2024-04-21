<?php

namespace App\Services;

use App\Interfaces\ReviewInterface;
use App\Models\ProductRatingModel;
use Illuminate\Support\Facades\DB;

class ReviewService implements ReviewInterface
{

    public function AddReview(array $details)
    {

        $query = ProductRatingModel::create([
            "rating" => $details['rating'],
            "review" => $details['review'],
            "product_id" => $details['product_id'],
            'name' => $details['name'],
            'email' => $details['email'],


        ]);

        if ($query) return back()->with('status', 'Review submitted  successfully');


        return back()->with('error', 'Unable to submit review');
    }

    public function getReviews()
    {
        $query =  DB::table('products_rating')
            ->join('products', 'products.id', '=', 'products_rating.product_id')
            ->select('products_rating.*', 'products.name as product_name')
            ->get();

        return view('admin.reviews', [
            "data" => $query
        ]);
    }

    public function getProductReview(int $id)
    {
        $query = ProductRatingModel::where('product_id', $id)->get();

        return $query;
    }

    public function deleteReview(int $id)
    {
        $query = ProductRatingModel::where('id', $id)->delete();


        if ($query) return back()->with('status', 'Review deleted successfully');


        return back()->with('error', 'Unable to delete review');
    }
}
