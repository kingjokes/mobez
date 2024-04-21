<?php
namespace App\Interfaces;


interface ReviewInterface
{
    public function AddReview(array $details);

    public function getReviews();

    public function getProductReview(int $id);

    public function deleteReview(int $id);
}
